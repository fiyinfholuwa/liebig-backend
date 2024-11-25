@extends('frontend.app')

@section('content')
    <section class="mt-6">
        <div class="container text-center my-5">
            <h2 class="text-primary font-weight-bold text-white">Lernen Sie unsere vielfältigen Models kennen!</h2>
            <p style="color: whitesmoke" class="lead">Jede von ihnen ist einzigartig, wunderschön und leidenschaftlich. Unsere Models sind bereit, Ihre Wünsche zu erfüllen und bieten Ihnen unvergessliche, persönliche Chats. Tauchen Sie ein und entdecken Sie Ihr perfektes Match. Unsere Models warten darauf, Sie zu verzaubern!</p>
        </div>
        <!-- Text Section Ends -->
        <!-- CARD SECTION STARTS -->
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
                                            <h5 class="card-title">{{$model->name}}<span class="text-success">●</span></h5>
                                            <p class="card-text">{{$model->address}}</p>
{{--                                            <span class="badge bg-warning text-dark">GOLD</span>--}}
{{--                                            @auth--}}
{{--                                                <a  href="{{route('show.model.chat.all')}}" style="padding-left: 30px; font-size: 30px; text-decoration: none; color: white;">Chat <i class="fa fa-comment"></i></a>--}}

{{--                                            @else--}}
{{--                                                <a href="{{route('login')}}" style="padding-left: 30px; font-size: 30px; text-decoration: none; color: white;">Chat <i class="fa fa-comment"></i></a>--}}

{{--                                            @endauth--}}
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </div>

                    @endforeach
                </div>
                @endif

{{--        <!-- Pagination -->--}}
{{--        <nav aria-label="Page navigation" class="my-4">--}}
{{--            <ul class="pagination justify-content-center">--}}
{{--                <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
{{--            </ul>--}}
{{--        </nav>--}}
        </div>
    </section>

@endsection
