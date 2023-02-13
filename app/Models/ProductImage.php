<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class ProductImage extends Model
{
  protected $table = 'product_image';
  public $timestamps = false;
  protected $primaryKey = null;
  public $incrementing = false;
  protected $fillable =	[
    'product_id',
    'image_id'
  ];
}