<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotebookRequest;
use App\Http\Requests\UpdateNotebookRequest;
use App\Http\Resources\NotebookCollection;
use App\Http\Resources\NotebookResource;
use App\Repositories\NotebookRepository;
use Illuminate\Http\Request;

class NotebookController extends Controller
{

    public function __construct(
        protected readonly NotebookRepository $notebookRepository
    )
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index($standId)
    {
        $notebooks = $this->notebookRepository->getWhereByStandIdPaginate($standId);

        return new NotebookCollection($notebooks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotebookRequest $request, $standId)
    {
        $data = array_merge($request->all(), ['stand_id' => $standId]);

        $notebook = $this->notebookRepository->create($data);

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource created successfully'),
            'data'      => new NotebookResource($notebook),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($standId, $notebookId)
    {
        $notebook = $this->notebookRepository->findById($notebookId);

        return response()->json([
            'data' => new NotebookResource($notebook),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotebookRequest $request, $standId, $notebookId)
    {
        $notebook = $this->notebookRepository->update($notebookId, $request->all());

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource updated successfully'),
            'data'      => new NotebookResource($notebook)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($standId, $notebookId)
    {
       $this->notebookRepository->delete($notebookId);

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource successfully removed'),
        ]);
    }
}
