<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected  $fillable = ['nombre', 'edad', 'raza', 'categoria', 'cliente_id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
