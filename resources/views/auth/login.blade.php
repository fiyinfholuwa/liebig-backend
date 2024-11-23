<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{asset('frontend/css/Account.css')}}" rel="stylesheet">
</head>

<body>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<style>
    *{
        font-family: "Lato", sans-serif;
    }
</style>
<div class="container login-container mt-5">
    <div class="row g-0 shadow rounded-3 overflow-hidden">
        <div class="col-md-6 d-flex align-items-center justify-content-center"
             style="background-image: url({{asset('frontend/images/login.jpg')}}); background-size: cover; background-position: center; min-height: 300px;">
        </div>

        <div class="col-md-6 bg-white p-5">
            <h2 class="text-center mb-4">Anmelden</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail-Adresse</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                    @error('email')
                    <p style="color: #b01e1e; font-weight: bold">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Passwort</label>
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
                    <label class="form-check-label" for="rememberMe">Angemeldet bleiben</label>
                </div>
                <button type="submit" class="btn btn-signin text-white w-100 mb-3" role="button">Einloggen</button>
                <div class="text-center mb-3">
                    <a href="Forgot.html" class="text-decoration-none">Passwort vergessen?</a>
                </div>
            </form>
            <div class="text-center">
                <p>Noch keinen Account?  <a href="{{route('register')}}" class="text-decoration-none">Jetzt registrieren</a></p>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('frontend/js/Account.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
