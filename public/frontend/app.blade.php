
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lie-be-chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">

    <style>
        .link-wrapper{
            color: red;
        }

        .link-line {
            background: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
        }

        /* Ensuring spans and paragraphs are inline */
        .faq-paragraph, .link-wrapper {
            margin: 0;
            padding: 0;
            display: inline;
        }
    </style>
</head>


<!----NAVIGATION SECTION---->
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-sticky bg-light sticky-top">
    <div class="container">
        <img class="navbar-brand" src="{{asset('frontend/images/Lieblings-300x126.png')}}" alt="Logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Startseite</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Models.html">Models</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./About.html">Über uns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./FAQ.html">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./contact.html">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Account.html">Mein Konto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')


<footer class="bg-light">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <img class="navbar-brand" src="{{asset('frontend/images/Lieblings-300x126.png')}}" alt="Logo">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="./jobDetails.html">Jobs</a></li>
                    <li class="list-inline-item"><a href="#">How it works</a></li>
                    <li class="list-inline-item"><a href="#">Pricing</a></li>
                    <li class="list-inline-item"><a href="#">Privacy</a></li>
                    <li class="list-inline-item"><a href="#">Testimonials</a></li>
                    <li class="list-inline-item"><a href="#">Memberships</a></li>
                </ul>
                <div class="social-icons">
                    <a href="#" target="_blank" class="me-2"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="#" target="_blank" class="me-2"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="#" target="_blank" class="me-2"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#" target="_blank" class="me-2"><i class="fab fa-youtube fa-2x"></i></a>
                </div>
                <h5 class="mt-5 text-white">© 2024 All rights reserved Lieblings Chat.</h5>
            </div>
        </div>
    </div>
</footer>
</section>
<!----LOADER SECTION---->
<script src="Models-scripts.js"></script>
<script src="common.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
