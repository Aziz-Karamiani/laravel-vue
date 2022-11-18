<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewShowResource;
use App\Models\Booking;
use App\Models\Review;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response $review
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|size:36|unique:reviews',
            'content' => 'required|min:2',
            'rating' => 'required|in:1,2,3,4,5'
        ]);

        $booking = Booking::getByReviewId($data['id']);

        if (!$booking) {
            return response(["message" => "Booking not found."], 404);
        }

        $booking->review_id = '';
        $booking->save();

        $review = Review::make($data);
        $review->booking_id = $booking->id;
        $review->bookable_id = $booking->bookable_id;
        $review->save();

        return $review;
    }
}
