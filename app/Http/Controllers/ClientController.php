<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    /**
     * @param ClientService $clientService
     */
    public function __construct(protected ClientService $clientService)
    {
    }

    /**
     * Client list
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $clients = $this->clientService->getAllClients();
        return response()->json([
            'success' => true,
            'data' => $clients
        ], 200);
    }

    /**
     * Create new client
     *
     * @param ClientRequest $request
     * @return JsonResponse
     */
    public function store(ClientRequest $request): JsonResponse
    {
        $client = $this->clientService->createClient($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Client added success',
            'data' => $client
        ], 201);
    }

    /**
     * Update Client
     *
     * @param ClientRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(ClientRequest $request, int $id): JsonResponse
    {
        $client = $this->clientService->updateClient($id, $request->validated());

        if ($client) {
            return response()->json([
                'success' => true,
                'message' => 'Client updated success',
                'data' => $client
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Not found Client'
            ], 404);
        }
    }

    /**
     * Видалення клієнта
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->clientService->deleteClient($id);

        return response()->json([
            'success' => true,
            'message' => 'Client deleted success'
        ], 200);
    }
}
