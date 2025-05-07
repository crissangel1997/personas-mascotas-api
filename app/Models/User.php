<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{

      use HasFactory, Notifiable, HasApiTokens;

        protected $fillable = ['name', 'email', 'password'];

        protected $hidden = ['password'];

        public function getJWTIdentifier() {
            return $this->getKey();
        }

        public function getJWTCustomClaims() {
            return [];
        }

        // app/Models/User.php

        public function personas()
        {
            return $this->hasMany(Persona::class);
        }

}

