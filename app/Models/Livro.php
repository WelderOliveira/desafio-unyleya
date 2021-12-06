<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'titulo', 'genero_id', 'editora_id', 'autor_id', 'dt_lancamento',
    ];

    public function autor()
    {
        return $this->belongsTo('App\Models\Autor');
    }

    public function editora()
    {
        return $this->belongsTo('App\Models\Editora');
    }

    public function genero()
    {
        return $this->belongsTo('App\Models\Genero');
    }
}
