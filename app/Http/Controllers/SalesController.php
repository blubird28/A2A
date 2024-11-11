<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sales;

class SalesController extends Controller
{
    public function getTopTheater(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date_format:Y-m-d',
        ]);

        $topTheater = DB::table('sales')
            ->join('theaters', 'sales.theater_id', '=', 'theaters.id')
            ->where('sales.sale_date', $validated['date'])
            ->select('theaters.name', DB::raw('SUM(sales.amount) as total_sales'))
            ->groupBy('theaters.name')
            ->orderByDesc('total_sales')
            ->first();
    
        return response()->json($topTheater);
    }
    
}
