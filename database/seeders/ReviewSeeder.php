<?php

namespace Database\Seeders;

use App\Models\Bookable;
use App\Models\Booking;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::all()->each(function (Bookable $bookable) {
            $reviews = collect([]);
            $bookable->bookings()->each(function (Booking $booking) use ($reviews) {
                $review = Review::factory()->make();
                $review->booking_id = $booking->id;
                $reviews->push($review);
            });
            $bookable->reviews()->saveMany($reviews);
        });
    }
}
