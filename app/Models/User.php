<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function adminlte_image()
    {
        return 'https://us.123rf.com/450wm/morys/morys1810/morys181000057/112955921-arte-de-vector-de-mascota-de-toro-imagen-sim%C3%A9trica-frontal-de-bull-con-aspecto-peligroso-icono-monoc.jpg?ver=6';
    }
    public function adminlte_profile_url()
    {
        return 'user/profile';
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function adminlte_desc()
    {
        if ($this->role) {
            return $this->role->name; // Retorna el nombre del rol si existe
        }
    
        // Si no tiene un rol, retorna "Usuario" por defecto
        return 'Usuario';
    }
}
