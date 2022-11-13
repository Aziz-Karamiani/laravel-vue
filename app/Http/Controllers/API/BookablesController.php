<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookableShowResource;
use App\Models\Bookable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookablesController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return BookableShowResource::collection(Bookable::all());
    }

    /**
     * @param Bookable $bookable
     * @return BookableShowResource
     */
    public function show(Bookable $bookable)
    {
        return new BookableShowResource($bookable);
    }
}
