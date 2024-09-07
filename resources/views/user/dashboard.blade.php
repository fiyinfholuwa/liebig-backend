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
                    <div class="col-lg-5 order-lg-2">
                        <div class="status-update-container d-flex flex-grow-1 me-3 p-3  shadow-sm rounded">
                            <div class="ss_v-status-scroller d-flex align-items-center">
                                <!-- User 1 Status -->
                                <div class="ss_v-status ss_v-spaced-status me-3">
                                    <img src="{{asset('frontend/images/jobs desktop.png')}}" alt="User 1" class="ss_v-status-image rounded-circle shadow-sm" />
                                    <span class="ss_v-status-name text-center d-block mt-2">User 1</span>
                                    <span class="ss_v-status-count d-block text-center mt-1">2 images</span>

                                    <!-- Images for User 1 -->
                                    <img src="{{asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJxo2NFiYcR35GzCk5T3nxA7rGlSsXvIfJwg&s')}}" class="ss_v-user-image" alt="User 1 Image 1" />
                                    <img src="{{asset('frontend/images/jobs desktop.png')}}" class="ss_v-user-image" alt="User 1 Image 2" />
                                </div>

                                <!-- User 2 Status -->
                                <div class="ss_v-status ss_v-spaced-status me-3">
                                    <img src="{{asset('frontend/images/about us desktop.png')}}" alt="User 2" class="ss_v-status-image rounded-circle shadow-sm" />
                                    <span class="ss_v-status-name text-center d-block mt-2">User 2</span>
                                    <span class="ss_v-status-count d-block text-center mt-1">3 images</span>

                                    <!-- Images for User 2 -->
                                    <img src="{{asset('frontend/images/jobs desktop.png')}}" class="ss_v-user-image" alt="User 2 Image 1" />
                                    <img src="{{asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrTFrhr_-pYR74jUgOy7IerAoHAX3zPIZZcg&s')}}" class="ss_v-user-image" alt="User 2 Image 2" />
                                    <img src="{{asset('https://imgv3.fotor.com/images/slider-image/A-clear-close-up-photo-of-a-woman.jpg')}}" class="ss_v-user-image" alt="User 2 Image 3" />
                                </div>

                                <!-- User 3 Status -->
                                <div class="ss_v-status ss_v-spaced-status">
                                    <img src="{{asset('frontend/images/About-us.webp')}}" alt="User 3" class="ss_v-status-image rounded-circle shadow-sm" />
                                    <span class="ss_v-status-name text-center d-block mt-2">User 3</span>
                                    <span class="ss_v-status-count d-block text-center mt-1">1 image</span>

                                    <!-- Images for User 3 -->
                                    <img src="{{asset('https://img.freepik.com/premium-photo/beautiful-young-woman-with-big-breasts-blue-dress_893012-298183.jpg')}}" class="ss_v-user-image" alt="User 3 Image 1" />
                                </div>
                            </div>

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
                            <div class="row">
                                <!-- First NFT Section -->
                                <div class="col-lg-5 nft mb-4">

                                    <img src="https://media.istockphoto.com/id/1695678200/photo/beautiful-woman-portraits.jpg?s=612x612&w=0&k=20&c=h17FAdH7hgZ93dR3NTuZvxxweYBjfsu9k-364PBPhLI=" alt="Beautiful Woman Portrait" class="img-fluid rounded shadow-sm" />
                                    <div class="title mt-2 fw-semibold">Nature's Love</div>
                                    <div class="details d-flex justify-content-between align-items-center mt-2">
                                        <div class="icons d-flex align-items-center">
                                            <div class="icon-container me-3">
                                                <!-- Eye Icon -->
                                                <div class="custom-icon custom-eye-icon me-2" title="Views"></div>
                                                <!-- Chat Icon -->
                                                <div class="custom-icon custom-chat-icon" title="Comments"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Second NFT Section -->
                                <div class="col-lg-5 nft mb-4">

                                    <img src="https://media.istockphoto.com/id/1695678200/photo/beautiful-woman-portraits.jpg?s=612x612&w=0&k=20&c=h17FAdH7hgZ93dR3NTuZvxxweYBjfsu9k-364PBPhLI=" alt="Beautiful Woman Portrait" class="img-fluid rounded shadow-sm" />
                                    <div class="title mt-2 fw-semibold">Nature's Love</div>
                                    <div class="details d-flex justify-content-between align-items-center mt-2">
                                        <div class="icons d-flex align-items-center">
                                            <div class="icon-container me-3">
                                                <!-- Eye Icon -->
                                                <div class="custom-icon custom-eye-icon me-2" title="Views"></div>
                                                <!-- Chat Icon -->
                                                <div class="custom-icon custom-chat-icon" title="Comments"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="unread-messages bg-light p-4 shadow-sm rounded">
                                <div class="heading d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="text-dark fw-bold">Recent News</h2>
                                    <p class="text-dark">See all</p>
                                </div>

                                <div class="message d-flex justify-content-between align-items-center mb-3">
                                    <div class="message-sender d-flex align-items-center">
                                        <img src="https://raw.githubusercontent.com/programmercloud/nft-dashboard/main/img/user.png" alt="Sender's Profile Picture" class="rounded-circle me-3 shadow-sm" />
                                        <div class="message-details">
                                            <h3 class="h6 fw-bold mb-1">John Doe</h3>
                                            <p class="mb-0 text-muted">Hey, I wanted to check...</p>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-outline-dark view-message">View</a>
                                </div>

                                <div class="message d-flex justify-content-between align-items-center mb-3">
                                    <div class="message-sender d-flex align-items-center">
                                        <img src="https://raw.githubusercontent.com/programmercloud/nft-dashboard/main/img/user.png" alt="Sender's Profile Picture" class="rounded-circle me-3 shadow-sm" />
                                        <div class="message-details">
                                            <h3 class="h6 fw-bold mb-1">Jane Smith</h3>
                                            <p class="mb-0 text-muted">Are you available for...</p>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-outline-dark view-message">View</a>
                                </div>

                                <div class="message d-flex justify-content-between align-items-center mb-3">
                                    <div class="message-sender d-flex align-items-center">
                                        <img src="https://raw.githubusercontent.com/programmercloud/nft-dashboard/main/img/user.png" alt="Sender's Profile Picture" class="rounded-circle me-3 shadow-sm" />
                                        <div class="message-details">
                                            <h3 class="h6 fw-bold mb-1">Michael Johnson</h3>
                                            <p class="mb-0 text-muted">Don't forget our meeting...</p>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-outline-dark view-message">View</a>
                                </div>

                                <div class="message d-flex justify-content-between align-items-center mb-3">
                                    <div class="message-sender d-flex align-items-center">
                                        <img src="https://raw.githubusercontent.com/programmercloud/nft-dashboard/main/img/user.png" alt="Sender's Profile Picture" class="rounded-circle me-3 shadow-sm" />
                                        <div class="message-details">
                                            <h3 class="h6 fw-bold mb-1">Emily Davis</h3>
                                            <p class="mb-0 text-muted">Could you please review...</p>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-outline-dark view-message">View</a>
                                </div>
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
