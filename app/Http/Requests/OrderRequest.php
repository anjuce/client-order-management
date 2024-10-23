<?php

namespace App\Http\Requests;

use App\Enums\OrderStatus;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'status' => 'required|in:' . implode(',', OrderStatus::values()),
            'description' => 'required|string',
            'amount' => 'required|string',
            'due_date' => 'nullable|date',
        ];
    }
}
