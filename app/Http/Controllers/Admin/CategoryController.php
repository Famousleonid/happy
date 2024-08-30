<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return View('admin.category.index', compact('categories'));
    }


    public function create()
    {
        return View('admin.category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'max:100'],
        ]);

        $customer = Category::create($request->all());

        return redirect()->route('category.index')->with('success', 'Category added');
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
