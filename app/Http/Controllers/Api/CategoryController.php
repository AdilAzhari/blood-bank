<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Traits\ApiResponser;

class CategoryController
{
    use ApiResponser;

    public function index()
    {
        $categories = Category::all();

        return $this->successResponse($categories, 'Categories Retrieved Successfully');
    }
}
