<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    private static $doctor;

    public static function newDoctor($request){

        self::$doctor = new Doctor();

        self::$doctor->department_id = $request->department_id;
        self::$doctor->name = $request->name;
        self::$doctor->phone = $request->phone;
        self::$doctor->fee = $request->fee;
        self::$doctor->save();
    }

    public static function updateDoctor($request, $id){

        self::$doctor = Doctor::find($id);

        self::$doctor->department_id = $request->department_id;
        self::$doctor->name = $request->name;
        self::$doctor->phone = $request->phone;
        self::$doctor->fee = $request->fee;
        self::$doctor->save();
    }

    public function department(){

        return $this->belongsTo('App\models\Department');
    }
}
