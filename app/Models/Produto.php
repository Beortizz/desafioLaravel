<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estoque;
class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 
        'preco',
        'sabor',  
        'descricao',
    ];
    public function Estoque()
    {
        return $this->belongsToMany(Estoque::class)->withTimeStamps();
    }

    public function fieldsWithValue() {
        return [
            'Nome' => $this->nome,
            'Preço' => $this->preco,
            'Sabor' => $this->sabor,
            'Descrição' => $this->descricao,
        ];
    }
}