@extends('user.app')

@section('content')
    <div class="dashboard-container">
        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- ======Topbar======= -->
            <div class="topbar d-flex justify-content-between align-items-center bg-light p-3 shadow-lg rounded">
                <!-- Status Update Section -->

                <!-- Notification and User Profile -->
                <div class="d-flex align-items-center">
                    <div class="notification icon me-4">
                        <ion-icon name="notifications-outline" style="font-size: 1.5rem;"></ion-icon>
                    </div>

                    <div class="user d-flex align-items-center">
                        <img src="https://raw.githubusercontent.com/programmercloud/nft-dashboard/main/img/user.png" alt="User" class="rounded-circle me-3 shadow-sm" style="width: 40px; height: 40px;" />
                        <p class="mb-0 me-2 d-none d-md-block fw-semibold text-dark">{{Auth::user()->name}}</p>
                        <ion-icon name="chevron-down-outline" style="font-size: 1.5rem;"></ion-icon>
                    </div>
                </div>
            </div>
            <!-- ======End Topbar======= -->
            <div class="main_c mt-4">
                <div class="row">
                    <div class="col-12">
                        @if($ribbon != NULL)
                            @if($ribbon->display == 'yes')
                                <marquee style="
                font-size: 16px;
                font-weight: 500;
                color: #fff;
                background: linear-gradient(90deg, #600f2d, #ff4563);
                padding: 10px 0;
                margin: 20px 0;
                width: 100% !important;
                z-index: 9999;
            ">
                                    {{$ribbon->body}}
                                </marquee>
                            @endif
                        @endif
                    </div>

                    <div class="col-lg-5 order-lg-2">
                        <div class="status-update-container d-flex flex-grow-1 me-3 p-3  shadow-sm rounded">
                            @if(count($get_user_statuses) > 0)
                                <div class="ss_v-status-scroller d-flex align-items-center">

                                    @php
                                        // Group the statuses by userid
                                        $grouped_statuses = $get_user_statuses->groupBy('userid');

                                        // Extract the authenticated user's statuses first, if available
                                        $auth_user_id = Auth::user()->id;
                                        $auth_user_statuses = $grouped_statuses->pull($auth_user_id);
                                    @endphp

                                        <!-- Display Auth User's Statuses First (if available) -->
                                    @if($auth_user_statuses)
                                        <div class="ss_v-status ss_v-spaced-status me-3">
                                            <!-- First Image (Profile Image for Auth User) -->
                                            <img src="{{ asset($auth_user_statuses->first()->image) }}" alt="User {{ $auth_user_id }}" class="ss_v-status-image rounded-circle shadow-sm" />
                                            <span class="ss_v-status-name text-center d-block mt-2">User {{ $auth_user_id }}</span>
                                            <span class="ss_v-status-count d-block text-center mt-1">{{ $auth_user_statuses->count() }} images</span>

                                            <!-- Display Remaining Images for Auth User -->
                                            @foreach($auth_user_statuses as $status)
                                                <img src="{{ asset($status->image) }}" class="ss_v-user-image" alt="User {{ $auth_user_id }} Image" />
                                            @endforeach
                                        </div>
                                    @endif

                                    <!-- Display Other Users' Statuses -->
                                    @foreach($grouped_statuses as $userid => $statuses)
                                        <div class="ss_v-status ss_v-spaced-status me-3">
                                            <!-- First Image (Profile Image for Other Users) -->
                                            <img src="{{ asset($statuses->first()->image) }}" alt="User {{ $userid }}" class="ss_v-status-image rounded-circle shadow-sm" />
                                            <span class="ss_v-status-name text-center d-block mt-2">User {{ $userid }}</span>
                                            <span class="ss_v-status-count d-block text-center mt-1">{{ $statuses->count() }} images</span>

                                            <!-- Display Remaining Images for Other Users -->
                                            @foreach($statuses as $status)
                                                <img src="{{ asset($status->image) }}" class="ss_v-user-image" alt="User {{ $userid }} Image" />
                                            @endforeach
                                        </div>
                                    @endforeach



                                </div>

                            @else
                                <h3 class="text-white">No Status</h3>
                            @endif

                            <!-- Modal for Image Slideshow -->
                            <div id="ss_v-status-modal" class="ss_v-status-modal ss_v-hidden">
                                <div class="ss_v-modal-content">
                                    <span id="ss_v-close-modal" class="ss_v-close">&times;</span>
                                    <div id="ss_v-slideshow-container" class="ss_v-slideshow-container">
                                        <!-- Slides will be injected here -->
                                    </div>
                                    <a class="ss_v-prev" onclick="plusSlides(-1)">&#10094;</a>
                                    <a class="ss_v-next" onclick="plusSlides(1)">&#10095;</a>
                                </div>
                            </div>

                        </div>
                        <!-- Modal for displaying status -->
                        <div id="status-modal" class="status-modal">
                            <div class="status-modal-content">
                                <div class="status-progress-bar"></div>
                                <span class="close">&times;</span>
                                <img id="status-image" src="" alt="Status Image">
                                <p id="status-text"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-1">
                        <div class="graph text-center  p-4 shadow-sm rounded">
                            <p style="color: whitesmoke" class="balance-label fw-bold ">Coins Balance</p>
                            <h2 class="balance-amount display-4 text-white">{{Auth::user()->coin_balance}}</h2>

                            <!-- Professional Coin Image -->
                            <img src="https://img.icons8.com/ios-filled/100/000000/coins.png" alt="Coin balance" class="coin-image mt-3" />
                            <!-- Button to Trigger Modal -->
                            <a href="{{route('user.coins')}}" class="btn btn-outline-dark btn-lg" >Buy Coins</a>

                            <!-- Modal for Top Up Coins -->
                            <div id="coin_pay-top-up-modal" class="coin_pay-modal coin_pay-hidden">
                                <div class="coin_pay-modal-content">
                                    <span id="coin_pay-close-modal" class="coin_pay-close">&times;</span>
                                    <h3 class="coin_pay-modal-title" style="color: #0a0d10; ">Top Up Your Coins</h3>
                                    <form id="coin_pay-form" action="{{route('user.buy.coin')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label style="color: #0a0d10; text-align: left; display: block; margin-bottom: 5px;" for="coin_pay-units">Units:</label>
                                            <input type="number" id="coin_pay-units" class="coin_pay-input" value="1" min="1" required />
                                        </div>
                                        <div class="form-group">
                                            <label style="color: #0a0d10; text-align: left; display: block; margin-bottom: 5px;" for="coin_pay-amount">Amount to Be Paid:</label>
                                            <input type="text" id="coin_pay-amount" class="coin_pay-input" readonly value="20" />
                                        </div>
                                        <div class="form-group">
                                            <label style="color: #0a0d10; text-align: left; display: block; margin-bottom: 5px;" for="coin_pay-payment-method">Select Payment Gateway:</label>
                                            <select id="coin_pay-payment-method" class="coin_pay-select">
                                                <option value="stripe">Stripe</option>
                                                <!-- Add more payment methods if needed -->
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-outline-success" id="coin_pay-proceed-btn">Proceed to Pay</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="top_models mt-5">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2>Top Models</h2>
                            @if(count($user_models) > 0)
                                <div class="row">
                                    @foreach($user_models as $model)
                                        <div class="col-lg-4 nft mb-4">

                                            <img src="{{asset($model->profile_image)}}" alt="Beautiful Woman Portrait" class="img-fluid rounded shadow-sm" />
                                            <div class="title mt-2 fw-semibold">{{$model->name}}</div>
                                            <div class="details d-flex justify-content-between align-items-center mt-2">
                                                <div class="icons d-flex align-items-center">
                                                    <div class="icon-container me-3">
                                                        <!-- Eye Icon -->
                                                        <a href="{{route('model.detail', $model->id)}}"><div class="custom-icon custom-eye-icon me-2" title="Views"></div></a>
                                                        <!-- Chat Icon -->
{{--                                                        <div class="custom-icon custom-chat-icon" title="Comments"></div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            @endif
                        </div>
                        <div class="col-lg-4">
                            <div class="unread-messages bg-light p-4 shadow-sm rounded">
                                <div class="heading d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="text-dark fw-bold">Recent News</h2>
                                    <a href="{{route('user.news')}}" class="text-dark">See all</a>
                                </div>
                                @if(count($latest_news) > 0)
                                    @foreach($latest_news as $new)
                                        <div class="message d-flex justify-content-between align-items-center mb-3">
                                        <div class="message-sender d-flex align-items-center">
                                            <img src="{{asset($new->image)}}" alt="Sender's Profile Picture" class="rounded-circle me-3 shadow-sm" />
                                            <div class="message-details">
                                                <h3 class="h6 fw-bold mb-1">{{$new->title}}</h3>
                                                <p class="mb-0 text-muted">                                    {!! (\Illuminate\Support\Str::limit($new->body, 20, '...')) !!}
                                                </p>
                                            </div>
                                        </div>
                                        <a href="{{route('user.new.detail', $new->post_url)}}" class="btn btn-outline-dark view-message">View</a>
                            </div>

                            @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ======Section======= -->
            @endsection

            <!-- Custom Styles -->
            <style>

                .dashboard-container {
                    padding: 20px;
                }
                .topbar {
                    background-color: #4C2835;
                    color: white;
                    border-radius: 8px;
                }
                .topbar .user p {
                    color: white;
                }
                .graph {
                    background-color: #cd9fab !important;
                    border-radius: 10px;
                    padding: 20px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    color: white !important;
                }
                .status-update-container {
                    background-color: #ad6476;
                    border-radius: 10px;
                    padding: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    overflow-x: auto;
                }
                .status-scroller .status {
                    margin-right: 10px;
                    text-align: center;
                }
                .status-image {
                    width: 50px;
                    height: 50px;
                    object-fit: cover;
                }
                .nft img {
                    border-radius: 8px;
                }
                .title {
                    color: #4C2835;
                    font-weight: bold;
                    margin-top: 10px;
                }
                .unread-messages {
                    background-color: #ffffff;
                    border-radius: 10px;
                    padding: 20px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                .message-sender img {
                    width: 40px;
                    height: 40px;
                }
                .view-message {
                    color: #4C2835;
                }
                .view-message:hover {
                    background-color: #4C2835;
                    color: white;
                }

                /* Mobile Responsiveness */
                @media (max-width: 768px) {
                    .col-lg-5.order-lg-2 {
                        order: 1;
                    }
                    .col-lg-4.order-lg-1 {
                        order: 2;
                        margin-top: 20px;
                    }
                }
            </style>
