<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopUserRegister extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number', 'password', 'confirm_password', 'newsLeter'];
}
