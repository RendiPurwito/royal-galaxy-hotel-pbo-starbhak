<?php

namespace App\Models;

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $guarded = [''];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }

    public function room_facility(){
        return $this->belongsTo(RoomFacility::class);
    }


}
