<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    public function index()
    {
        $categories = Category::All();


        return view('main.index', compact('categories' ));

    }

    public function show(Request $request,$id)
    {
        $today = Carbon::today()->toDateString();
        $categories = Category::All();
        $product = Product::find($id);
        $images = $product->getMedia('photos');
        $ipAddress = $request->ip() ?? $request->getClientIp() ?? $_SERVER['REMOTE_ADDR'] ?? 'IP doesn`t';

        $view = \App\Models\View::updateOrCreate(
            [
                'viewable_id' => $product->id,
                'viewable_type' => Product::class,
                'view_date' => $today,
                'ip_address' => $ipAddress,

            ],
            [
                'views_count' => DB::raw('views_count + 1'), // Увеличиваем счетчик просмотров
                'country' => null, // Поле для страны остается
            ]
        );
        $this->getCountryFromIp($view);



        return view('main.bigcard', compact('product', 'images', 'categories'));
    }

    public function getCountryFromIp(View $view)
    {
        $ipAddress = $view->ip_address;

        $response = Http::get("http://ip-api.com/json/{$ipAddress}");

        if ($response->successful()) {
            $data = $response->json();

            if (isset($data['country'])) {
                $view->update(['country' => $data['country']]);
            }
        }
    }
}
