<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShrimpProduct extends Model
{
    use HasFactory;

    protected $table = 'shrimp_products';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'name',
        'size_range',
        'freezing_method',
        'brand',
        'image_path',
        'section',
        'compliance_statement',
        'raw_materials',
        'processing',
        'freezing',
        'glazing',
        
    ];
}
