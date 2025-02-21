<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorFormSubmission extends Model
{
    use HasFactory;

    protected $table = 'vendor_form_submissions';

    protected $fillable = [
        'user_id','user_name','product_id', 'quantity_range', 'price', 'currency', 'validity', 'treatment', 'description' , 'certified' , 'rating' ,'created_at'
    ];
}
