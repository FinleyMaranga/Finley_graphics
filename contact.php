<?php
session_start();
include 'db.php'; // Include your database connection file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Finley Graphics Academy</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #495057;
        }
        .contact-section {
            background-color: #343a40;
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        .contact-section h2 {
            color: #007bff;
            margin-bottom: 40px;
            font-size: 36px;
        }
        .contact-info, .contact-form {
            background-color: #495057;
            color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .contact-info h3 {
            font-size: 28px;
            color: #007bff;
            margin-bottom: 20px;
        }
        .contact-info p {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .contact-form .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .contact-form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            transition: 0.3s;
            width: 100%;
        }
        .contact-form button:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#" onclick="loadPage('home.php')">
                <img src="company.png" alt="Finley Graphics Academy" class="logo-img">
                <span class="ms-2">Finley Graphics Academy</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#" onclick="loadPage('home.php')">Home</a></li>
                    <!-- About Us Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown">
                            About Us
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="loadPage('team.php')">Team</a></li>
                            <li><a class="dropdown-item" href="#" onclick="loadPage('gallery.php')">Gallery</a></li>
                            <li><a class="dropdown-item" href="#" onclick="loadPage('faqs.php')">FAQs</a></li>
                            <li><a class="dropdown-item" href="#" onclick="loadPage('contact.php')">Contact us</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="loadPage('admin.php')">Admin Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contact Us Section -->
    <section class="contact-section">
        <div class="container">
            <h2>Get in Touch with Us</h2>
            <p>We're always here to assist you! Whether you have a question about our courses, need support, or just want to connect, feel free to reach out.</p>
        </div>
    </section>

    <!-- Contact Information and Form -->
    <section class="container my-5">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-md-6 mb-4">
                <div class="contact-info">
                    <h3>Our Address</h3>
                    <p>1234 Finley Graphics Academy Street</p>
                    <p>Nairobi, Kenya</p>
                    <p><strong>Email:</strong> support@finleygraphicsacademy.com</p>
                    <p><strong>Phone:</strong> +254707702001</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-6">
                <div class="contact-form">
                    <h3>Send Us a Message</h3>
                    <form action="send_message.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    

    <!-- Bootstrap and JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function loadPage(page) {
            fetch(page)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('content').innerHTML = data;
                })
                .catch(error => console.error('Error loading the page:', error));
        }
    </script>

</body>
</html>
