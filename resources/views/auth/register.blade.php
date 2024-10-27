<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{asset('frontend/css/Signup.css')}}" rel="stylesheet">

</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<style>
    *{
        font-family: "Lato", sans-serif;
    }
</style>

<body>
<div class="container signup-container my-5">
    <div class="row g-0 shadow rounded-4 overflow-hidden bg-white">
        <div class="col-lg-6 d-lg-block" style="background: url('{{asset('frontend/images/register.jpg')}}') center/contain;">
            <div class="h-100 d-flex align-items-center justify-content-center" style="background-color: rgba(255, 99, 132, 0.6);">
                <div class="text-white text-center p-5">
                    <h2 class="fw-bold mb-4">Welcome to Lieblings Chat</h2>
                    <p class="lead">Connect with amazing people and start meaningful conversations today!</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 p-5">
            <img src="{{asset('fronteend/images/Lieblings-300x126.png')}}" alt="">
            <h2 class="text-center mb-4">Create an Account</h2>
            <p class="text-center mb-4">Du bist bereits Mitglied?  <a href="{{route('login')}}" class="text-decoration-none">Jetzt anmelden</a></p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" value="{{old('name')}}" class="form-control form-control-lg" name="name" placeholder="Vollständiger Name" required>
                    @error('name')
                    <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="email" value="{{old('email')}}" name="email" class="form-control form-control-lg" placeholder="E-Mail Adresse" required>
                    @error('email')
                    <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="text" value="{{old('username')}}" name="Benutzername" class="form-control form-control-lg" placeholder="Username" required>
                    @error('username')
                    <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Passwort" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </button>
                        @error('password')
                        <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password" placeholder="Password Confirmation" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </button>
                        @error('password')
                        <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>


{{--                <div class="mb-3">--}}
{{--                    <select name="interested_in" class="form-select form-select-lg" required>--}}
{{--                        <option selected disabled value="">I'm interested in</option>--}}
{{--                        <option>Women</option>--}}
{{--                        <option>Men</option>--}}
{{--                    </select>--}}
{{--                    @error('interested_in')--}}
{{--                    <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="termsCheck" required>
                    <label class="form-check-label" for="termsCheck">Ich habe die Allgemeinen Geschäftsbedingungen gelesen,  <a href="#" class="text-decoration-none">verstanden und stimme ihnen zu.</a></label>
                </div>
                <button type="submit" class="btn btn-signup btn-lg text-white w-100 mb-3">Account erstellen</button>
            </form>
        </div>

    </div>
</div>
<script src="Signup.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
