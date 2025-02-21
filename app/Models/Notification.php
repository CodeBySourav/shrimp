<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
   
    protected $table = 'notifications'; 

    protected $fillable = [
        'id',
        'message',
        'product_id',
        'created_at',
        'updated_at'
    ];
}
