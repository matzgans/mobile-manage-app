<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrders extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ktp_id', 'address', 'phone'];
}
