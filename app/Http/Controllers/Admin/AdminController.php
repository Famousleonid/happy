<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{

    public function index()
    {
        $today = Carbon::today();
        $categories = Category::All();
        $products = Product::all();
        $views_all = View::all();
        $views_all_today = View::where('view_date',$today)->get();
        $todayViews = View::where('view_date',$today)->sum('views_count');
        $totalViews = View::sum('views_count');

        return view('admin.index', compact('categories', 'todayViews', 'totalViews','products','views_all','views_all_today'));

    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
