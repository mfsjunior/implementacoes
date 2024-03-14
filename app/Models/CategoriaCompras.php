<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaCompras extends Model
{
   
    use HasFactory;
    public $table = 'Categoria_compras';
    protected $fillable = ['nome','descricao','id_usuario'];
}
