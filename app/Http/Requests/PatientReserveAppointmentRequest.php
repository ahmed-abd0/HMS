<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class PatientReserveAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "doctor_id" => ["required", "exists:employees,id"],
            "time" => [
                "required",
                function (string $attribute, mixed $value, Closure $fail) {

                    if (auth()->user()->patient->exceededResrvationsDailyLimit($value)) {
                        $fail("exceeded resrvation limit");
                    }

                    if($this->doctor()) {
                       
                        if ($this->doctor()->isHoliday($value)) {
                            $fail("invalid date doctor is on holiday");
                        }
    
                        if (!$this->doctor()->shift?->inShiftHours($value)) {
                            $fail("reservation time is not in shift hours");
                        }

                        if($this->doctor()->hasResrvationAt($value) && settings("reservation_is_reservation_at_the_same_time_allowed") == 0 ) {
                            $fail("doctor already has reservation at that time");
                        }
                    }
                   
                }
            ],
        ];
    }

   

    public function doctor()
    {
        return Employee::find($this->doctor_id);
    }
}
