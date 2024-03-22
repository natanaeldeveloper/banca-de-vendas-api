<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{

    public function __construct(
        protected readonly ProductRepository $productRepository
    )
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $standId)
    {
        $products = $this->productRepository->whereByStandIdPaginate($standId);

        return new ProductCollection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, $standId)
    {
        $data = array_merge($request->all(), ['stand_id' => $standId]);

        $product = $this->productRepository->create($data);

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource created successfully'),
            'data'      => new ProductResource($product),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($standId, $productId)
    {
        $product = $this->productRepository->findById($productId);

        return response()->json([
            'data' => new ProductResource($product),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $standId, $productId)
    {
        $product = $this->productRepository->update($productId, $request->all());

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource updated successfully'),
            'data'      => new ProductResource($product)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($standId, $productId)
    {
       $this->productRepository->delete($productId);

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource successfully removed'),
        ]);
    }
}
