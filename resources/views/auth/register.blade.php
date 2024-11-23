<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{asset('frontend/css/Signup.css')}}" rel="stylesheet">
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<style>
    * {
        font-family: "Lato", sans-serif;
    }
</style>

<body>
<div class="container signup-container my-5">
    <div class="row g-0 shadow rounded-4 overflow-hidden bg-white">
        <div class="col-lg-6 d-lg-block" style="background: url('{{asset('frontend/images/register.jpg')}}') center/contain;">
            <div class="h-100 d-flex align-items-center justify-content-center" style="background-color:">
                <div class="text-white text-center p-5">
{{--                    <h2 class="fw-bold mb-4">Willkommen bei Lieblings Chat</h2>--}}
{{--                    <p class="lead">Verbinde dich mit großartigen Menschen und beginne heute sinnvolle Gespräche!</p>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-6 p-5">
            <img src="{{asset('frontend/images/Lieblings-300x126.png')}}" alt="Logo">
            <h2 class="text-center mb-4">Erstellen Sie ein Konto</h2>
            <p class="text-center mb-4">Bereits Mitglied? <a href="{{route('login')}}" class="text-decoration-none">Jetzt anmelden</a></p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" value="{{old('name')}}" class="form-control form-control-lg" name="name" placeholder="Vollständiger Name" required>
                    @error('name')
                    <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="email" value="{{old('email')}}" name="email" class="form-control form-control-lg" placeholder="E-Mail-Adresse" required>
                    @error('email')
                    <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="text" value="{{old('username')}}" name="username" class="form-control form-control-lg" placeholder="Benutzername" required>
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
                        <input type="password" name="password_confirmation" class="form-control form-control-lg" id="passwordConfirmation" placeholder="Passwort bestätigen" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirmation">
                            <i class="far fa-eye"></i>
                        </button>
                        @error('password_confirmation')
                        <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="termsCheck" required>
                    <label class="form-check-label" for="termsCheck">Ich habe die <a href="#" class="text-decoration-none">Allgemeinen Geschäftsbedingungen</a> gelesen, verstanden und stimme ihnen zu.</label>
                </div>
                <button type="submit" class="btn btn-signup btn-lg text-white w-100 mb-3">Konto erstellen</button>
            </form>
        </div>
    </div>
</div>
<script src="Signup.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
