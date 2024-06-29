<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\ApiController;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends ApiController
{
    public function index()
    {
        $products=Product::activeDesc()->with('categories','brands')->get();

        return $this->responseSuccess($products,200);
    }

    public function show(product $product)
    {
        $product->load('categories');
        $product->load('brands');
        $product = new ProductResource($product);

        return $this->responseSuccess($product,200);
    }
}
