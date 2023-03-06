<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'code',
        'partNumber',
        'description',
        'brand',
        'model',
        'um',
        'category',
        'subCategory',
        'address',
        'minQuantity'
    ];

    public function entrada_produtos()
    {
        return $this->belongsToMany(EntradaProduto::class)->withTimestamps();
    }

    public function saida_produtos()
    {
        return $this->belongsToMany(SaidaProduto::class)->withTimestamps();
    }
}
