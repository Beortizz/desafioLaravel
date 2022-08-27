<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estoque;
class Produtos extends Model
{
    use HasFactory;

    public function Estoque()
    {
        return $this->belongsToMany(Estoque::class)->withTimeStamps();
    }
}