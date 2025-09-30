<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - Ellie Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #592F7B;
            --secondary-color: #783F91;
            --accent-color: #BC98C4;
            --dark-color: #391F4F;
            --darkest-color: #220D38;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #BC98C4 0%, #592F7B 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 48px 40px;
            width: 100%;
            max-width: 440px;
        }

        .header {
            text-align: center;
            margin-bottom: 32px;
        }

        .icon-wrapper {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            position: relative;
            overflow: hidden;
        }

        .icon-wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            animation: pulse 15s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .icon-wrapper svg {
            width: 34px;
            height: 34px;
            stroke: white;
            position: relative;
            z-index: 1;
        }

        h2 {
            color: var(--primary-color);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #718096;
            font-size: 14px;
            line-height: 1.5;
        }

        .error-list {
            background: #fff5f5;
            border: 1px solid #fc8181;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 24px;
        }

        .error-list ul {
            list-style: none;
        }

        .error-list li {
            color: #c53030;
            font-size: 14px;
            padding: 4px 0;
            display: flex;
            align-items: center;
        }

        .error-list li:before {
            content: "⚠";
            margin-right: 8px;
            font-size: 16px;
        }

        .success-message {
            background: #d4edda;
            border: 1px solid #28a745;
            border-radius: 12px;
            padding: 16px;
            margin-top: 20px;
            color: #155724;
            text-align: center;
            font-size: 14px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            color: #2d3748;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 14px 16px;
            font-size: 18px;
            letter-spacing: 8px;
            text-align: center;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(188, 152, 196, 0.2);
        }

        input[type="text"]::placeholder {
            letter-spacing: normal;
        }

        button[type="submit"] {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(89, 47, 123, 0.4);
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(89, 47, 123, 0.5);
        }

        button[type="submit"]:active {
            transform: translateY(0);
        }

        .resend-link {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
            color: #718096;
        }

        .resend-link a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .resend-link a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .container {
                padding: 32px 24px;
            }

            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="icon-wrapper">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h2>Verify Your Account</h2>
            <p class="subtitle">Enter the 6-digit code sent to your device</p>
        </div>

        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf
            <div class="form-group">
                <label for="otp">Verification Code</label>
                <input 
                    type="text" 
                    id="otp" 
                    name="otp" 
                    maxlength="6" 
                    placeholder=" "
                    pattern="[0-9]{6}"
                    inputmode="numeric"
                    required 
                    autofocus
                >
            </div>
            <button type="submit">Verify Code</button>
        </form>

        <div class="resend-link">
            Didn't receive the code? <a href="#" id="resend-otp">Resend</a>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <script>
        document.getElementById('resend-otp').addEventListener('click', function(e) {
            e.preventDefault();

            fetch("{{ route('otp.resend') }}")
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    if(data.success && data.redirect){
                        window.location.href = data.redirect;
                    }
                })
                .catch(err => {
                    alert('Something went wrong. Please try again.');
                });
        });
    </script>
</body>
</html>