<?php

namespace App\Http\Controllers\API\V1\Front;

use App\Http\Controllers\API\ApiController;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Categories;

class MainPageController extends ApiController
{
    public function index()
    {
        $products=Product::ActiveDesc()->get();
        $categories=Categories::all();
        $brands=Brand::all();
        $products->load(['brands','categories','vendor']);

        $products=ProductResource::collection($products);
        $categories= CategoryResource::collection($categories);
        $brands= BrandResource::collection($brands);

        $data=[$products,$categories,$brands];
        return $this->responseSuccess($data,200);
    }

    public function show(Product $product)
    {
        $product->load(['brands','categories','vendor']);
        $categories=Categories::all();
        $brands=Brand::all();

        $product = new ProductResource($product);
        $categories= CategoryResource::collection($categories);
        $brands=BrandResource::collection($brands);

        $data=[$product,$categories,$brands];
        return $this->responseSuccess($data,200);
    }

    public function categories()
    {
        $categories=Categories::all();
        $categories = CategoryResource::collection($categories);

        $data=[$categories];
        return $this->responseSuccess($data,200);
    }

    public function showOneCategory(Categories $category)
    {
        $category = new CategoryResource($category);
        $productFromCategory= $category->products()->ActiveDesc()->get();

        $productFromCategory->load('brands','categories','vendor');
        $productFromCategory= ProductResource::collection($productFromCategory);

        $data=[$category,$productFromCategory];
        return $this->responseSuccess($data,200);
    }

    public function brands()
    {
        $brands=Brand::all();
        $brands=BrandResource::collection($brands);

        $data=[$brands];
        return $this->responseSuccess($data,200);
    }

    public function showOneBrand(Brand $brand)
    {
        $productFromBrand=$brand->products()->ActiveDesc()->get();
        $brand=new BrandResource($brand);
        $productFromBrand->load('brands','categories','vendor');
        $productFromBrand=ProductResource::collection($productFromBrand);

        $data=[$productFromBrand,$brand];
        return$this->responseSuccess($data,200);
    }

}
