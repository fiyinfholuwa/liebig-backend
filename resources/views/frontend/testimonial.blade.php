
@extends('frontend.app')

@section('content')

    <link href="{{asset('frontend/css/contact.css')}}" rel="stylesheet">



    <style>
        .hero-content p{
            color: whitesmoke;
        }
        .hero_home{
            padding: 0 60px;
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
    <section class="hero">
        <div class="hero_home">
            <div class="container-fluid p-0 mt-5">
                <!-- Desktop View -->
                <div class="d-none d-md-flex justify-content-center align-items-center vh-100">
                    <div class="col-12 text-center">
                        <img src="{{asset('frontend/images/faq desktop.png')}}" alt="Full Screen Banner" class="img-fluid" style="width: 70%; height: auto; margin-top: 20px;">
                    </div>
                </div>
                <!-- Mobile View -->
                <div class="d-flex d-md-none justify-content-center align-items-center">
                    <div class="col-12 p-0">
                        <img src="{{asset('frontend/images/faq mobile.png')}}" alt="Mobile Banner" class="img-fluid w-100" style="margin-top: 20px;">
                    </div>
                </div>
            </div>
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

        </div>

    </section>

@endsection
