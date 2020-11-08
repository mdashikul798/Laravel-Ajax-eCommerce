<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name', 'description'];

    // public function product(){
	// 	return $this->belongsTo(Product::class, 'id');
    // }

    public function subCategory(){
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
