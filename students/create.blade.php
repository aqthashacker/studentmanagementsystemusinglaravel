@extends('layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Student</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="student_code">Student Code</label>
            <input type="text" name="student_code" id="student_code" class="form-control" value="{{ old('student_code', \App\Models\Student::generateStudentCode()) }}" readonly>
        </div>

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required>
        </div>

        <div class="form-group">
            <label for="middle_name">Middle Name</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ old('middle_name') }}">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
        </div>

        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ old('birth_date') }}" required>
        </div>


        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="address_one">Address</label>
            <input type="text" name="address_one" id="address_one" class="form-control" value="{{ old('address_one') }}" required>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
        </div>

        <div class="form-group">
            <label for="district">District</label>
            <select name="district" id="district" class="form-control" required>
                <option value="">Select District</option>
                <option value="Kandy" {{ old('district') == 'Kandy' ? 'selected' : '' }}>Kandy</option>
                <option value="Trincomalee" {{ old('district') == 'Trincomalee' ? 'selected' : '' }}>Trincomalee</option>
                <option value="Jaffna" {{ old('district') == 'Jaffna' ? 'selected' : '' }}>Jaffna</option>
                <option value="Anuradhapura" {{ old('district') == 'Anuradhapura' ? 'selected' : '' }}>Anuradhapura</option>
                <option value="Kurunegala" {{ old('district') == 'Kurunegala' ? 'selected' : '' }}>Kurunegala</option>
                <option value="Ratnapura" {{ old('district') == 'Ratnapura' ? 'selected' : '' }}>Ratnapura</option>
                <option value="Galle" {{ old('district') == 'Galle' ? 'selected' : '' }}>Galle</option>
                <option value="Badulla" {{ old('district') == 'Badulla' ? 'selected' : '' }}>Badulla</option>
                <option value="Colombo" {{ old('district') == 'Colombo' ? 'selected' : '' }}>Colombo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="contact_no">Contact No</label>
            <input type="text" name="contact_no" id="contact_no" class="form-control" value="{{ old('contact_no') }}" required>
        </div>

        <div class="form-group">
            <label for="profile_image">Profile Image</label>
            <input type="file" name="profile_image" id="profile_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add Student</button>
    </form>
</div>
@endsection
