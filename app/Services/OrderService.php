<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    /**
     * @param OrderRepository $orderRepository
     */
    public function __construct(public OrderRepository $orderRepository)
    {
    }

    /**
     * @param $clientId
     * @param array $data
     * @return mixed
     */
    public function createOrder($clientId, array $data)
    {
        return $this->orderRepository->create($clientId, $data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function updateOrder($id, array $data)
    {
        return $this->orderRepository->update($id, $data);
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteOrder($id)
    {
        $this->orderRepository->delete($id);
    }

    /**
     * @param $status
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function getOrdersByFilters($status)
    {
        return $this->orderRepository->getOrdersByFilters($status);
    }
}
