<?php

namespace App\Repositories;

use App\Models\ProductOffered;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class ProductOfferedRepository extends BaseRepository
{

    public function __construct(ProductOffered $productOffered)
    {
        parent::__construct($productOffered);
    }

    public function findWhereNotebookIdAndProductId(int $notebookId, int $productId)
    {
        $productOffered = $this->model
            ->with('product')
            ->where('notebook_id', $notebookId)
            ->where('product_id', $productId)
            ->first();

        if ($productOffered) {
            return $productOffered;
        }

        throw new NotFoundHttpException;
    }

    public function updateWhereNotebookIdAndProductId(int $notebookId, int $productId, array $data)
    {
        $productOffered = $this->model
            ->where('notebook_id', $notebookId)
            ->where('product_id', $productId)
            ->first();

        if (!$productOffered) {
            throw new NotFoundHttpException;
        }

        $productOffered->update($data);
        $productOffered->load('product');

        return $productOffered;
    }

    public function deleteWhereNotebookIdAndProductId(int $notebookId, int $productId)
    {
        $productOffered = $this->model
            ->with('product')
            ->where('notebook_id', $notebookId)
            ->where('product_id', $productId)
            ->delete();

        if ($productOffered) {
            return $productOffered;
        }

        throw new NotFoundHttpException;
    }

    public function checkBelongsTo($notebookId, $productId)
    {
        return $this->model
            ->where('notebook_id', $notebookId)
            ->where('product_id', $productId)
            ->exists();
    }

    public function getWhereByNotebookIdPaginate(int $notebookId, int $perPage = 10)
    {
        return $this->model
            ->with('product')
            ->where('notebook_id', $notebookId)
            ->paginate($perPage);
    }

    public function getWhereByNotebookId(int $notebookId)
    {
        return $this->model
            ->with('product')
            ->where('notebook_id', $notebookId)
            ->get();
    }
}