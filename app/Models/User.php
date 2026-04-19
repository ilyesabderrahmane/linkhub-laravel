<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'display_name',
        'bio',
        'avatar',
        'theme_background',
        'theme_card',
        'theme_button',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 🔗 Relations
    public function links()
    {
        return $this->hasMany(Link::class)->orderBy('position');
    }

    public function profileViews()
    {
        return $this->hasMany(ProfileView::class);
    }
}
