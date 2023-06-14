<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function getorder()
    {
        try {
            $orders = Order::with('order_items')->with('products')->with('categories')->where('created_at', '>', now()->subDays(30)->endOfDay())->orderBy('created_at', 'DESC')->take(10);
            return $this->SendResponse($orders);
        } catch (\Exception $e) {
            Log::info("There Is NO orders");
            return ExceptionResponse($e);
        }
    }
}
