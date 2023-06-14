<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $products = Product::simplePaginate(2);
            return $this->SendResponse($products);
        } catch (\Exception $e) {
            Log::info("There Is NO Products");
            return ExceptionResponse($e);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = Product::create([
                'name' => $request->name,
                'color' => $request->color,
                'weight' => $request->weight,
                'price' => $request->price,
                'description' => $request->description,
            ]);

            return  $this->SendResponse('Product successfully stored.');
        } catch (\Exception $e) {
            Log::info("Product not created");
            return ExceptionResponse($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        try {
            $product = Product::findOrFail($id);
            return $this->SendResponse($product);
        } catch (\Exception $e) {
            Log::info("Product not available for update");
            return ExceptionResponse($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->update([
                'name' => $request->name,
                'color' => $request->color,
                'weight' => $request->weight,
                'price' => $request->price,
                'description' => $request->description,
            ]);
            return $this->SendResponse('Product successfully updated.');
        } catch (\Exception $e) {
            Log::info("Product not available for update");
            return ExceptionResponse($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return $this->SendResponse('Product successfully deleted.');
        } catch (\Exception $e) {
            Log::info("Product not found");
            return ExceptionResponse($e);
        }
    }

}
