<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class CategoryProduct extends Model
{
  protected $table = 'category_product';
  public $timestamps = false;
  protected $primaryKey = null;
  public $incrementing = false;
  protected $fillable =	[
    'category_id',
    'product_id'
  ];
}