@extends('layout')

@section('content')
    <h1>Create New Course</h1>

    <!-- Form to create a new course -->
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <!-- Course ID Field -->
        <div class="mb-3">
            <label for="course_id" class="form-label">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="{{ old('course_id') }}" required>
            @error('course_id')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Course Name Field -->
        <div class="mb-3">
            <label for="course_name" class="form-label">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="{{ old('course_name') }}" required>
            @error('course_name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Course Description Field -->
        <div class="mb-3">
            <label for="course_desc" class="form-label">Course Description</label>
            <textarea class="form-control" id="course_desc" name="course_desc" rows="3" required>{{ old('course_desc') }}</textarea>
            @error('course_desc')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Create Course</button>
    </form>

@endsection
