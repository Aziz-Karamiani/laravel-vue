<?php

namespace App\Http\Controllers;

use App\Models\Bookable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookableAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @param  Bookable  $bookable
     * @return JsonResponse
     */
    public function __invoke(Request $request, Bookable $bookable)
    {
        $data = $request->validate(
            [
                'from' => 'required|date_format:Y-m-d|after_or_equal:now',
                'to' => 'required|date_format:Y-m-d|after:from',
            ]
        );

        return $bookable->availableFor($data['from'], $data['to'])
            ? response()->json([])
            : response()->json([], 404);
    }
}
