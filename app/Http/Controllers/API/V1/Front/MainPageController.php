<?php

namespace App\Http\Controllers\API\V1\Front;

use App\Http\Controllers\API\ApiController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Categories;

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
            $categories =[];
            return $this->responseSuccess($product,200);
    }

    public function showcategories()
    {

        return $this->responseSuccess($data,200);
    }

public function showOneCategory(Categories $categories)
    {
        $data=[$categories];
        return $this->responseSuccess($data,200);
    }


}
