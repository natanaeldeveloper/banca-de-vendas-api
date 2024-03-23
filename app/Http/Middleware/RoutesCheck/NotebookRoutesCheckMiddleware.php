<?php

namespace App\Http\Middleware\RoutesCheck;

use App\Repositories\NotebookRepository;
use App\Repositories\ProductRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NotebookRoutesCheckMiddleware
{

    public function __construct(
        protected readonly NotebookRepository $notebookRepository
    )
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $standId = $request->route('stand');
        $notebookId = $request->route('notebook');


        if($standId && $notebookId && !$this->notebookRepository->checkBelongsTo($standId, $notebookId)) {
            throw new NotFoundHttpException;
        }

        return $next($request);
    }
}
