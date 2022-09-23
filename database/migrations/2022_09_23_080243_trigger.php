<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER update_numberofrooms after INSERT ON bookings
            FOR EACH ROW
            BEGIN UPDATE rooms set
            number_of_rooms = number_of_rooms - NEW.qty
            WHERE id = NEW.id;
            END'
        );

        DB::unprepared('CREATE TRIGGER after_delete_booking after DELETE ON bookings
            FOR EACH ROW
            BEGIN UPDATE rooms set
            number_of_rooms = number_of_rooms + OLD.qty
            WHERE id = OLD.id;
            END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER update_numberofrooms');
        DB::unprepared('DROP TRIGGER after_delete_booking');
    }
};
