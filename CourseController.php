<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|string|unique:courses',
            'course_name' => 'required|string|unique:courses',
            'course_desc' => 'required|string',
        ]);
        Course::create([
            'course_id' => $request->course_id,
            'course_name' => $request->course_name,
            'course_desc' => $request->course_desc,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|string|unique:courses,course_id,' . $id,
            'course_name' => 'required|string|unique:courses,course_name,' . $id,
            'course_desc' => 'required|string',
        ]);

        $course = Course::findOrFail($id);
        $course->update([
            'course_id' => $request->course_id,
            'course_name' => $request->course_name,
            'course_desc' => $request->course_desc,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}
