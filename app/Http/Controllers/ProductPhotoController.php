<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductPhotoRequest;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{

    public function index(Product $product)
    {
        return $this->response($product->photos);
    }

    public function store(StoreProductPhotoRequest $request, Product $product){

        foreach($request->photos as $photo){
          $path =$photo->store('product/'.$product->id, 'public');
            $fullName=$photo->getClientOriginalName();
            $product->photos()->create([
               'full_name' => $fullName,
                'path' => $path,
            ]);
        }
        return $this->success('Product photo added');
    }

    public function destroy(Product $product, Photo $photo)
    {
        Gate::authorize('product:delete',);

        Storage::delete($photo->path);
        $photo->delete();
        return $this->success('Product photo removed');
    }


}
