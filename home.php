<?php
// Start session if needed
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finley Graphics Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            background: linear-gradient(to right,rgb(77, 79, 82), #6610f2);
            color: white;
            padding: 50px 0;
        }
        .card {
            transition: 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container-fluid hero-section text-center">
    <!-- Logo Section -->
    <img src="company.png" alt="Finley Graphics Academy Logo" style="width: 150px; height: auto;"> 

    <h1 class="mt-3">Welcome to Finley Graphics Academy</h1>
    <p class="lead">Empowering Creativity with Professional Training</p>
</div>

<!-- Courses Section -->
<div class="container my-5">
    <h2 class="text-center text-primary">Our Courses</h2>
    <p class="text-center">Explore our range of courses designed to turn beginners into professionals.</p>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <img src="images.jpeg" class="card-img-top" alt="Course 1">
                <div class="card-body">
                    <h5 class="card-title text-primary">Graphic Design Basics</h5>
                    <p class="card-text">Learn the fundamentals of graphic design and build a strong foundation.</p>
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#signupModal">Enroll Now</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <img src="adobe.png" class="card-img-top" alt="Course 2">
                <div class="card-body">
                    <h5 class="card-title text-primary">Advanced Photoshop</h5>
                    <p class="card-text">Master Photoshop and create stunning digital artwork.</p>
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#signupModal">Enroll Now</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <img src="figma.jpeg" class="card-img-top" alt="Course 3">
                <div class="card-body">
                    <h5 class="card-title text-primary">UI/UX Design</h5>
                    <p class="card-text">Learn how to design user-friendly and engaging interfaces.</p>
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#signupModal">Enroll Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sign-Up Modal -->
<div id="signupModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="connect.php" method="POST">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                </form>
                <p class="mt-3">Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div id="loginModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="loginEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
