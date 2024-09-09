<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
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
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        if ($media) {
            $media->delete(); // Удаляем медиафайл
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function reorder(Request $request)
    {
        try {
        $order = $request->input('order');

        if (!$order || !is_array($order)) {
            return response()->json(['success' => false, 'message' => 'Invalid data provided'], 400);
        }


        foreach ($order as $index => $mediaId) {

            $media = Media::find($mediaId);

            // Если медиафайл найден, обновляем его поле "order_column"
            if ($media) {
                $media->order_column = $index + 1; // Индексация с 1
                $media->save();
            }
        }
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
}
    }
}
