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

        $data = Client::all();
        $message = 'All Clients';
        $status = true;
        $code = 200;
        if ($data->isEmpty()) {
            $message = 'No Clients Found';
            $data = null;
        }
        // return ClientResource::collection(Client::all());

        return $this->customResponse($data,$status, $message, 200);
    }
    public function Show($id)
    {
        $data = Client::findOrFail($id);
        $message = 'Client Details';
        $status = true;
        $code = 200;
        if ($data == null) {
            $message = 'No Client Found';
            $data = null;
        }
        return $this->customResponse($status,$data, $message, 200);
    }
}
