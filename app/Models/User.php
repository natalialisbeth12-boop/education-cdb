<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'intentos_fallidos',
        'bloqueado_hasta',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'bloqueado_hasta'   => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // --- Verifica si el usuario es profesor ---
    public function esProfesor(): bool
    {
        return $this->role === 'teacher';
    }

    // --- Verifica si la cuenta está bloqueada ---
    public function estaBloqueado(): bool
    {
        if ($this->bloqueado_hasta === null) {
            return false;
        }
        return Carbon::now()->lt($this->bloqueado_hasta);
    }

    // --- Registra un intento fallido; bloquea tras 3 intentos ---
    public function registrarIntentoFallido(): void
    {
        $this->increment('intentos_fallidos');
        if ($this->intentos_fallidos >= 3) {
            $this->bloqueado_hasta = Carbon::now()->addMinute();
            $this->save();
        }
    }

    // --- Reinicia el contador tras login exitoso ---
    public function reiniciarIntentos(): void
    {
        $this->update([
            'intentos_fallidos' => 0,
            'bloqueado_hasta'   => null,
        ]);
    }
}
