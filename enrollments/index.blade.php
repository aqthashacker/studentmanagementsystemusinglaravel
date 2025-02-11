@extends('layout')

@section('content')
    <h1>Enrollments List</h1>
    <a href="{{ route('enrollments.create') }}" class="btn btn-success mb-3">Enroll Student</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Course Name</th>
                <th>Enrollment Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->id }}</td>
                    <td>{{ $enrollment->student->full_name }}</td> <!-- Display student's full name -->
                    <td>{{ $enrollment->course->course_name }}</td>
                    <td>{{ $enrollment->enrollment_date }}</td>
                    <td>
                        <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
