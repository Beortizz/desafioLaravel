<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produtos;

class Estoque extends Model
{
    use HasFactory;
    protected $fillable = [
        'produtos',
        'quantidade',
        'data',
    ];
    public function Produtos()
    {
        return $this->belongsToMany(Produtos::class)->withTimestamps();
    }

    public function fieldsWithValue() {
        return [
            'Produto' => $this->produtos,
            'Quantidade' => $this->quantidade,
            'Data' => $this->data,
        ];
    }
}