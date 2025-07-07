<?php

// app/Models/Pedido.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'comida_id', 'bebida_gratis'];

    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class);
    }

    public function comida()
    {
        return $this->belongsTo(\App\Models\Comida::class);
    }
}
