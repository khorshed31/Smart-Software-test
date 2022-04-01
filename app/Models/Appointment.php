<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    private static $appointment;

    public static function newAppointment($request){


        self::$appointment = new Appointment();

        self::$appointment->appointment_date = $request->appointment_date;
        self::$appointment->doctor_id = $request->doctor_id;
        self::$appointment->save();
    }

    public static function newPatient($request, $id){


        self::$appointment = new Appointment();

        self::$appointment->patient_name = $request->patient_name;
        self::$appointment->patient_phone = $request->patient_phone;
        self::$appointment->save();
    }
}
