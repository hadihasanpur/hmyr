<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentImage extends Model
{
    use HasFactory;
    protected $table = "department_images";
    protected $guarded = [];
}
