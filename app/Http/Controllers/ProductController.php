<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public $repository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function index()
    {
        #get all products from product repository
        $products = $this->repository->all();
       return $this->successResponse(ProductResource::collection($products), 200);
    }


    public function store(ProductRequest $request)
    {
        try {
            #create new product
            $product = $this->repository->create($request);
            return $this->successResponse(new ProductResource($product), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->errorResponse(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function show(Product $product)
    {

        return $this->successResponse(new ProductResource($product), Response::HTTP_OK);
    }


    public function update(ProductRequest $request, Product $product)
    {
        try {
            #Update Product
            $this->repository->edit($product, $request);
            return $this->successResponse(new ProductResource($product), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->errorResponse(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function destroy(Product $product)
    {
        try {
            #Delete Product
            $this->repository->delete($product);
            return $this->successResponse('', Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->errorResponse(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
