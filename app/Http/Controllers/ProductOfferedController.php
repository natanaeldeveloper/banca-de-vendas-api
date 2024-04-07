<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductOfferedRequest;
use App\Http\Requests\UpdateNotebookRequest;
use App\Http\Requests\UpdateProductOfferedRequest;
use App\Http\Resources\ProductOfferedCollection;
use App\Http\Resources\ProductOfferedResource;
use App\Repositories\ProductOfferedRepository;
use Illuminate\Http\Request;

class ProductOfferedController extends Controller
{

    public function __construct(
        protected readonly ProductOfferedRepository $productOfferedRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index($notebookId)
    {
        $productsOffered = $this->productOfferedRepository->getWhereByNotebookIdPaginate($notebookId);

        return new ProductOfferedCollection($productsOffered);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductOfferedRequest $request, $notebookId)
    {
        $data = array_merge($request->all(), ['notebook_id' => $notebookId]);

        $productOffered = $this->productOfferedRepository->create($data);

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource created successfully'),
            'data'      => new ProductOfferedResource($productOffered),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($notebookId, $productId)
    {
        $productOffered = $this->productOfferedRepository
            ->findWhereNotebookIdAndProductId($notebookId, $productId);

        return response()->json([
            'data' => new ProductOfferedResource($productOffered),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductOfferedRequest $request, $notebookId, $productId)
    {
        $productOffered = $this->productOfferedRepository
            ->updateWhereNotebookIdAndProductId($notebookId, $productId, $request->all());

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource updated successfully'),
            'data'      => new ProductOfferedResource($productOffered)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($notebookId, $productId)
    {
        $this->productOfferedRepository
            ->deleteWhereNotebookIdAndProductId($notebookId, $productId);

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource successfully removed'),
        ]);
    }
}