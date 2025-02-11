@extends('layout')

@section('content')
    <h1>Courses List</h1>

    <!-- Button to create a new course -->
    <a href="{{ route('courses.create') }}" class="btn btn-success mb-3">Create New Course</a>

    <!-- Table to display courses -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>  <!-- Row for Course ID -->
                <th>Course ID</th>  <!-- Row for Course ID -->
                <th>Course Name</th>  <!-- Row for Course Name -->
                <th>Description</th>  <!-- Row for Course Description -->
                <th>Actions</th>  <!-- Row for actions like View, Edit, Delete -->
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $loop->iteration }}</td>  <!-- Display Course Index -->
                    <td>{{ $course->course_id }}</td>  <!-- Display Course ID -->
                    <td>{{ $course->course_name }}</td>  <!-- Display Course Name -->
                    <td>{{ $course->course_desc }}</td>  <!-- Display Course Description -->
                    <td>
                        <!-- Action Buttons: View, Edit, Delete -->
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
