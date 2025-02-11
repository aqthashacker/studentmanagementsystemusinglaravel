<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            height: 80px; 
        }

        .navbar-dark {
            background-color: #000 !important; 
        }

        .navbar-brand {
            margin: 0; 
        }

        .card {
            border: none;
        }

        .card-title {
            font-size: 1.5rem;
        }

        .card-body {
            padding: 2rem;
        }

        .main-heading {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 40px;
            font-size: 2rem;
            font-weight: bold;
        }

        .hero-image {
            width: 100%;
            height: 400px; 
            object-fit: cover; 
            margin-bottom: 30px;
        }


        .card-img-top {
            height: 200px; 
            object-fit: cover; 
        }

        footer {
            background-color: #000; 
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">STUDENT MANAGEMENT SYSTEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- Added ms-auto for right alignment -->
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/students') }}">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/courses') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/enrollments') }}">Enrollments</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
        <img src="{{ asset('images/download.jpeg') }}" alt="Student Management System" class="hero-image">
    </div>

    <div class="container mt-5">
        <h1 class="main-heading">Welcome to Student Management System</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/student.jpg') }}" class="card-img-top" alt="Manage Students">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manage Students</h5>
                        <p class="card-text">Easily manage and track student information and records.</p>
                        <a href="{{  route('students.index') }}" class="btn btn-primary" >Go to Students</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/course.jpg') }}" class="card-img-top" alt="Manage Courses">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manage Courses</h5>
                        <p class="card-text">Add, update, and view the courses offered by the school.</p>
                        <a href="{{ url('/courses') }}" class="btn btn-primary">Go to Courses</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/enrollment.jpeg') }}" class="card-img-top" alt="Manage Enrollment">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manage Enrollment</h5>
                        <p class="card-text">Track and manage student enrollments in various courses.</p>
                        <a href="{{ url('/enrollments') }}" class="btn btn-primary">Go to Enrollment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        @yield('content')
    </div>


    <footer>
        &copy; <span id="current-year"></span> Student Management System. All Rights Reserved.
    </footer>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
</body>
</html>
