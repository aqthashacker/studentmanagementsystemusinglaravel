@extends('layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Student List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-4">Add New Student</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student Code</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Profile Image</th>
                <th>Birth Date</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>City</th>
                <th>District</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->student_code }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->middle_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>
                        @if($student->profile_image)
                            <img src="{{ asset($student->profile_image) }}" alt="Profile Image" style="width: 50px; height: 50px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $student->birth_date }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->address_one }}</td>
                    <td>{{ $student->city }}</td>
                    <td>{{ $student->district }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->contact_no }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
