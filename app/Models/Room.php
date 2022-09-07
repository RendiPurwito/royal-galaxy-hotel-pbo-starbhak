<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $guarded = [''];

    public function room_facility(){
        return $this->belongsTo(RoomFacility::class,'room_facility_id');
    }
    protected function booking(){
        return $this->hasMany(Booking::class);
    }
}
