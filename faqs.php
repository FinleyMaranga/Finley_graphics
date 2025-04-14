<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - Finley Graphics Academy</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            background: linear-gradient(to right, #001f3f, #0074cc); /* Dark Blue Gradient */
            color: #fff;
            padding-top: 80px; /* Prevents content from hiding behind navbar */
        }

        .faq-section {
            background: #ffffff;
            color: #333;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .accordion-button {
            font-weight: bold;
            color: #0074cc;
        }

        .accordion-button:not(.collapsed) {
            background: #0074cc;
            color: #fff;
        }

        .accordion-button:hover {
            background: #0056b3;
            color: #fff;
        }

        .accordion-body {
            background: #f8f9fa;
            color: #333;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar (Unchanged) -->
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
                        <a class="nav-link dropdown-toggle" href="#" id="teamDropdown" role="button" data-bs-toggle="dropdown">
                            About Us
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="loadPage('team.php')">Team</a></li>
                            <li><a class="dropdown-item" href="#" onclick="loadPage('gallery.php')">Gallery</a></li>
                            <li><a class="dropdown-item" href="#" onclick="loadPage('faqs.php')">FAQs</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="loadPage('admin.php')">Admin Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- FAQs Section -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Frequently Asked Questions</h2>

        <div class="faq-section p-4">
            <div class="accordion" id="faqAccordion">
                <!-- FAQ 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            What courses do you offer?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We offer courses in Graphic Design, UI/UX, Branding, Motion Graphics, and more.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            How can I enroll in a course?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            You can enroll by signing up on our website and selecting your preferred course.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Do you offer online classes?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes! We provide both online and in-person classes based on your preference.
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            Is there a certificate upon completion?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Absolutely! We provide a certificate of completion for all our courses.
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            What payment methods do you accept?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We accept credit/debit cards, PayPal, and mobile money transfers.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
