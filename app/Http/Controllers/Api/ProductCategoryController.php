<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductCategoryController extends Controller
{
    public function index(Product $product): JsonResponse
    {
        $categories = $product->categories()->orderBy('categories.id')->get();

        return response()->json($categories);
    }
}
