@php use Illuminate\Support\Facades\Auth; @endphp
@extends('frontend.app')

@section('content')
    <link href="{{asset('frontend/css/Models-details.css')}}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div style="margin-top: 120px;" class="container profile-container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset($model->profile_image)}}" class="img-fluid profile-picture mb-3" alt="Profile Picture">
                <div class="mb-3">
{{--                    <span class="badge badge-custom badge-gold">Gold</span>--}}
                    <span class="badge badge-custom badge-verified">Verifiziert</span>
{{--                    <span class="badge badge-custom badge-awesome">Awesome</span>--}}
                </div>
                <h4>Über mich</h4>
                <p>{{$model->about_me}}</p>
                <h4>Meine Interessen</h4>
                <ul class="interests-list list-unstyled">
                    <li><i class="fas fa-check text-primary"></i>{{$model->my_interest}}</li>
                </ul>
            </div>

            @if(count($get_model_images) > 0)
                <div class="col-md-5">
                    <div class="photo-grid">
                        @foreach($get_model_images as $image)

                            <div class="photo-item">
                                @if($image->image_type === 'free')
                                    <!-- Free image, display the actual image -->
                                    <img src="{{ asset($image->image) }}" alt="Photo 1" class="image-click" data-img-src="{{ asset($image->image) }}">
                                @elseif(Auth::check() && in_array(Auth::user()->id, json_decode($image->logged_users, true) ?: []))
                                    <img src="{{ asset($image->image) }}" alt="Photo 1" class="image-click" data-img-src="{{ asset($image->image) }}">
                                @else
                                    <!-- Placeholder image with click event to show modal -->
                                    <div style="position: relative; display: inline-block; width: auto; height: auto;">
                                        <img
                                            src="{{ asset($image->image) }}"
                                            alt="Photo 1"
                                            class="pay-to-view-click"
                                            style="display: block; width: 100%; height: auto;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#pay_to_view_img_{{ $image->id }}">
                                        <div
                                            style="
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%; /* Adjust height for blur area */
            backdrop-filter: blur(8px);
            background: rgba(255, 255, 255, 0.3); /* Optional light overlay */
            pointer-events: none;
        ">
                                        </div>
                                    </div>
                                @endif
                                <div class="overlay">
                                    @if($image->image_type === 'free')
                                        <div class="text view-image" data-img-src="{{ asset($image->image) }}">View</div>
                                    @elseif(Auth::check() && in_array(Auth::user()->id, json_decode($image->logged_users, true) ?: []))
                                        <div class="text view-image" data-img-src="{{ asset($image->image) }}">View</div>
                                    @else
                                        <div class="text upgrade-now pay-to-view-click" data-bs-toggle="modal" data-bs-target="#pay_to_view_img_{{ $image->id }}">Upgrade Now</div>
                                    @endif
                                </div>
                            </div>

                            <!-- Modal for each image -->
                            <div class="modal fade" id="pay_to_view_img_{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="payToViewModalLabel_{{ $image->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="{{route('pay.to.view.images')}}">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">“Bild mit Coins freischalten</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>Sind Sie sicher, dass Sie bezahlen möchten, um dieses Bild anzusehen? Diese Aktion wird <strong>{{ $image->amount }} Münzen</strong> von Ihrem Guthaben abziehen.</p>
                                            </div>
                                            <input type="hidden" name="imageId" value="{{$image->id}}">
                                            <input type="hidden" name="modelId" value="{{$image->userid}}">
                                            <input type="hidden" name="amount" value="{{ $image->amount}}">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

                                                @auth

                                                <button type="submit" class="btn btn-primary">Pay Now</button>
                                                @else
                                                    <a class="btn btn-secondary" href="{{route('login')}}">Please Login First</a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif


            <!-- Modal for image preview -->
            <div class="modal fade" id="model_preview_img" tabindex="-1" role="dialog" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img id="preview_img" src="" alt="Full Size Image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for pay to view -->
            <div class="modal fade" id="pay_to_view_img" tabindex="-1" role="dialog" aria-labelledby="payToViewModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{route('pay.to.view.images')}}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Pay to View Image</h5>

                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to pay to view this images? This action will remove <strong>{{$model->image_amount}} coins</strong>  from your balance.</p>
                                <button class="btn btn-primary">Pay Now</button>
                            </div>
                            <input type="hidden" name="modelId" value="{{$model->id}}">
                            <input type="hidden" name="amount" value="{{$model->image_amount}}">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


            <div class="col-md-3">
                <h2>{{$model->name}}</h2>
                <p><i class="fas fa-map-marker-alt text-danger"></i> {{$model->address}}</p>
                <div class="hit-or-miss-container d-flex justify-content-between mb-3">
{{--                    <button class="btn btn-custom btn-hit"><i class="fas fa-heart"></i> Hit</button>--}}
{{--                    <button class="btn btn-custom btn-miss"><i class="fas fa-times"></i> Miss</button>--}}
                </div>
                <div class="d-grid gap-2 mb-4">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @php
                            $followedModels = json_decode(Auth::user()->followed_models, true) ?? [];
                        @endphp

                        @if(in_array($model->id, $followedModels))
                            <a  href="{{route('show.model.chat')}}" class="btn btn-dark" style="padding-left: 30px; font-size: 30px; text-decoration: none;">Jetzt chatten </a>
                        @else
                            <form action="{{ route('follow.model') }}" method="post">
                                @csrf
                                <input type="hidden" name="modelId" value="{{ $model->id }}">
                                <button type="submit" class="btn btn-custom btn-message text-dark">Jetzt chatten </button>
                            </form>
                        @endif
                    @else

                            <a href="{{route('login')}}" class="btn btn-dark" style="padding-left: 30px; font-size: 30px; text-decoration: none;">Jetzt chatten </a>
                    @endif

                    {{--                    <button class="btn btn-custom btn-wink">Send Wink</button>--}}
                </div>
                <div class="mb-4">
                    <p><strong>Alter:</strong> {{$model->age}}</p>
                    <p><strong>Sexualität:</strong> {{$model->sexuality}}</p>
                    <p><strong>Augenfarbe:</strong> {{$model->eye_color}}</p>
                    <p><strong>Haare:</strong> {{$model->hair}}</p>
                    <p><strong>Körperbau:</strong> {{$model->body_type}}</p>
                    <p><strong>Größe:</strong> {{$model->height}}</p>
                </div>

                {{--                <div class="mb-4">--}}
{{--                    <h5>Send a virtual gift</h5>--}}
{{--                    <i class="fas fa-gift fa-3x text-danger"></i>--}}
{{--                </div>--}}
                <div class="mb-4">
{{--                    <button class="btn btn-outline-primary me-2">Add Friend</button>--}}
                </div>
                <div>
                    <h5>Share this profile</h5>
                    <div class="container">
                        <div class="social-icons d-flex justify-content-center">
                            <!-- Facebook Share -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                               target="_blank" class="social-icon facebook mx-2">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <!-- Twitter Share -->
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
                               target="_blank" class="social-icon twitter mx-2">
                                <i class="fab fa-twitter"></i>
                            </a>

                            <!-- Instagram doesn't support direct URL sharing -->

                            <!-- Pinterest Share -->
                            <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}"
                               target="_blank" class="social-icon pinterest mx-2">
                                <i class="fab fa-pinterest"></i>
                            </a>

                            <!-- LinkedIn Share -->
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                               target="_blank" class="social-icon linkedin mx-2">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>

                    {{--                    <div class="copy-link-container d-flex">--}}
{{--                        <input type="text" class="form-control" id="profileLink" value="https://yoursite.com/profile/bowler" readonly>--}}
{{--                        <button class="btn btn-primary ms-2" id="copyLinkBtn">Copy</button>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    @if(count($recommended_model) > 0)
        <div class="container recommended-section">
            <h4 class="mb-4">Für dich empfohlen</h4>
            <div class="row">
                <!-- Card 1 -->
                @foreach($recommended_model as $model)
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
{{--                                        <span class="badge bg-warning text-dark">GOLD</span>--}}

                                        @auth
                                            <a  href="{{route('show.model.chat.all')}}" style="padding-left: 30px; font-size: 30px; text-decoration: none; color: white;">Chat </a>

                                        @else
                                            <a href="{{route('login')}}" style="padding-left: 30px; font-size: 30px; text-decoration: none; color: white;">Chat</a>

                                        @endauth
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>

                @endforeach
            </div>
        </div>

    @endif

    <style>
        /* Custom CSS for image modal */
        #model_preview_img .modal-content {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
        }

        #model_preview_img img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        /* Custom CSS for pay modal */
        #pay_to_view_img .modal-content {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
        }

        #pay_to_view_img .modal-body {
            text-align: center;
        }

    </style>

    <script>

        $(document).ready(function() {
            // Handle the 'View' button click to show full-size image in a modal
            $('.view-image').on('click', function() {
                var imgSrc = $(this).data('img-src');
                $('#preview_img').attr('src', imgSrc);
                $('#model_preview_img').modal('show');
            });

            // Handle the 'Pay to View Image' button click to show the pay modal
            $('.pay-to-view-btn').on('click', function() {
                $('#pay_to_view_img').modal('show');
            });

            // Handle the 'Upgrade Now' click to show an alert
            $('.upgrade-now').on('click', function() {
                alert('Bitte zahlen Sie mit Ihren Münzen, um das Bild anzusehen.');
            });

        });

        $(document).ready(function() {
            // Manually close the modal on button click (in case data-dismiss doesn't work)
            $('.cancel-modal').on('click', function() {
                $('#pay_to_view_img').modal('hide');  // Hide the pay-to-view modal
                $('#model_preview_img').modal('hide');  // Hide the image preview modal
            });
        });



    </script>
@endsection
