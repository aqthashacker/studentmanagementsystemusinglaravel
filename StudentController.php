<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'student_code' => 'required|unique:students',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'address_one' => 'required',
            'city' => 'required',
            'district' => 'required',
            'email' => 'required|email|unique:students,email',
            'contact_no' => 'required|numeric',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $profileImagePath = null;
        if ($request->hasFile('profile_image')) {
            $imageName = time() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('build/images'), $imageName);
            $profileImagePath = 'build/images/' . $imageName;
        }

        $birthDate = Carbon::parse($request->birth_date);
        $age = $birthDate->diffInYears(Carbon::now());

        
        Student::create([
            'student_code' => $request->student_code,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'age' => $age,  // Save the calculated age
            'gender' => $request->gender,
            'address_one' => $request->address_one,
            'city' => $request->city,
            'district' => $request->district,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'profile_image' => $profileImagePath, 
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        // Validation
        $request->validate([
            'student_code' => 'required|unique:students,student_code,' . $student->id,
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'address_one' => 'required',
            'city' => 'required',
            'district' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'contact_no' => 'required|numeric',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            if ($student->profile_image && file_exists(public_path($student->profile_image))) {
                unlink(public_path($student->profile_image));
            }

            $imageName = time() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('build/images'), $imageName);
            $profileImagePath = 'build/images/' . $imageName;
        } else {
            $profileImagePath = $student->profile_image;
        }

        $birthDate = Carbon::parse($request->birth_date);
        $age = $birthDate->diffInYears(Carbon::now());

        $student->update([
            'student_code' => $request->student_code,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'age' => $age,  // Save the calculated age
            'gender' => $request->gender,
            'address_one' => $request->address_one,
            'city' => $request->city,
            'district' => $request->district,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'profile_image' => $profileImagePath, 
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        // Delete profile image
        if ($student->profile_image && file_exists(public_path($student->profile_image))) {
            unlink(public_path($student->profile_image));
        }

        // Delete student record
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
