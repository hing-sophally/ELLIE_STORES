<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Ecommerce / Cambodian user details
        $table->string('phone', 20)->nullable();          // local phone number
        $table->string('address')->nullable();            // street/village
        $table->string('commune')->nullable();            // khum / sangkat
        $table->string('district')->nullable();           // srok / khan
        $table->string('province')->nullable();           // khaet / reach thani
        $table->string('postal_code', 10)->nullable();

        // Role management (basic role system)
        $table->enum('role', ['admin', 'vendor', 'customer'])
              ->default('customer')
              ->after('email_verified_at'); // position after verified_at
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'phone',
            'address',
            'commune',
            'district',
            'province',
            'postal_code',
            'role',
        ]);
    });
}

};
