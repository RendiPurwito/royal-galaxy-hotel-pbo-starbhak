<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFacility extends Model
{
    use HasFactory;
    protected $table = 'room_facilities';
    protected $guarded = [''];

    protected function room(){
        return $this->hasMany(Room::class);
    }

    protected function invoice(){
        return $this->hasMany(Booking::class);
    }

}
