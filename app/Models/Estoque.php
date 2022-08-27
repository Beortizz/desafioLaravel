<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produtos;

class Estoque extends Model
{
    use HasFactory;

    public function Produtos()
    {
        return $this->belongsToMany(Produtos::class)->withTimestamps();
    }
}