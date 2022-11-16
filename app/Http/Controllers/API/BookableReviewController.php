<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bookable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookableReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Bookable $bookable
     * @return Collection
     */
    public function __invoke(Request $request, Bookable $bookable)
    {
        return $bookable->reviews()->latest()->get();
    }
}
