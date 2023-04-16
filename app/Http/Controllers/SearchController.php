<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

public function searchProducts(Request $request)
{
    if ($request->search) {
        $searchProducts = DB::table('products')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->select('products.*', 'categories.name as category_name')
                            ->where('products.name', 'LIKE', '%'.$request->search.'%')
                            ->orWhere('categories.name', 'LIKE', '%'.$request->search.'%')
                            ->latest()
                            ->paginate(3);
        return view('products-search', compact('searchProducts'));
    }else {
        return redirect()->back()->with('message', 'Results not found!');
    }
}




}
