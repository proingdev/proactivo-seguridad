<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'nit',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
