<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'course'])->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = Student::all();  
        $courses = Course::all();    
        return view('enrollments.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_code' => 'required|exists:students,student_code',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
        ]);

        Enrollment::create([
            'student_code' => $request->student_code,
            'course_id' => $request->course_id,
            'enrollment_date' => $request->enrollment_date,  
        ]);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }

    public function show($id)
    {
        $enrollment = Enrollment::with(['student', 'course'])->findOrFail($id);
        return view('enrollments.show', compact('enrollment'));
    }

    public function edit($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.edit', compact('enrollment', 'students', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_code' => 'required|exists:students,student_code',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',  
        ]);

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update([
            'student_code' => $request->student_code,
            'course_id' => $request->course_id,
            'enrollment_date' => $request->enrollment_date,  
        ]);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
}
