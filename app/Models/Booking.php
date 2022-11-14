<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to', 'bookable_id'];

    /**
     * @return BelongsTo
     */
    public function bookable()
    {
        return $this->belongsTo(Bookable::class);
    }
}
