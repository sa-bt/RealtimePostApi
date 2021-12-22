<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeatureProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\FeatureProduct;
use App\Models\Product;
use App\Repositories\FeatureProductRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeatureProductController extends Controller
{
    public $repository;

    public function __construct(FeatureProductRepository $featureProductRepository)
    {
        $this->repository = $featureProductRepository;
    }

    public function index(Product $product)
    {
        return $this->successResponse(new ProductResource($product), Response::HTTP_OK);
    }


    public function store(FeatureProductRequest $request, Product $product)
    {
        try {
            #create new feature for product
            $this->repository->create($product, $request);
            return $this->successResponse(new ProductResource($product), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->errorResponse(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function show(Product $product, FeatureProduct $featureProduct)
    {
//
    }


    public function update(Request $request, Product $product, $feature)
    {
        try {
            #edit feature of product
            $this->repository->edit($product,$feature, $request);
            return $this->successResponse(new ProductResource($product), Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->errorResponse(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }


    public function destroy(Product $product, $feature)
    {
        try {
            #delete feature of product
            $this->repository->delete($product,$feature);
            return $this->successResponse('', Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->errorResponse(Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
