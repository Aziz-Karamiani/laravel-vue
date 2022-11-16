<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookableReviewResource;
use App\Models\Bookable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookableReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Bookable $bookable
     * @return AnonymousResourceCollection
     */
    public function __invoke(Request $request, Bookable $bookable)
    {
        return BookableReviewResource::collection($bookable->reviews()->latest()->get());
    }
}
