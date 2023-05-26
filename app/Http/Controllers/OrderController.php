<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function create(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->input('user_id'),
            'date' => $request->input('date'),
            'total_value' => $request->input('total_value'),
        ]);

        return response()->json($order, 201);
    }
}
