<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewShowResource;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * @param Review $review
     * @return ReviewShowResource
     */
    public function show(Review $review)
    {
        return new ReviewShowResource($review);
    }
}
