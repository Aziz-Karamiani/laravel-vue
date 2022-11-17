<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function show(Request $request, $review)
    {
        return Booking::getByReviewId($review) ?? abort(404);
    }
}
