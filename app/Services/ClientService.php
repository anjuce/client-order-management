<?php

namespace App\Services;

use App\Repositories\ClientRepository;

class ClientService
{
    /**
     * @param ClientRepository $clientRepository
     */
    public function __construct(protected ClientRepository $clientRepository)
    {
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->clientRepository->findById($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllClients(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->clientRepository->getAll();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createClient(array $data): mixed
    {
        return $this->clientRepository->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function updateClient($id, array $data): mixed
    {
        return $this->clientRepository->update($id, $data);
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteClient($id)
    {
        $this->clientRepository->delete($id);
    }
}
