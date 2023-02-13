<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Product extends Model
{
    use HasFactory;
    
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable =	[
      'id',
      'name',
      'description',
      'enable',
    ];
    
    protected static $rules = [
      'name' => 'required' ,
      'description' => 'required',
      'enable' => 'required',
    ];

    public function categorys() {
      return $this->belongsToMany(
        Category::class,
        'category_product',
        'product_id',
        'category_id');
    }

    public function images() {
      return $this->belongsToMany(
        Image::class,
        'product_image',
        'product_id',
        'image_id');
    }
}