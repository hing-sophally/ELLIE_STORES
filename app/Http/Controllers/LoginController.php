<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Handle login request
     */
  public function doLogin(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }

    $credentials = $request->only('email', 'password');

    // Check credentials manually without logging in
    if (Auth::validate($credentials)) {
        $email = $request->input('email');

        // Generate OTP
        $otp = rand(100000, 999999);
        Cache::put('otp_' . $email, $otp, now()->addMinutes(5));

        // Store email in session to track OTP verification
        session([
            'otp_email' => $email,
            'otp_verified' => false
        ]);

        // Send OTP via Mailtrap
        try {
            Mail::to($email)->send(new OtpMail($otp));
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP. Please try again later.'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'OTP sent to your email. Please verify.',
            'redirect' => url('/verify-otp')
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Invalid email or password'
    ], 401);
}


public function showOtpForm()
{
    // RETURN the OTP *verification* form — NOT the email template
    return view('auth.verify-otp');
}

public function verifyOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|numeric',
    ]);

    $email = session('otp_email');
    $storedOtp = Cache::get('otp_' . $email);

    if ($storedOtp && $storedOtp == $request->otp) {
        // Mark user as verified
        session(['otp_verified' => true]);

        // Fully log in the user
        $user = \App\Models\User::where('email', $email)->first();
        Auth::login($user);

        Cache::forget('otp_' . $email);

        return redirect('/')->with('success', 'Login successful!');
    }

    return back()->withErrors(['otp' => 'Invalid or expired OTP']);
}


    /**
     * Handle registration request
     */
    public function doRegister(Request $request)
{
    try {
        // Log incoming request
        Log::info('Registration attempt', [
            'name' => $request->name,
            'email' => $request->email,
            'has_password' => $request->has('password'),
            'has_password_confirmation' => $request->has('password_confirmation')
        ]);

        // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            Log::warning('Registration validation failed', $validator->errors()->toArray());
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Create user without logging in
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Log::info('User created successfully', ['user_id' => $user->id]);

        // Return success and redirect to login page
        return response()->json([
            'success' => true,
            'message' => 'Registration successful. Please log in.',
            'redirect' => url('/user-login') // use your route
        ]);


    } catch (\Illuminate\Database\QueryException $e) {
        Log::error('Database error during registration', [
            'error' => $e->getMessage(),
            'code' => $e->getCode()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Database error: ' . $e->getMessage()
        ], 500);

    } catch (\Exception $e) {
        Log::error('Registration error', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ], 500);
    }
}

public function resendOtp()
{
    $email = session('otp_email');

    if (!$email) {
        return response()->json([
            'success' => false,
            'message' => 'No email found for OTP. Please login again.'
        ], 400);
    }

    $otp = rand(100000, 999999);
    Cache::put('otp_' . $email, $otp, now()->addMinutes(5));

    try {
        Mail::to($email)->send(new OtpMail($otp));
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to resend OTP. Please try again later.'
        ], 500);
    }

    return response()->json([
        'success' => true,
        'message' => 'A new OTP has been sent to your email.',
        'redirect' => route('otp.form') // your OTP screen route
    ]);
}



    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/Login');
    }

    /**
     * Show forgot password form
     */
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    /**
     * Handle forgot password - Send reset link
     */
    public function forgotPassword(Request $request)
    {
        // Validate email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'We cannot find a user with that email address.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Send password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json([
                'success' => true,
                'message' => 'Password reset link sent! Please check your email.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unable to send reset link. Please try again.'
        ], 500);
    }

    /**
     * Show reset password form
     */
    public function showResetPasswordForm($token, Request $request)
    {
        return view('reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * Handle reset password
     */
    public function resetPassword(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Reset password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json([
                'success' => true,
                'message' => 'Password reset successful! You can now login.',
                'redirect' => url('/Login')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => __($status)
        ], 500);
    }
}