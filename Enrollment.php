<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_code',
        'course_id',
        'enrollment_date'
    ];

    // In Enrollment.php model
public function student()
{
    return $this->belongsTo(Student::class, 'student_code', 'student_code'); 
}


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
