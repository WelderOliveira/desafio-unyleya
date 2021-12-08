<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    static $rules = [
        'nome' => 'required',
        'dt_nascimento' => 'required',
        'sexo' => 'required',
        'nacionalidade' => 'required',
    ];

    /**
     * @var string[]
     */
    protected $dates = ['dt_nascimento'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'nome', 'nacionalidade', 'sexo', 'dt_nascimento'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}
