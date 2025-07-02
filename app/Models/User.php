<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    /**
     * Kullanıcının notlarıyla ilişkisi
     */
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    /**
     * Bu modelde toplu atamaya izin verilen alanlar.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Gizli alanlar (JSON çıktılarda görünmez).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Otomatik cast edilen alanlar.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
