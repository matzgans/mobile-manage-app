<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerOrder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ktp_id', 'address', 'phone'];

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
