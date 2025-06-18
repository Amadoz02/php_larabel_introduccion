<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // protected $fillable = [
    //     'name',
    //     'description',
    //     'price',
    //     'stock',
    //     'category_id',
    //     // 'image_id',

    // ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
