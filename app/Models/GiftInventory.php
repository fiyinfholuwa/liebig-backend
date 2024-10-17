<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftInventory extends Model
{
    use HasFactory;

    public function reward_info()
    {
        return $this->belongsTo(WheelFortune::class, 'reward_id');
    }
}
