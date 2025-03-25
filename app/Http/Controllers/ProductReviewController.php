<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{

    public function index(Product $product)
    {
        return $this->response([
            'overall_rating' => round($product->review->avg('rating'), 1),
            'overall_count' => $product->review->count(),
            'reviews' => $product->review()->with('user')->paginate(10),
        ]);
    }

    public function store(Product $product, StoreReviewRequest $request)
    {

        $review =  $product->review()->create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'body' => $request->body,
        ]);

        return  $this->success('review created', $review);
    }
}
