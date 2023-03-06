<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaidaProduto extends Model
{
    use HasFactory;

    protected $table = "saida_produtos";

    protected $fillable = [
        'product_id',
        'documento',
        'transacao',
        'observacao',
        'qtd',
        'preco'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

}
