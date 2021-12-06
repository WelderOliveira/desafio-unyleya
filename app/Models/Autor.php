<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome','nacionalidade','sexo','dt_nascimento'
    ];
    protected $table='autor';

    public function livros()
    {
        return $this->hasMany('App\Models\Livro');
    }
}
