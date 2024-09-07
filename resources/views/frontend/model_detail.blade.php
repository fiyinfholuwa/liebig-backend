@extends('frontend.app')

@section('content')
    <div class="container profile-container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('frontend/images/model1.jpg')}}" class="img-fluid profile-picture mb-3" alt="Profile Picture">
                <div class="mb-3">
                    <span class="badge badge-custom badge-gold">Gold</span>
                    <span class="badge badge-custom badge-verified">Verified</span>
                    <span class="badge badge-custom badge-awesome">Awesome</span>
                </div>
                <h4>About Me</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus ultrices est. Ut malesuada facilisis magna.</p>
                <h4>My Interests</h4>
                <ul class="interests-list list-unstyled">
                    <li><i class="fas fa-book text-primary"></i> Reading & Writing</li>
                    <li><i class="fas fa-plane-departure text-success"></i> Traveling</li>
                    <li><i class="fas fa-camera text-info"></i> Photography</li>
                    <li><i class="fas fa-palette text-warning"></i> Painting</li>
                    <li><i class="fas fa-hiking text-danger"></i> Hiking</li>
                </ul>
            </div>
            <div class="col-md-5">
                <div class="photo-grid">
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/150" alt="Photo 1">
                        <div class="overlay">
                            <div class="text">Upgrade Now</div>
                        </div>
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/150" alt="Photo 2">
                        <div class="overlay">
                            <div class="text">Upgrade Now</div>
                        </div>
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/150" alt="Photo 3">
                        <div class="overlay">
                            <div class="text">Upgrade Now</div>
                        </div>
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/150" alt="Photo 4">
                        <div class="overlay">
                            <div class="text">Upgrade Now</div>
                        </div>
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/150" alt="Photo 5">
                        <div class="overlay">
                            <div class="text">Upgrade Now</div>
                        </div>
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/150" alt="Photo 6">
                        <div class="overlay">
                            <div class="text">Upgrade Now</div>
                        </div>
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/150" alt="Photo 7">
                        <div class="overlay">
                            <div class="text">Upgrade Now</div>
                        </div>
                    </div>
                    <div class="photo-item">
                        <img src="https://via.placeholder.com/150" alt="Photo 8">
                        <div class="overlay">
                            <div class="text">Upgrade Now</div>
                        </div>
                    </div>
                    <div class="photo-item">
                        <div class="text">All Photos</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2>Bowler</h2>
                <p><i class="fas fa-map-marker-alt text-danger"></i> Female, 47 | United States, New York</p>
                <div class="hit-or-miss-container d-flex justify-content-between mb-3">
                    <button class="btn btn-custom btn-hit"><i class="fas fa-heart"></i> Hit</button>
                    <button class="btn btn-custom btn-miss"><i class="fas fa-times"></i> Miss</button>
                </div>
                <div class="d-grid gap-2 mb-4">
                    <button class="btn btn-custom btn-message text-white">Send Message</button>
                    <button class="btn btn-custom btn-wink">Send Wink</button>
                </div>
                <div class="mb-4">
                    <p><strong>Age:</strong> 47</p>
                    <p><strong>Ethnicity:</strong> Indian</p>
                    <p><strong>Sexuality:</strong> Straight</p>
                    <p><strong>Gender:</strong> Female</p>
                    <p><strong>Eye Color:</strong> Blue</p>
                    <p><strong>Hair:</strong> Blonde</p>
                    <p><strong>Body:</strong> Slim</p>
                    <p><strong>Height:</strong> 5'6" (168 cm)</p>
                </div>
                <div class="mb-4">
                    <h5>Send a virtual gift</h5>
                    <i class="fas fa-gift fa-3x text-danger"></i>
                </div>
                <div class="mb-4">
                    <button class="btn btn-outline-primary me-2">Add Friend</button>
                    <button class="btn btn-outline-secondary">Add Favorites</button>
                </div>
                <div>
                    <h5>Share this profile</h5>
                    <div class="container">
                        <div class="social-icons d-flex justify-content-center">
                            <a href="#" class="social-icon facebook mx-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon twitter mx-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon instagram mx-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon pinterest mx-2"><i class="fab fa-pinterest"></i></a>
                            <a href="#" class="social-icon linkedin mx-2"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="copy-link-container d-flex">
                        <input type="text" class="form-control" id="profileLink" value="https://yoursite.com/profile/bowler" readonly>
                        <button class="btn btn-primary ms-2" id="copyLinkBtn">Copy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container recommended-section">
        <h4 class="mb-4">Recommended For You</h4>
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card hover-card w-100" data-card-id="1">
                    <div class="position-relative">
                        <img src="{{asset('frontend/images/j2.webp')}}" class="card-img-top" alt="Model Image">
                        <div class="hover-overlay">
                            <div class="hover-content">
                                <p>Age: 28</p>
                                <p>City: New York</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <h5 class="card-title">Roadblock <span class="text-success">●</span></h5>
                        <p class="card-text">New York</p>
                        <span class="badge badge-gold">GOLD</span>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card hover-card w-100" data-card-id="2">
                    <div class="position-relative">
                        <img src="{{asset('frontend/images/j2.webp')}}" class="card-img-top" alt="Model Image">
                        <div class="hover-overlay">
                            <div class="hover-content">
                                <p>Age: 28</p>
                                <p>City: New York</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <h5 class="card-title">Roadblock <span class="text-success">●</span></h5>
                        <p class="card-text">New York</p>
                        <span class="badge badge-gold">GOLD</span>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card hover-card w-100" data-card-id="3">
                    <div class="position-relative">
                        <img src="{{asset('frontend/images/j2.webp')}}" class="card-img-top" alt="Model Image">
                        <div class="hover-overlay">
                            <div class="hover-content">
                                <p>Age: 28</p>
                                <p>City: New York</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <h5 class="card-title">Roadblock <span class="text-success">●</span></h5>
                        <p class="card-text">New York</p>
                        <span class="badge badge-gold">GOLD</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
