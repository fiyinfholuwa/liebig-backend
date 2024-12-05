@extends('frontend.app')


@section('content')

    <style>
        .hero-content p{
            color: whitesmoke;
        }
        .hero_home{
            padding: 150px 200px !important;
            color: #ffffff;
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
    <div class="hero_home">
        @if(!is_null($policy))
            <h3 class="text-center" style="color: #edb1cf">{{$policy->title}}</h3>

            <div style="padding-top: 50px">
                {!! $policy->body !!}
            </div>
        @endif
        <!-- Desktop View -->
    </div>
@endsection
