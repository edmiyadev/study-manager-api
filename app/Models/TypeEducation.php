<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEducation extends Model
{
    /** @use HasFactory<\Database\Factories\TypeEducationFactory> */
    use HasFactory;

    protected $fillable  = ['name'];
}
