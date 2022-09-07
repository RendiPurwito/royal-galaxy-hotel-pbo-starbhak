<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicFacility extends Model
{
    use HasFactory;
    protected $table = 'public_facilities';
    protected $guarded = [''];
}
