<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_code',
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'age',
        'gender',
        'address_one',
        'city',
        'district',
        'email',
        'contact_no',
        'profile_image'
    ];


    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }

    public static function generateStudentCode()
    {
        $latestStudent = self::latest()->first();
        $serialNo = $latestStudent ? (int) substr($latestStudent->student_code, -4) + 1 : 1;
        return 'STU_' . str_pad($serialNo, 4, '0', STR_PAD_LEFT);
    }


    public function calculateAge()
    {
        $birthDate = Carbon::parse($this->birth_date);
        $age = $birthDate->diffInYears(Carbon::create(2025, 1, 1)); 
        return $age;
    }

    public function setAgeAttribute($value)
    {
        $this->attributes['age'] = $this->calculateAge();
    }
}
