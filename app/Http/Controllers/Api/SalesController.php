<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theater;

class SalesController extends Controller
{
    public function getTopTheater(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date_format:Y-m-d',
        ]);

        $topTheater = Theater::withSum(['sales as total_sales' => function ($query) use ($validated) {
                $query->whereDate('sale_date', $validated['date']);
            }], 'amount')
            ->orderByDesc('total_sales')
            ->first();

        return response()->json($topTheater ? [
            'theater' => $topTheater->name,
            'total_sales' => $topTheater->total_sales,
        ] : ['message' => 'No sales found for the given date.']);
    }
}
