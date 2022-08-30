<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoque';
    protected $fillable = [
        'produtos',
        'quantidade',
        'data',
    ];
    public function Produtos()
    {
        return $this->belongsToMany(Produto::class)->withTimestamps();
    }

    public function fieldsWithValue() {
        return [
            'Produto' => $this->produtos,
            'Quantidade' => $this->quantidade,
            'Data' => $this->data,
        ];
    }
}