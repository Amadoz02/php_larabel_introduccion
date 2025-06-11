<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
        use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'url',
        

    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
    //esta funcion debe ir a ver el producto de la imagen y a su vez revisar cual es la categoria de ese producto
    
    public function categorye()
    {
        return $this->HasManyThrough(Product::class, category::class);
    }
    public function Category_del_producto_de_image()
    {
        $product = $this->Product();
        if ($product) {
            return $product->category();
        }
        return null;
        
    }
}

