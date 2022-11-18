<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory, HasUuids;

    /**
     * @var string[]
     */
    protected $fillable = ['id', 'content', 'rating'];

    /**
     * @return BelongsTo
     */
    public function bookable()
    {
        return $this->belongsTo(Bookable::class);
    }

    /**
     * @return BelongsTo
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
