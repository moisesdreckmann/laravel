<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'senha', 'telefone'];

    public $timestamps = true;

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_id');
    }
}

