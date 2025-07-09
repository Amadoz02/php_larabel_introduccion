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
        return $this->morphMany(Product::class, 'imageable');
    }
  
    
    public function categorye()
    {
        return $this->HasManyThrough(Product::class, category::class);
    }

}

