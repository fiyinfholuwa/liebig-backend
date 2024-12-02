@extends('frontend.app')

@section('content')

    <style>
        .link-wrapper{
            color: red;
        }

        .hero_home{
            padding: 0 200px;
        }

        .model_c{
            margin-top: -150px !important;
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

        @media (max-width: 425px) {
            .hero_home{
                padding: 0 20px;
            }

            .model_c{
                margin-top: 30px !important;
            }
        }
    </style>

<section class="hero mt-5">
    <div  class="hero_home">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="">
                    <!-- Desktop Image -->
                    <div class="d-none d-md-block ">
                        <img style="width: 100% !important;" src="{{asset('frontend/images/Banner1.jpg')}}" alt="Hero Image Desktop" class=" custom-image1">
                    </div>
                    <!-- Mobile Image -->
                    <div class="d-block d-md-none mobile">
                        <img src="{{asset('frontend/images/landingpage 1 mobile.png')}}" alt="Hero Image Mobile" class="img-fluid custom-image1 w-100 h-100">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="hero-text text-white">
                    <h1 class="hero-h">Intime Momente erwarten dich</h1>
                    <p class="hero-p " style="color: white">
                        Seien Sie Teil einer einzigartigen Community, lernen Sie unsere exklusiven Models kennen und lassen
                        Sie sich in den heißesten Chats jeden Wunsch erfüllen. Genießen Sie aufregende Erlebnisse mit
                        höchster Sicherheit und absoluter Diskretion. Nutzen Sie Ihr kostenloses Startguthaben und erleben
                        Sie unvergessliche Momente – ohne Abo und mit voller Kostenkontrolle.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!---A card--->
<section class="bg-gray py-5 py-md-10">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 g-md-5">
        <!-- Card 1 -->
        <div class="col mb-4 mb-md-0">
            <div class="card rounded-4 shadow-sm h-100 custom-card">
                <div class="card-body d-flex flex-column">
                    <img src="{{asset('frontend/images/card2.jpg')}}" alt="Card 2 image" class="card1">
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col mb-4 mb-md-0">
            <div class="card rounded-4 shadow-sm h-100 custom-card">
                <div class="card-body d-flex flex-column">
                    <img src="{{asset('frontend/images/card3.jpg')}}" alt="Card 3 image" class="card1">
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col mb-4 mb-md-0">
            <div class="card rounded-4 shadow-sm h-100 custom-card">
                <div class="card-body d-flex flex-column">
                    <img src="{{asset('frontend/images/card4.jpg')}}" alt="Card 4 image" class="card1">
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col mb-4 mb-md-0">
            <div class="card rounded-4 shadow-sm h-100 custom-card">
                <div class="card-body d-flex flex-column">
                    <img src="{{asset('frontend/images/card1.jpg')}}" alt="Card 1 image" class="card1">
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid p-0 mt-5">
    <div class="d-none d-md-block row justify-content-center align-items-center vh-100">
        <div class="col-12 text-center">
            <img src="{{asset('frontend/images/Banner2.jpg')}}" alt="Full Screen Banner" class="img-fluid w-70 h-100">
        </div>
    </div>
    <div class="d-block d-md-none row justify-content-center align-items-center">
        <div class="col-12">
            <img src="{{asset('frontend/images/landingpage 2 mobile.png')}}" alt="Mobile Banner" class="img-fluid w-100">
        </div>
    </div>
    <!----Featured Models-->
    <section>
        <div  class="mt-2 col text-center text-white model_c">
            <h1>Exklusive Models</h1>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <p class="text-center">
                            Treffen Sie unsere atemberaubenden Models, die nur darauf brennen, Ihnen die aufregendsten und intimsten Chats zu bieten. Jede von ihnen hat einen einzigartigen Stil und unwiderstehlichen Charme – lernen Sie sie kennen und lassen Sie sich von ihrer verführerischen Sinnlichkeit mitreißen. Erleben Sie unvergessliche Momente, die Sie sofort in ihren Bann ziehen werden. Warten Sie nicht länger – tauchen Sie ein in die Welt der Verführung und starten Sie Ihren persönlichen Chat jetzt!
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @if(count($models) > 0)
            <div class="container mt-5">
                <div class="row">
                    @foreach($models as $model)
                        <div class="col-12 col-md-4 mb-4">
                            <a style="text-decoration: none" href="{{route('model.detail', $model->id)}}">
                                <div class="card hover-card w-100" data-card-id="1">
                                    <div class="position-relative">
                                        <img src="{{asset($model->profile_image)}}" class="card-img-top" alt="Roadblock">
                                        <span class="badge bg-danger position-absolute top-0 end-0 m-2">FEATURED</span>
                                        <div class="hover-overlay">
                                            <div class="hover-content">
                                                <p>Age: {{$model->age}}</p>
                                                <p>City: {{$model->address}}</p>
                                            </div>
                                        </div>
                                        <div class="card-body bg-dark text-white">
                                            <h5 class="card-title" style="color: #edb1cf;">{{$model->name}}<span class="text-success">●</span></h5>
                                            <p class="card-text">{{$model->address}}</p>
                                            <span class="badge bg-warning text-dark">GOLD</span>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>

                    @endforeach

                    <div class="row mt-4">
                        <div class="col text-center">
                            <a href="{{route('models')}}"><button class="btn btn-primary btn-lg">Kostenlos Registrieren</button></a>
                        </div>
                    </div>
                </div>
        @endif

    </section>

    <!----FAQ SECTION---->
    <div class="container mt-5 text-center">
        <h1 class="faq-header animate__animated animate__fadeIn">FAQ</h1>
        <p class="faq-paragraph animate__animated animate__fadeIn">
            Du hast weitere Fragen? Kein Problem, besuche dazu einfach unsere
        </p>
        <span class="link-wrapper"><a href="{{route('faq')}}" class=" link-faq" style="color: #edb1cf !important;">FAQ-Seite</a></span> <span class ="faq-paragraph animate__animated animate__fadeIn">oder</span>
        <span class="link-wrapper"><a href="{{route('contact')}}" class=" link-contact" style="color: #edb1cf !important;
        ">Kontaktiere uns</a></span>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item animate__animated animate__fadeInUp animate__delay-1s">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        Muss ich ein Abonnement abschließen?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-white">
                        <p>Nein, bei uns gibt es keine Abonnements. Sie entscheiden selbst, wie viele Coins Sie kaufen und ausgeben möchten. Es gibt keine versteckten Kosten oder langfristigen Verpflichtungen.                        </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item animate__animated animate__fadeInUp animate__delay-2s">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                        Wie funktioniert das kostenlose Startguthaben?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-white">
                        <p>Nach der Anmeldung erhalten Sie automatisch ein Startguthaben, mit dem Sie unsere Chats unverbindlich ausprobieren können. So können Sie sich ein Bild von unseren Angeboten machen, ohne sofort investieren zu müssen.                          </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item animate__animated animate__fadeInUp animate__delay-3s">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                        Was ist das Geschenk-System und wie funktioniert es?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-white">
                        <p>Unser Geschenk-System ermöglicht es Ihnen, Ihrem Lieblingsmodel im Chat besondere Geschenke zu machen. Diese Geschenke können direkt im Chat gekauft und mit Coins bezahlt werden. Es ist eine wunderbare Möglichkeit, Ihrem Model noch mehr Zuneigung zu zeigen und das Gespräch besonders zu gestalten.
                        </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item animate__animated animate__fadeInUp animate__delay-4s">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                        Was ist das Glücksrad und wie funktioniert es?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-white">
                        <p>Das Glücksrad ist eine spannende Funktion auf unserer Website, bei der Sie die Chance haben, tolle Preise zu gewinnen. Jede Drehung am Glücksrad gewinnt einen Preis. Sie können Geschenke und bis zu 4500 Coins gewinnen. Probieren Sie Ihr Glück und freuen Sie sich auf tolle Überraschungen!
                        </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item animate__animated animate__fadeInUp animate__delay-5s">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                        Wie schalte ich die unzensierten Bilder frei?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-white">
                        <p>Tauchen Sie ein in die verführerische Galerie jedes Models! Neben den öffentlichen Fotos gibt es exklusive, zensierte Bilder, die nur darauf warten, von Ihnen entdeckt zu werden. Mit ein paar Coins können Sie diese zensierten Bilder freischalten und unzensiert genießen. Der Preis für jedes Bild wird von den Models selbst festgelegt. Und das Beste: Als neuer Nutzer erhalten Sie einmalig die Möglichkeit, ein zensiertes Bild kostenlos unzensiert freizuschalten. Probieren Sie es aus und entdecken Sie die sinnliche Seite unserer Models hautnah!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!---New Models---->
{{--    <section>--}}
{{--        <div class="text-center mt-5 text-white">--}}
{{--            <h1 class="text-2xl" >Unsere Al-Models</h1>--}}
{{--            <p class="fs-5 mb-3">Offen, liebevoll, hilfsbereit.</p>--}}
{{--            <p>Erlebe die Sinnlichkeit unserer exklusiven Models in einem ganz persönlichen Chat.</p>--}}
{{--        </div>--}}
{{--        <div class="container-fluid p-0 mt-5">--}}
{{--            <div class="d-none d-md-block row justify-content-center align-items-center vh-100">--}}
{{--                <div class="col-12 text-center">--}}
{{--                    <img src="{{asset('frontend/images/Banner3.jpg')}}" alt="Full Screen Banner" class="img-fluid w-70 h-100">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="d-block d-md-none row justify-content-center align-items-center">--}}
{{--                <div class="col-12">--}}
{{--                    <img src="{{asset('frontend/images/landingpage 3 mobile.png')}}" alt="Mobile Banner" class="img-fluid w-100">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mt-5 col text-center text-white">--}}
{{--                <h1>Ein Blick hinter die Kulissen</h1>--}}
{{--                <div class="container">--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="col-md-10">--}}
{{--                            <p class="text-center">--}}
{{--                                Lassen Sie sich nicht von der Unschärfe täuschen – unsere Models lieben es, sich Ihnen zu zeigen und Ihre Neugier zu wecken. Schalten Sie die unzensierten Bilder frei und erleben Sie ihre ganze Schönheit in voller Pracht.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="container mt-5">--}}
{{--                <div class="row">--}}
{{--                    <!-- Card 1 -->--}}
{{--                    <div class="col-md-4 mb-4">--}}
{{--                        <div class="card hover-card w-100" data-card-id="1">--}}
{{--                            <div class="position-relative">--}}
{{--                                <img src="{{asset('frontend/images/j2.webp')}}" class="card-img-top" alt="Roadblock">--}}
{{--                                <div class="hover-overlay">--}}
{{--                                    <div class="hover-content">--}}
{{--                                        <p>Age: 28</p>--}}
{{--                                        <p>City: New York</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card-body bg-dark text-white">--}}
{{--                                <h5 class="card-title">Roadblock <span class="text-success">●</span></h5>--}}
{{--                                <p class="card-text">New York</p>--}}
{{--                                <span class="badge bg-warning text-dark">GOLD</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Card 2 -->--}}
{{--                    <div class="col-12 col-md-4 mb-4">--}}
{{--                        <div class="card hover-card w-100" data-card-id="2">--}}
{{--                            <div class="position-relative">--}}
{{--                                <img src="{{asset('frontend/images/j2.webp')}}" class="card-img-top" alt="Roadblock">--}}
{{--                                <div class="hover-overlay">--}}
{{--                                    <div class="hover-content">--}}
{{--                                        <p>Age: 28</p>--}}
{{--                                        <p>City: New York</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body bg-dark text-white">--}}
{{--                                    <h5 class="card-title">Roadblock <span class="text-success">●</span></h5>--}}
{{--                                    <p class="card-text">New York</p>--}}
{{--                                    <span class="badge bg-warning text-dark">GOLD</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!-- Card 3 -->--}}
{{--                    <div class="col-12 col-md-4 mb-4">--}}
{{--                        <div class="card hover-card w-100" data-card-id="3">--}}
{{--                            <div class="position-relative">--}}
{{--                                <img src="{{asset('frontend/images/j2.webp')}}" class="card-img-top" alt="Roadblock ">--}}
{{--                                <div class="hover-overlay">--}}
{{--                                    <div class="hover-content">--}}
{{--                                        <p>Age: 28</p>--}}
{{--                                        <p>City: New York</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body bg-dark text-white">--}}
{{--                                    <h5 class="card-title">Roadblock <span class="text-success">●</span></h5>--}}
{{--                                    <p class="card-text">New York</p>--}}
{{--                                    <span class="badge bg-warning text-dark">GOLD</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- View More Button -->--}}
{{--                <div class="row mt-4">--}}
{{--                    <div class="col text-center">--}}
{{--                        <a href="Models.html"><button class="btn btn-outline-light btn-lg">Unzensierte Bilder freischalten</button></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!----TESTIMONIAL STARTS--->--}}
{{--        <section class="testimonial-section">--}}
{{--            <div class="container">--}}
{{--                <h1 class="faq-header fs-2 text-white">Das sagt unsere Community</h1>--}}

{{--                <!---Rating Section Starts--->--}}
{{--                <section class="rating-section py-3">--}}
{{--                    <div class="container">--}}
{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-md-6 text-center">--}}
{{--                                <div class="rating-container">--}}
{{--                                    <div class="rating-content">--}}
{{--                                        <!-- Flex container to place 4.8 and stars beside each other -->--}}
{{--                                        <div class="d-flex align-items-center justify-content-center flex-column flex-md-row">--}}
{{--                                            <div class="rating-score animate__animated animate__fadeInDown me-md-2 mb-2 mb-md-0">--}}
{{--                                                <span class="display-5 fw-bold text-white">4.8</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="stars-container star-rating animate__animated animate__zoomIn animate__delay-1s">--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star-half-alt"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="rating-bar mt-3 animate__animated animate__fadeInUp animate__delay-2s">--}}
{{--                                        <div class="progress">--}}
{{--                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 96%;" aria-valuenow="96" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p class="mt-2 rating-text animate__animated animate__fadeIn animate__delay-3s">Basierend auf 1.427 Bewertungen</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--                <!----Rating Section Ends---->--}}
{{--                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="7000" data-bs-pause="false">--}}
{{--                    <div class="carousel-inner">--}}
{{--                        <div class="carousel-item active">--}}
{{--                            <div class="testimonial-card">--}}
{{--                                <i class="fas fa-quote-left quote-icon"></i>--}}
{{--                                <p class="testimonial-text">"Die Diskretion hier ist wirklich top. Ich kann mich vollkommen entspannen und genieße die Gespräche mit den Models. Die Plattform ist sicher und zuverlässig – genau das, was ich gesucht habe."</p>--}}
{{--                                <p class="testimonial-author">- Tim, 34</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <div class="testimonial-card">--}}
{{--                                <i class="fas fa-quote-left quote-icon"></i>--}}
{{--                                <p class="testimonial-text">"Die Models sind nicht nur schön anzusehen, sondern auch sehr aufgeschlossen und verstehen es, meine Bedürfnisse zu erfüllen. Hier bekomme ich genau das, was ich mir wünsche."</p>--}}
{{--                                <p class="testimonial-author">- Lukas, 29</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <div class="testimonial-card">--}}
{{--                                <i class="fas fa-quote-left quote-icon"></i>--}}
{{--                                <p class="testimonial-text">"Ich schätze die Transparenz in den Chats. Es gibt kein Abo, ich behalte die Kontrolle über meine Ausgaben und das kostenlose Startguthaben war ein angenehmer Bonus."</p>--}}
{{--                                <p class="testimonial-author">- Michael, 31</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <div class="testimonial-card">--}}
{{--                                <i class="fas fa-quote-left quote-icon"></i>--}}
{{--                                <p class="testimonial-text">"Das Feature, unzensierte Bilder freizuschalten, ist wirklich ein Highlight. Es macht Spaß, die Models in voller Pracht zu sehen und das Ganze bleibt diskret – das ist mir besonders wichtig."</p>--}}
{{--                                <p class="testimonial-author">- Gerd, 47</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <div class="testimonial-card">--}}
{{--                                <i class="fas fa-quote-left quote-icon"></i>--}}
{{--                                <p class="testimonial-text">"Ich habe hier mehr gefunden als auf anderen Dating-Plattformen. Die Chats sind intensiv und persönlich, und die Models sind professionell und einfühlsam. Hier fühle ich mich gut aufgehoben."</p>--}}
{{--                                <p class="testimonial-author">- David, 33</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">--}}
{{--                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                        <span class="visually-hidden">Previous</span>--}}
{{--                    </button>--}}
{{--                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">--}}
{{--                        <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                        <span class="visually-hidden">Next</span>--}}
{{--                    </button>--}}
{{--                    <div class="carousel-indicators">--}}
{{--                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>--}}
{{--                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
{{--                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
{{--                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>--}}
{{--                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="container-fluid p-0 mt-5">--}}
{{--                <div class="d-none d-md-block row justify-content-center align-items-center vh-100">--}}
{{--                    <div class="col-12 text-center">--}}
{{--                        <img src="{{asset('frontend/images/Banner4.jpg')}}" alt="Full Screen Banner" class="img-fluid w-70 h-100">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="d-block d-md-none row justify-content-center align-items-center">--}}
{{--                    <div class="col-12">--}}
{{--                        <img src="{{asset('frontend/images/landingpage 4 mobile.png')}}" alt="Mobile Banner" class="img-fluid w-100">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!---TESTIMONIAL ENDS--->--}}
{{--        </section>--}}

@endsection
