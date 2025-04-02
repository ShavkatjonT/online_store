<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    public function index()
    {
        return ProductResource::collection(Product::cursorPaginate(25));
    }


    public function store(StoreProductRequest $request)
    {
        $product=Product::create($request->toArray());
        return $this->success('Product created', new ProductResource($product));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        return $this->response(new ProductResource($product::with('stocks')->find($product->id)));
    }

    public function related(Product $product)
    {
        return $this->response(
            ProductResource::collection(Product::query()->where('category_id', $product->category_id)->limit(20)->get())
        );
    }

    public function destroy(Product $product)
    {
        Gate::authorize('product:delete',);

        Storage::delete($product->photos->pluck('path')->toArray());
        $product->delete();
        $product->photos()->delete();
        return $this->success('Product deleted');
    }
}
