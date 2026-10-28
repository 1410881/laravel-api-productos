<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id'];
      public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'category_id');
    }
}
