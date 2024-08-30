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
            'name' => ['string', 'max:35'],
        ]);

        $customer = Category::create($request->all());

        return redirect()->route('category.index')->with('success', 'Category added');
    }


    public function show($id)
    {
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['string', 'max:35'],
        ]);
        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Category updated');
    }


    public function destroy($id)
    {
        try {
            $answer = Category::destroy($id);
        } catch (\Exception $e) {
            return back()->withErrors('The databases are linked. First remove...');
        }

        return redirect()->route('category.index')->with('success', 'Category deleted');
    }
}
