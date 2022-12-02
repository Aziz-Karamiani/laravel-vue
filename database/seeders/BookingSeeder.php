<?php

namespace Database\Seeders;

use App\Models\Bookable;
use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::all()->each(function (Bookable $bookable) {
            $booking = Booking::factory()->make();
            $bookings = collect([$booking]);

            for ($i = 0; $i < rand(1, 20); $i++) {
                $from = (clone $booking->to)->addDays(rand(1, 14));
                $to = (clone $from)->addDays(rand(1, 14));
                $booking = Booking::factory()->make(['from' => $from, 'to' => $to]);
                $bookings->push($booking);
            }

            $bookable->bookings()->saveMany($bookings);
        });
    }
}
