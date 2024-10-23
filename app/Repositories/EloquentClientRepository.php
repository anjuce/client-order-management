<?php

namespace App\Repositories;

class EloquentClientRepository implements ClientRepositoryInterface
{
    public function getAll()
    {
        return Client::all();
    }
    public function findById($id)
    {
        return Client::findOrFail($id);
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
        return Client::destroy($id);
    }
}
