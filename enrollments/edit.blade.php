@extends('layout')

@section('content')
    <div class="container mt-4">
        <h1>Edit Enrollment</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="student_code">Select Student</label>
                <select name="student_code" id="student_code" class="form-control" required>
                    <option value="">-- Choose Student --</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->student_code }}" {{ old('student_code', $enrollment->student_code) == $student->student_code ? 'selected' : '' }}>
                            {{ $student->full_name }} ({{ $student->student_code }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="course_id">Select Course</label>
                <select name="course_id" id="course_id" class="form-control" required>
                    <option value="">-- Choose Course --</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ old('course_id', $enrollment->course_id) == $course->id ? 'selected' : '' }}>
                            {{ $course->course_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="enrollment_date">Enrollment Date</label>
                <input type="date" name="enrollment_date" id="enrollment_date" class="form-control" value="{{ old('enrollment_date', $enrollment->enrollment_date) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Enrollment</button>
        </form>
    </div>
@endsection
