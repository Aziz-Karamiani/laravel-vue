<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bookable;
use Illuminate\Database\Eloquent\Collection;

class BookablesController extends Controller
{
    /**
     * @return Collection
     */
    public function index()
    {
        return Bookable::all();
    }

    /**
     * @param Bookable $bookable
     * @return Bookable
     */
    public function show(Bookable $bookable)
    {
        return $bookable;
    }
}
