<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  
    use HasFactory;
    public $table = 'Categorias';
    protected $fillable = ['nome','descricao'];

    
    
    public function produtos(){

        //uma categoria pode ter muitos produtos 
        return $this->hasMany(Produto::class, 'id_categoria', 'id');
    }



}
