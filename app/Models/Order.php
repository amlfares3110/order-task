<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
   
    public function order_items()
    {
        return $this->hasOne(OrderItem::class, 'id', 'order_id');
    }
    public function products()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'cat_id')->where('name','Electronics');
    }
}
