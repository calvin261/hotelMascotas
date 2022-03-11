<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected  $fillable = [
        'nombres', 'cedula', 'fechaNacimiento', 'numeroCelular', 'direccion', 'cuidad', 'email'
    ];
    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }
}
