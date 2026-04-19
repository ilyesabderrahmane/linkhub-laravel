<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->after('email');
            $table->string('display_name')->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->string('theme_background')->nullable();
            $table->string('theme_card')->nullable();
            $table->string('theme_button')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'display_name',
                'bio',
                'avatar',
                'theme_background',
                'theme_card',
                'theme_button',
            ]);
        });
    }
};
