<?php

namespace App\Http\Controllers;

use App\Models\Bookable;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookablePriceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Bookable $bookable
     * @return JsonResponse
     */
    public function __invoke(Request $request, Bookable $bookable)
    {
        $data = $request->validate(
            [
                'from' => 'required|date_format:Y-m-d',
                'to' => 'required|date_format:Y-m-d|after:from',
            ]
        );

        return response()->json($bookable->priceFor($data['from'], $data['to']));
    }
}
