<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Order;

class ClientRepository implements ClientRepositoryInterface
{
    public function getAll()
    {
        return Client::with('orders')->get();
    }

    public function findById($id)
    {
        return Client::find($id);
    }

    public function create(array $data)
    {
        return Client::create($data);
    }

    public function update($id, array $data)
    {
        $client = Client::findOrFail($id);
        $client->update($data);
        return $client;
    }

    public function delete($id)
    {
        Client::destroy($id);
    }
}
