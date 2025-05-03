<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionRequest extends Model
{
    protected $fillable = [
        'user_id',
        'dog_id',
        'contact_email',
        'contact_phone',
        'message',
        'status',
    ];
}
