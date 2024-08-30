<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::All();
        View::share('main_categories', $categories);

        return view('main.index', compact('categories'));

    }

}
