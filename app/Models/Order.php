<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['client_id', 'description', 'amount', 'status', 'due_date'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
