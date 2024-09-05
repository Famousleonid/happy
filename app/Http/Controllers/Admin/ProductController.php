<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return View('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return View('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'category_id' => ['required'],
            'price' => ['required'],

        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'location' => $request->location,
            'icon' => $request->icon,
            'status' => $request->status,
            'description' => $request->description,
            'cost' => $request->cost,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $product->addMedia($photo)->toMediaCollection('photos');
            }
        }


        return redirect()->route('product.index')->with('success', 'Product added');

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $current_prod = Product::find($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('categories', 'current_prod'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'category_id' => ['required'],
            'price' => ['required'],

        ]);

        $product = Product::find($id);

        $product->update(
            [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'price' => $request->price,
                'old_price' => $request->old_price,
                'location' => $request->location,
                'icon' => $request->icon,
                'status' => $request->status,
                'description' => $request->description,
                'cost' => $request->cost,
            ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $product->addMedia($photo)->toMediaCollection('photos');
            }
        }


        return redirect()->route('product.index')->with('success', 'Product was edited successfully');
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->route('product.index')->with('success', 'Product deleted');
    }
}
