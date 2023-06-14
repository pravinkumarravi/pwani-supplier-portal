<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Supplier extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'name',
        'email',
        'phone_code',
        'phone_number',
        'password',
        'status'
    ];

    /**
     * Set the password attribute.
     *
     * @param  string $password
     * @return void
     */
    public function setPasswordAttribute(string $password): void
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Get the combined phone number with the phone code.
     *
     * @return string
     */
    public function getCombinedPhoneNumberAttribute(): string
    {
        // Concatenate the phone code and phone number with a space in between
        return $this->attributes['phone_code'] . ' ' . $this->attributes['phone_number'];
    }
}
