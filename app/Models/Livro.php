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
    static $rules = [
        'titulo'=>'required|unique:livros',
        'dt_lancamento'=>'required',
        'autor_id'=>'required',
        'genero_id'=>'required',
        'editora_id'=>'required'
    ];

    protected $dates = ['dt_lancamento'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'titulo', 'genero_id', 'editora_id', 'autor_id', 'dt_lancamento',
    ];

    public function autors()
    {
        return $this->belongsTo(Autor::class, 'autor_id', 'id');
    }

    public function editora()
    {
        return $this->belongsTo(Editora::class, 'editora_id');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
}
