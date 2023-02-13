<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Image extends Model
{
    use HasFactory;
    
    protected $table = 'image';
    protected $primaryKey = 'id';
    protected $fillable =	[
      'id',
      'name',
      'file',
      'enable',
    ];
    
    protected static $rules = [
      'name' => 'required' ,
      'file' => 'required',
      'enable' => 'required',
    ];

    public function products() {
      return $this->belongsToMany(
        Product::class,
        'product_image',
        'image_id',
        'product_id');
    }
}