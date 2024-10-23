<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderListRequest;
use App\Http\Requests\OrderRequest;
use App\Services\ClientService;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    /**
     * @param OrderService $orderService
     */
    public function __construct(
        protected OrderService $orderService,
        protected ClientService $clientService,
    )
    {
    }

    /**
     * @param $clientId
     * @return JsonResponse
     */
    public function getClientOrders($clientId)
    {
        $client = $this->clientService->findById($clientId);

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $orders = $client->orders()->get();

        return response()->json($orders);
    }

    /**
     * @param OrderListRequest $request
     * @return JsonResponse
     */
    public function index(OrderListRequest $request)
    {
        $status = $request->query('status');

        $orders = $this->orderService->getOrdersByFilters($status);

        return response()->json($orders);
    }

    /**
     * Create order for client
     *
     * @param OrderRequest $request
     * @param $clientId
     * @return JsonResponse
     */
    public function store(OrderRequest $request, $clientId): JsonResponse
    {
        $client = $this->clientService->findById($clientId);

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $order = $this->orderService->createOrder($clientId, $request->validated());

        return response()->json([
            'message' => 'Order created successfully',
            'order' => $order
        ], 201);
    }

    /**
     * Update order
     *
     * @param OrderRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(OrderRequest $request, $id): JsonResponse
    {
        $order = $this->orderService->updateOrder($id, $request->validated());

        return response()->json([
            'message' => 'Order updated successfully',
            'order' => $order
        ]);
    }

    /**
     * Delete order
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $this->orderService->deleteOrder($id);

        return response()->json([
            'message' => 'Order deleted successfully'
        ]);
    }
}
