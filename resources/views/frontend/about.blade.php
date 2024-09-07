
@extends('frontend.app')

@section('content')
    <link href="{{asset('frontend/css/About.css')}}" rel="stylesheet">

    <!-- Hero Section -->
    <section class="hero">
        <div class="">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="">
                        <!-- Desktop Image -->
                        <div class="d-none d-md-block hero-image">
                            <img src="{{asset('frontend/images/about us desktop.png')}}" alt="Your Logo" class="img-fluid hero-logo" style="max-width: 100%;">
                        </div>
                        <!-- Mobile Image -->
                        <div class="d-block d-md-none mobile">
                            <img src="{{asset('frontend/images/about us mobile.png')}}" alt="Mobile Banner" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-content mb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <!-- H1 hidden on mobile and shown on larger screens -->
                                    <h1 class="fs-2 fs-md-3 fs-lg-4 mt-5 text-center d-none d-md-block">Erleben Sie sinnliche Verbindungen wie nie zuvor</h1>
                                    <!-- H1 shown on mobile and hidden on larger screens -->
                                    <h1 class="fs-2 fs-md-3 fs-lg-4 mt-5 text-center d-block d-md-none">Erleben Sie sinnliche Verbindungen wie nie zuvor</h1>

                                    <!-- P hidden on mobile and shown on larger screens -->
                                    <p class="text-container text-center d-none d-md-block">
                                        Willkommen bei Lieblings-Chat.de, Ihrer exklusiven Plattform für sinnliche und persönliche Chats mit atemberaubenden Models. Anders als herkömmliche Dating-Seiten bieten wir Ihnen eine einzigartige Erfahrung, die Ihre tiefsten Wünsche und Fantasien erfüllt.
                                    </p>
                                    <!-- P shown on mobile and hidden on larger screens -->
                                    <p class="text-container text-center d-block d-md-none">
                                        Willkommen bei Lieblings-Chat.de, Ihrer exklusiven Plattform für sinnliche und persönliche Chats mit atemberaubenden Models. Anders als herkömmliche Dating-Seiten bieten wir Ihnen eine einzigartige Erfahrung, die Ihre tiefsten Wünsche und Fantasien erfüllt.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-10">
                <div class="row">
                    <div class="col-lg-6 hero-content">
                        <h1 class="fw-bold fs-2 mt-5">Exklusive Funktionen</h1>
                        <p class="fs-5">Wir bieten Ihnen weit mehr als nur Chats</p>
                        <div>
                            <h2 class="fw-bold fs-4 d-flex justify-content-center align-items-center">
                                <i class="fas fa-ban me-2"></i> Keine Abonnements
                            </h2>
                            <p class="fs-6">Sie behalten die volle Kontrolle über Ihre Ausgaben und entscheiden selbst, wie viele Coins Sie kaufen und nutzen möchten. Es gibt keine versteckten Kosten oder langfristige Verpflichtungen.</p>

                            <h2 class="fw-bold fs-4 d-flex justify-content-center align-items-center">
                                <i class="fas fa-gift me-2"></i> Kostenloses Startguthaben
                            </h2>
                            <p class="fs-6">Testen Sie unsere Plattform unverbindlich und entdecken Sie die Vielfalt unserer Angebote mit einem kostenlosen Startguthaben.</p>

                            <h2 class="fw-bold fs-4 d-flex justify-content-center align-items-center">
                                <i class="fas fa-sync-alt me-2"></i> Glücksrad
                            </h2>
                            <p class="fs-6">Drehen Sie unser Glücksrad und gewinnen Sie aufregende Preise, darunter Geschenke oder bis zu 4500 Coins. Jede Drehung gewinnt.</p>

                            <h2 class="fw-bold fs-4 d-flex justify-content-center align-items-center">
                                <i class="fas fa-gifts me-2"></i> Geschenk-System
                            </h2>
                            <p class="fs-6">Zeigen Sie Ihrem Lieblingsmodel Ihre Zuneigung, indem Sie direkt im Chat Geschenke verschicken. Diese werden ebenfalls mit Coins verrechnet und sorgen für unvergessliche Momente.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Section -->
        <div class="container mt-6 text-center">
            <button class="btn btn-outline-light btn-lg">Jetzt starten</button>
        </div>

    </section>

    <!-- Other Sections -->
    <section class="about-section mx-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 about-content">
                    <h2>Unsere Mission</h2>
                    <p>Unsere Mission ist es, Ihnen ein unvergleichliches und spannendes Erlebnis zu bieten, das Ihre Wünsche und Fantasien wahr werden lässt. Wir legen großen Wert auf Privatsphäre, Sicherheit und Exklusivität. Wir wissen, wie wichtig Diskretion und Vertrauen sind, deshalb setzen wir auf modernste SSL-Verschlüsselung und höchste IT-Sicherheitsstandards. Ihre Geheimnisse bleiben immer vertraulich – garantiert.</p>
                    <p>Unsere Plattform ist darauf ausgelegt, Ihnen einzigartige und aufregende Erlebnisse zu ermöglichen. Vom ersten Moment an, wenn Sie sich anmelden, bis hin zu den sinnlichen und persönlichen Chats mit unseren Models, stehen Sie und Ihre Bedürfnisse im Mittelpunkt.</p>
                </div>
                <div class="col-md-6 about-content">
                    <h2>Unsere Models</h2>
                    <p>Unsere Models sind nicht nur wunderschön, sondern auch offen, liebevoll und hilfsbereit. Jedes Model hat ein einzigartiges Profil mit einer Galerie, die sowohl öffentliche als auch exklusive, zensierte Bilder enthält. Mit nur wenigen Coins können Sie diese Bilder unzensiert freischalten und die Sinnlichkeit hautnah erleben. Als Willkommensgeschenk erhalten Sie sogar einmalig die Möglichkeit, ein Bild kostenfrei unzensiert freizuschalten.</p>
                </div>
            </div>
        </div>
    </section>


@endsection
