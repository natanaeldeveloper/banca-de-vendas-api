<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStandRequest;
use App\Http\Requests\UpdateStandRequest;
use App\Http\Resources\StandCollection;
use App\Http\Resources\StandResource;
use App\Repositories\StandRepository;
use Illuminate\Http\Request;

class StandController extends Controller
{

    public function __construct(
        protected readonly StandRepository $standRepository,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stands = $this->standRepository->paginate();

        return new StandCollection($stands);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStandRequest $request)
    {
        $stand = $this->standRepository->create($request->all());

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource created successfully'),
            'data'      => new StandResource($stand),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($standId)
    {
        $stand = $this->standRepository->findById($standId);

        return response()->json([
            'data'  => new StandResource($stand),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStandRequest $request, $standId)
    {
        $stand = $this->standRepository->update($standId, $request->all());

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource updated successfully'),
            'data'      => new StandResource($stand)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($standId)
    {
        $this->standRepository->delete($standId);

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource successfully removed')
        ]);
    }

    public function trash()
    {
        $stands = $this->standRepository->findAllDeleted();

        return new StandCollection($stands);
    }

    public function restore($standId)
    {
        $stand = $this->standRepository->restore($standId);

        return response()->json([
            'status'    => 'success',
            'message'   => __('Resource restored successfully'),
            'data'      => new StandResource($stand)
        ]);
    }

    public function forceDelete(Request $request, $standId)
    {
        $this->standRepository->forceDelete($standId);

        return response()->json([
            'status'    => 'success',
            'message'   => __('Permanent resource deletion successful')
        ]);
    }
}
