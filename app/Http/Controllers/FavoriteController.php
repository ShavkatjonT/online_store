<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function index()
    {
        return auth()->user()->favorites()->paginate(20);
    }

    public function store(Request $request): JsonResponse
    {
        auth()->user()->favorites()->attach($request->product_id);
        return response()->json([
            'success' => true,
        ]);
    }

    public function show(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        // 
    }


    public function destroy(string $id)
    {
        if (auth()->user()->hasFavorite($id)) {
            auth()->user()->favorites()->detach($id);
            return response()->json([
                'success' => true,
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Favorite does not exist in this users',
        ]);
    }
}
