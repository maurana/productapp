<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Category extends Model
{
    use HasFactory;
    
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable =	[
      'id',
      'name', 
      'enable',
    ];
    
    protected static $rules = [
      'name' => 'required' ,
      'enable' => 'required',
    ];

    public function products() {
      return $this->belongsToMany(
        Product::class,
        'category_product',
        'product_id',
        'category_id');
    }
}