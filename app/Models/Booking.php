<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to'];

    /**
     * @return BelongsTo
     */
    public function bookable()
    {
        return $this->belongsTo(Bookable::class);
    }

    /**
     * @param $query
     * @param $from
     * @param $to
     * @return int
     */
    public function scopeBetweenDates($query, $from, $to)
    {
        return $query->where('from', '<=', $to)->where('to', '>=', $from);
    }

    /**
     * @return HasOne
     */
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
