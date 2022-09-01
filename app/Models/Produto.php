<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estoque;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Storage;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 
        'preco',
        'sabor',  
        'descricao',
        'path',
    ];
    public function estoques()
    {
        return $this->belongsToMany(Estoque::class)->withTimeStamps();
    }

    public function fieldsWithValue() {
        return [
            'Nome' => $this->nome,
            'Preço' => $this->preco,
            'Sabor' => $this->sabor,
            'Descrição' => $this->descricao,
            // 'Path' => $this->path,
        ];
    }

    public function getPathUrlAttribute() 
    {
        return 'http://127.0.0.1:8000/storage/'. $this->path;
    }
}