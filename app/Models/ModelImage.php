<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelImage extends Model
{
    use HasFactory;

    public function model_info()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
