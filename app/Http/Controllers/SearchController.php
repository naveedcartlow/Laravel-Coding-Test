<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function listing()
    {
        $customers = Customer::with('orders.items')->paginate(10);
        return view('listing', compact('customers'));
    }

    public function search(Request $request)
    {
        $query = Customer::query();

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        if ($request->filled('order_number')) {
            $query->whereHas('orders', function (Builder $query) use ($request) {
                $query->where('order_number', 'like', '%' . $request->input('order_number') . '%');
            });
        }

        if ($request->filled('item_name')) {
            $query->whereHas('orders.items', function (Builder $query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('item_name') . '%');
            });
        }

        $customers = $query->with('orders.items')->paginate(10);

        return view('listing', compact('customers'));
    }
}
