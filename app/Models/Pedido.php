<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Comida;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'comida_id', 'status'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function comida()
    {
        return $this->belongsTo(Comida::class, 'comida_id');
    }
}
