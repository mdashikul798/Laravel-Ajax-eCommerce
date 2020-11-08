<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product', 'category', 'sub_category', 'tag', 'brand', 'image', 'description'];

    public function productOtherColor(){
    	return $this->hasMany(ProductOtherColor::class, 'product_id');
    }
}
