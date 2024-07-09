<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ClientController
{
    use ApiResponser;

    public function index()
    {
        $clients = Client::all();
        return $this->successResponse(ClientResource::collection($clients), 'Clients Retrieved Successfully');
    }
}
