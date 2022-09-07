<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $guarded = [''];

    public function guest(){
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
