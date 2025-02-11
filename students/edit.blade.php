<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Student</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="student_code" class="form-label">Student Code:</label>
                        <input type="text" id="student_code" name="student_code" value="{{ $student->student_code }}" class="form-control" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name:</label>
                        <input type="text" id="first_name" name="first_name" value="{{ $student->first_name }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="middle_name" class="form-label">Middle Name:</label>
                        <input type="text" id="middle_name" name="middle_name" value="{{ $student->middle_name }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" value="{{ $student->last_name }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label">Birth Date:</label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ $student->birth_date }}" class="form-control" required>
                    </div>


                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $student->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="address_one" class="form-label">Address:</label>
                        <input type="text" id="address_one" name="address_one" value="{{ $student->address_one }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City:</label>
                        <input type="text" id="city" name="city" value="{{ $student->city }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="district" class="form-label">District:</label>
                        <select id="district" name="district" class="form-control" required>
                            <option value="">Select District</option>
                            <option value="Kandy" {{ $student->district == 'Kandy' ? 'selected' : '' }}>Kandy</option>
                            <option value="Trincomalee" {{ $student->district == 'Trincomalee' ? 'selected' : '' }}>Trincomalee</option>
                            <option value="Jaffna" {{ $student->district == 'Jaffna' ? 'selected' : '' }}>Jaffna</option>
                            <option value="Anuradhapura" {{ $student->district == 'Anuradhapura' ? 'selected' : '' }}>Anuradhapura</option>
                            <option value="Kurunegala" {{ $student->district == 'Kurunegala' ? 'selected' : '' }}>Kurunegala</option>
                            <option value="Ratnapura" {{ $student->district == 'Ratnapura' ? 'selected' : '' }}>Ratnapura</option>
                            <option value="Galle" {{ $student->district == 'Galle' ? 'selected' : '' }}>Galle</option>
                            <option value="Badulla" {{ $student->district == 'Badulla' ? 'selected' : '' }}>Badulla</option>
                            <option value="Colombo" {{ $student->district == 'Colombo' ? 'selected' : '' }}>Colombo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $student->email }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact_no" class="form-label">Contact No:</label>
                        <input type="text" id="contact_no" name="contact_no" value="{{ $student->contact_no }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="profile_image" class="form-label">Profile Image:</label>
                        <input type="file" id="profile_image" name="profile_image" class="form-control">
                        @if ($student->profile_image)
                            <img src="{{ asset('storage/' . $student->profile_image) }}" alt="Profile Image" class="mt-2" width="100">
                        @endif
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Update Student</button>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
