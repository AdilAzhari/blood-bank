<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class MainController
{
    use ApiResponser;

    public function index()
    {
        return response()->json([
            'message' => 'Hello World'
        ]);
    }
}
