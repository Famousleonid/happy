<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return View('admin.product.index', compact('products'));
    }


    public function getData(Request $request)
    {

        $showImages = $request->input('show_images') === 'true';

        $products = Product::select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id');

        if ($showImages) {
            $products = $products->with('media');
        }

        $dataTable = DataTables::of($products)
            ->editColumn('created_at', function ($product) {
                return strtolower($product->created_at->translatedFormat('d.M.Y'));
            })
            ->addColumn('edit', function ($product) {
                return '<a href="' . route('product.edit', $product->id) . '"><i class="fa fa-edit"></i></a>';
            })
            ->addColumn('delete', function ($product) {
                $form = '<form action="'.route('product.destroy', ['product' => $product->id]).'" method="POST" style="display:inline-block;">';
                $form .= csrf_field();
                $form .= method_field('DELETE');
                $form .= '<button class="btn btn-xs btn-danger delete-button " type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Delete product"" data-message="Are you sure you want to delete product: '.$product->name.'?">';
                $form .= '<i class="fa fa-trash"></i>';
                $form .= '</button>';
                $form .= '</form>';
                return $form;
            })
            ->filterColumn('category_name', function ($query, $keyword) {
                $query->where('categories.name', 'like', "%{$keyword}%");
            })
            ->orderColumn('category_name', function ($query, $order) {
                $query->orderBy('categories.name', $order);
            });


        if ($showImages) {
            $dataTable->addColumn('images', function ($product) {
                $images = $product->getMedia('photos');
                $imagesHtml = '';
                foreach ($images as $image) {
                    $url = $image->getUrl('thumb');
                    $imagesHtml .= '<a href="'.$image->getFullUrl().'" data-fancybox="gallery-'.$product->id.'"><img src="'.$url.'" width="30" height="30"  style="margin-right:5px;" loading="lazy"/></a>';
                }
                return $imagesHtml ?: 'No Images';
            });
        }
        $rawColumns = ['edit', 'delete'];
        if ($showImages) {
            $rawColumns[] = 'images';
        }

        return $dataTable->rawColumns($rawColumns)
            ->make(true);
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
            'location' => ['required'],
            'photos' => ['required', 'array', 'max:10'],
            'photos.*' => ['file', 'mimes:jpg,jpeg,png', 'max:8192'],
        ], [
            'photos.*.mimes' => 'Each photo must be a jpg, jpeg, or png.',
            'photos.*.max' => 'Each photo must be no larger than 8MB.',
            'photos.max' => 'You can upload a maximum of 10 photos.',
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
            'photos' => ['max:10'],
            'photos.*' => ['file', 'mimes:jpg,jpeg,png,mp4', 'max:8192'],
        ], [
            'photos.*.mimes' => 'Each photo must be a jpg, jpeg, or png. mp4 or mov ',
            'photos.*.max' => 'Each photo must be no larger than 8MB.',
            'photos.max' => 'You can upload a maximum of 10 photos.',
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
        $current_prod = Product::find($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('categories', 'current_prod'));
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->route('product.index')->with('success', 'Product deleted');
    }

    public function show($id)
    {

    }
}
