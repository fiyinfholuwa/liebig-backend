<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Mail-Bestätigung</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">
<div style="max-width: 600px; width: 90%; background: #ffffff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center;">
    <p style="font-size: 1rem; color: #333; margin-bottom: 1.5rem; line-height: 1.6;">
        Vielen Dank für Ihre Anmeldung! Bevor Sie loslegen, bestätigen Sie bitte Ihre E-Mail-Adresse, indem Sie auf den Link klicken, den wir Ihnen gerade per E-Mail gesendet haben. Falls Sie die E-Mail nicht erhalten haben, senden wir Ihnen gerne eine neue.
    </p>

    <div style="font-size: 0.9rem; font-weight: bold; color: #28a745; margin-bottom: 1.5rem; padding: 0.8rem; border: 1px solid #c3e6cb; background-color: #d4edda; border-radius: 5px;">
        Ein neuer Bestätigungslink wurde an die von Ihnen bei der Registrierung angegebene E-Mail-Adresse gesendet.
    </div>

    <div style="display: flex; justify-content: space-between; gap: 1rem;">
        <form method="POST" action="{{ route('verification.send') }}" style="margin: 0;">
            @csrf
            <button type="submit" style="padding: 0.75rem 1.5rem; font-size: 0.9rem; font-weight: bold; border: none; border-radius: 5px; cursor: pointer; background-color: deeppink; color: white; transition: background-color 0.3s ease;">
                Bestätigungs-E-Mail erneut senden
            </button>
        </form>

        <form method="POST" action="{{route('logout')}}" style="margin: 0;">
            @csrf
            <button type="submit" style="padding: 0.75rem 1.5rem; font-size: 0.9rem; font-weight: bold; border: none; border-radius: 5px; cursor: pointer; background-color: #6D3648; color: white; transition: background-color 0.3s ease;">
                Abmelden
            </button>
        </form>
    </div>
</div>
</body>
</html>
