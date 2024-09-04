<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::All();

        return view('main.index', compact('categories'));

    }

    public function show($id)
    {
        $categories = Category::All();
        $product = Product::find($id);
        $images = $product->getMedia('photos');

        return view('main.bigcard', compact('product','images','categories'));
    }



}
