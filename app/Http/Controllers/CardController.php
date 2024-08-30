<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function index()
    {

    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {

        $categories = Category::All();
        $name_category = Category::where('id',$id)->first();
        $filter_cards =  Product::where('category_id', $id)->get();

        return view('main.card',compact('categories', 'filter_cards','name_category'));
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
