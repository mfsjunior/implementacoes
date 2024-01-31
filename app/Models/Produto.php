<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    use HasFactory;
 
    

    protected $fillable = [
        'nome',
        'descricao',
        'preco', 
        'imagem', 
        'slug', 
        'id_categoria', 
        'id_user',
    ];
    protected $table = 'Produtos';

    public function user(){

        return $this->belongsto(User::class, 'id_user');
    }

    public function categoria(){

        return $this->belongsto(Categoria::class, 'id_categoria');
    }
}
