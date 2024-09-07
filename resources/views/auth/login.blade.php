<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{asset('frontend/css/Account.css')}}" rel="stylesheet">
</head>
<body>
<div class="container login-container mt-5">
    <div class="row g-0 shadow rounded-3 overflow-hidden">
        <div class="col-md-6 d-flex align-items-center justify-content-center"
             style="background-image: url({{asset('frontend/images/model1.jpg')}}); background-size: cover; background-position: center; min-height: 300px;">
        </div>

        <div class="col-md-6 bg-white p-5">
            <h2 class="text-center mb-4">Sign In</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                    @error('email')
                    <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control" id="password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </button>
                        @error('password')
                        <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <button type="submit"  class="btn btn-signin text-white w-100 mb-3" role="button">Sign In</button>
                <div class="text-center mb-3">
                    <a href="Forgot.html" class="text-decoration-none">Forgot password?</a>
                </div>
            </form>
            <div class="text-center">
                <p>Don't have an account? <a href="{{route('register')}}" class="text-decoration-none">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('frontend/js/Account.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
