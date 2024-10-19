
@extends('user_new.app')

@section('title', 'Nachrichten anzeigen')
@section('page', 'Nachrichten anzeigen')
@section('content')
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-9" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding: 50px;">
                    @if(count($news) > 0)

                        <div class="posts">
                            @foreach($news as $new)
                                <div class="post">
                                    <div class="post__image post__image--1">
                                        <img style="width: 100%; " src="{{asset($new->image)}}">
                                    </div>
                                    <div class="post__content">
                                        <div class="post__inside">
                                            <h3 class="post__title">{{$new->title}}</h3>
                                            <p class="post__excerpt">
                                                {!! (\Illuminate\Support\Str::limit($new->body, 40, '...')) !!}
                                            </p>
                                            <a href="{{route('user.new.detail', $new->post_url)}}" class="btn--accent post__button">
                                                Read more
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    @else
                        <h3 class="text-danger">No News Yet</h3>
                    @endif

                </div>
            </div>
        </section>



    </main><!-- End #main -->
    <style>
        * {
            box-sizing: border-box;
        }



        h1 {
            text-align: center;
        }

        button {
            font-size: 1rem;
            padding: 0.35em 0.75em;
            line-height: 1;
            background-color: transparent;
            border: 0.125rem solid #2a2a2a;
            border-radius: 2rem;
            cursor: pointer;
            transition: 0.1s;
            outline: 0;
        }

        button:hover {
            background-color: #2a2a2a;
            color: #fff;
        }

        button .fa {
            font-size: 0.75em;
            margin-left: 0.5em;
        }

        button.btn--primary {
            border-color: #042A4F;
            color: #042A4F;
        }

        button.btn--primary:hover {
            background-color: #042A4F;
            color: #fff;
        }

        button.btn--accent {
            border-color: #E65891;
            color: #E65891;
        }

        button.btn--accent:hover {
            background-color: #E65891;
            color: #fff;
        }

        .posts {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 2.5rem;
        }

        @media(max-width: 1140px) {
            .posts {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 768px) {
            .posts {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .post__image {
            width: 100%;
            height: 240px;
            position: relative;
            overflow: hidden;
        }

        .post__image:before, .post__image:after {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }

        .post__image:before {
            background-size: cover;
            background-position: center center;
            transform: scale(1);
            filter: blur(0);
            transition: 2s cubic-bezier(0, 0.6, 0.2, 1);
        }

        .post__image:after {
            background: linear-gradient(30deg, #042A4F 0%, #E65891 100%);
            background-size: 100% 300%;
            background-position: bottom left;
            opacity: 0.15;
            transition: 2s cubic-bezier(0, 0.6, 0.2, 1);
        }

        .post__content {
            margin: -3rem 1.5rem 0;
            padding: 1.5rem;
            background-color: #fff;
            border-radius: 3px;
            box-shadow: 0 1rem 3rem rgba(0,0,0,0.15);
            transition: margin 0.2s ease-in-out;
            position: relative;
            z-index: 1;
            user-select: none;
        }

        .post__title {
            font-size: 1.35rem;
            line-height: 1;
            margin: 0 0 1rem;
            font-weight: 300;
            color: #042A4F;
        }

        .post__excerpt {
            overflow: hidden;
            margin: 0;
            max-height: 6.25rem;
            position: relative;
        }

        .post__button {
            margin-top: 1rem;
        }

        .post:hover .post__content {
            margin-top: -10.625rem;
        }

        .post:hover .post__image:after {
            opacity: 0.5;
        }

        .post:hover .post__image:before {
            transform: scale(1.1);
            filter: blur(10px);
        }

    </style>

@endsection
