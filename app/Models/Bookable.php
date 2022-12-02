<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bookable extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['title', 'content', 'price'];

    /**
     * @return HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * @param $from
     * @param $to
     * @return bool
     */
    public function availableFor($from, $to): bool
    {
        return 0 === $this->bookings()->betweenDates($from, $to)->count();
    }

    /**
     * @return HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    public function priceFor($from, $to): array
    {
        $from = Carbon::parse($from);
        $to = Carbon::parse($to);
        $days = $from->diffInDays($to);

        $price = $days * $this->price;

        return [
            'price' => $price,
            'breakDown' => [
                $days => $this->price,
            ],
        ];
    }
}
