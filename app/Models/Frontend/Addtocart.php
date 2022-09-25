<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addtocart extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'product_id',
        'name',
        'price',
        'image',
        'quantity'
    ];
}
