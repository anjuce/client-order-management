<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function getOrdersByFilters(?string $status): \Illuminate\Database\Eloquent\Collection|array
    {
        $query = Order::query();

        if ($status) {
            $query->where('status', $status);
        }

        return $query->get();
    }

    public function create($clientId, array $data)
    {
        $data['client_id'] = $clientId;
        return Order::create($data);
    }

    public function update($id, array $data)
    {
        $order = Order::findOrFail($id);
        $order->update($data);
        return $order;
    }

    public function delete($id)
    {
        Order::destroy($id);
    }
}
