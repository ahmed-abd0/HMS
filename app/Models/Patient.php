<?php

namespace App\Models;

use App\Models\concerns\useDefaultCasts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    // use useDefaultCasts;

    protected $fillable = [
        "name",
        "date_of_birth",
        "gender",
        "national_id",
        "insurance_number",
        "room_id",
    ];

    
    public function gender() {
        return $this->gender == 0 ? "mail" : "femail";
    }

    public function user() {
        return $this->hasOne(User::class, "employee_id");
    }

    public function records() {
        return $this->hasManyThrough(PatientRecord::class, AppointmentResrvation::class, "patient_id", "resrvation_id");
    }

    public function resrvations() {
        return $this->hasMany(AppointmentResrvation::class, "patient_id");
    }

}