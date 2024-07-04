<?php

namespace App\Http\Controllers\API\V1\Front;

use App\Http\Controllers\API\ApiController;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class MainPageController extends ApiController
{
    public function index()
    {
        $products=Product::ActiveDesc()->get();

        $products->load(['brands','categories','vendor']);

        $products=ProductResource::collection($products);

        return $this->responseSuccess($products,200);
    }

    public function show(Product $product)
    {
            $product->load(['brands','categories','vendor']);

            $product = new ProductResource($product);

            return $this->responseSuccess($product,200);
    }



}
