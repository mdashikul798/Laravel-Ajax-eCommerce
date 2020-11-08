<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOtherColor extends Model
{
    use HasFactory;
    protected $fillable = ['main_pro_id', 'product_image', 'product_color'];

    public function product(){
		return $this->belongsTo(Product::class);
	}
}
