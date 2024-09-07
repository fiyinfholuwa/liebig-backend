@extends('frontend.app')

@section('content')
    <style>
        .hero-content p{
            color: whitesmoke;
        }
    </style>
    <section class="hero">
        <div class="">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="">
                        <!-- Desktop Image -->
                        <div class="d-none d-md-block hero-image">
                            <img src="{{asset('frontend/images/contact desktop.png')}}" alt="Your Logo" class="img-fluid hero-logo" style="max-width: 100%;">
                        </div>
                        <!-- Mobile Image -->
                        <div class="d-block d-md-none mobile">
                            <img src="{{asset('frontend/images/contact mobile.png')}}" alt="Mobile Banner" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-right hero-content">
                    <div class="text-black  mb-12">
                        <h2 class="fw-bold mt-4 text">Wir sind immer für Sie da!</h2>
                        <p class="fs-6 text">Bei Lieblings-Chat steht Ihre Zufriedenheit an erster Stelle. Egal, ob Sie Fragen, Anregungen oder
                            Probleme haben, unser engagiertes Support-Team ist stets bereit, Ihnen zu helfen. Zögern Sie nicht,
                            uns zu kontaktieren – wir freuen uns darauf, von Ihnen zu hören.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-start">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-phone text-danger me-2"></i>
                            <div style="color: whitesmoke">
                                <strong>Telefon:</strong><br>
                                Unser Support-Team ist von Montag bis Freitag zwischen 9:00 und 18:00 Uhr erreichbar:<br>
                                <span>[+49 15773580503]</span>
                            </div>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-envelope text-danger me-2"></i>
                            <div style="color: whitesmoke">
                                <strong>Email</strong><br>
                                Für allgemeine Anfragen und Support:<br>
                                <span>[info@lieblings-chat.de]</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!---FORM SECTION---->
    <style>
        .custom-shadow {
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .custom-container {
            max-width: 1400px;
        }
    </style>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card custom-shadow">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <i class="fas fa-envelope fa-3x text-danger mb-4"></i>
                                <h2 class="fw-bold mb-4">Wenn Ihnen gefällt, was Sie sehen, lassen Sie uns zusammenarbeiten.</h2>
                                <p class="text-muted">Füllen Sie unser Kontaktformular aus, und wir werden uns so schnell wie möglich bei Ihnen melden.
                                    Bitte geben Sie dabei möglichst viele Informationen an, damit wir Ihnen bestmöglich weiterhelfen
                                    können.</p>
                            </div>
                            <div class="col-md-6">
                                <form id="contactForm" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control" id="fullName" placeholder="Vollständiger Name" required>
                                            <div class="invalid-feedback">
                                                Bitte geben Sie Ihren vollständigen Namen an.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="email" class="form-control" id="email" placeholder="E-Mail" required>
                                            <div class="invalid-feedback">
                                                Bitte geben Sie eine gültige E-Mail-Adresse an.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="message" rows="4" placeholder="Ihre Nachricht..." required></textarea>
                                        <div class="invalid-feedback">
                                            Bitte geben Sie Ihre Nachricht ein.
                                        </div>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="privacyPolicy" required>
                                        <label class="form-check-label" for="privacyPolicy">
                                            Ich akzeptiere die <a href="#" class="text-primary">Datenschutzrichtlinie</a>
                                        </label>
                                        <div class="invalid-feedback">
                                            Sie müssen der Datenschutzrichtlinie zustimmen.
                                        </div>
                                    </div>
                                    <button type="submit" class="btn ">Senden</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </section>
@endsection
