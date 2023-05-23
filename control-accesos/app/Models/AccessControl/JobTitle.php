<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'company_id',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
