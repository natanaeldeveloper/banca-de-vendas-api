<?php

namespace App\Http\Middleware\RoutesCheck;

use App\Repositories\ProductRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductRoutesCheckMiddleware
{

    public function __construct(
        protected readonly ProductRepository $productRepository
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
        $productId = $request->route('product');

        if($standId && $productId && !$this->productRepository->checkBelongsTo($standId, $productId)) {
            throw new NotFoundHttpException;
        }

        return $next($request);
    }
}
