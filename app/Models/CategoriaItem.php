<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaItem extends Model
{
    use HasFactory;
    
    public $table = 'CategoriaItem';
    protected $fillable = ['id_contrato','id_categoria' , 'id_usuario'];
}
