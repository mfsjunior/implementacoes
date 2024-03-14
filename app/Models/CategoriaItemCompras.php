<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaItemCompras extends Model
{
    use HasFactory;
    
    public $table = 'CategoriaItem_compras';
    protected $fillable = ['id_compra','id_categoria' , 'id_usuario'];
}
