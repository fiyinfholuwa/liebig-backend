@extends('frontend.app')


@section('content')

    <style>
        .hero-content p{
            color: whitesmoke;
        }
        .hero_home{
            padding: 200px 200px 0;
        }

        @media (max-width: 425px) {
            .hero_home{
                padding: 100px 20px 0;
            }

            .model_c{
                margin-top: 30px !important;
            }
        }

    </style>
    <div class="hero_home">
        <div class="card">
            <div class="container-fluid p-0">
                <div class="d-none d-md-block row justify-content-center align-items-center vh-100">
                    <div class="col-12 text-center">
                        <img src="{{asset('frontend/images/jobs desktop.png')}}" alt="Full Screen Banner" class="img-fluid w-70 h-100" style="margin-top: -20px;">
                    </div>
                </div>
                <div class="d-block d-md-none row justify-content-center align-items-center">
                    <div class="col-12">
                        <img src="{{asset('frontend/images/jobs mobile.png')}}" alt="Mobile Banner" class="img-fluid w-100" style="margin-top: -20px;">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>Bist du bereit, deine Sinnlichkeit und Ausstrahlung mit der Welt zu teilen? Bei Lieblings-Chat bieten wir dir die Möglichkeit, in einer sicheren und respektvollen Umgebung deine Talente zu entfalten und gleichzeitig Teil einer exklusiven Community zu werden.</p>

                <h4>Was wir bieten:</h4>
                <ul>
                    <li><strong>Sichere und diskrete Arbeitsumgebung:</strong> Deine Privatsphäre und Sicherheit stehen bei uns an erster Stelle. Mit modernster SSL-Verschlüsselung und höchsten IT-Sicherheitsstandards gewährleisten wir eine vertrauensvolle Umgebung für die Arbeit von Zuhause aus.</li>
                    <li><strong>Flexible Arbeitszeiten:</strong> Bestimme selbst, wann und wie oft du arbeiten möchtest. Bei uns hast du die Freiheit, deinen eigenen Zeitplan zu erstellen und deine Arbeit an deine Bedürfnisse anzupassen.</li>
                    <li><strong>Attraktive Verdienstmöglichkeiten:</strong> Nutze deine Talente und erhalte für deine Zeit und Hingabe eine faire Vergütung. Du hast die Kontrolle über deine Einnahmen und kannst zusätzlich durch Geschenke und besondere Funktionen profitieren.</li>
                    <li><strong>Unterstützung und Schulungen:</strong> Wir bieten umfassende Unterstützung und Schulungen, damit du dich wohlfühlst und erfolgreich sein kannst. Unser Team steht dir jederzeit zur Seite, um dir den Einstieg zu erleichtern und dich bei deiner Weiterentwicklung zu unterstützen.</li>
                    <li><strong>Werde Teil einer inspirierenden Community:</strong> Trete einer Gemeinschaft von starken und selbstbewussten Frauen bei, die ihre Leidenschaften und Talente teilen. Gemeinsam schaffen wir eine Plattform, auf der jeder respektiert und geschätzt wird.</li>
                </ul>

                <h4 class="text-center">Wie du dich bewirbst:</h4>
                <p>Wir freuen uns darauf, von dir zu hören! Wenn du Interesse hast, mit Lieblings-Chat.de zu arbeiten, würden wir uns über eine aussagekräftige Bewerbung freuen. Erzähle uns ein wenig über dich und deiner Motivation, Teil unseres Teams zu werden. Wir melden uns zeitnah bei dir, um den weiteren Prozess zu besprechen.</p>

                <h4 class="text-center">Kontakt:</h4>
                <p>Hast du Fragen oder benötigst weitere Informationen? Unser Support-Team ist jederzeit für dich da. Kontaktiere uns einfach über unser Kontaktformular oder per E-Mail an <a href="mailto:info@lieblings-chat.de">info@lieblings-chat.de</a>. Wir freuen uns darauf, dich kennenzulernen und gemeinsam eine aufregende und erfüllende Zusammenarbeit zu starten!</p>

                <form  action="{{route('save.job')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="firstName">Vorname</label>
                        <input type="text" class="form-control"  name="first_name" id="firstName" placeholder="Vorname">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Nachname</label>
                        <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Nachname">
                    </div>
                    <div class="form-group">
                        <label for="gender">Geschlecht</label>
                        <select id="gender" name="gender" class="form-control">
                            <option selected>--Geschlecht auswählen--</option>
                            <option>männlich</option>
                            <option>weiblich</option>
                            <option>anderes</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Ihre E-Mail">
                    </div>
                    <div class="form-group">
                        <label for="portfolio">Laden Sie Ihr Portfolio hoch</label>
                        <input type="file" name="resume" class="form-control-file" id="portfolio">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="subscribe">
                        <label class="form-check-label" for="subscribe">Für unseren Newsletter anmelden</label>
                    </div>
                    <button type="submit" class="btn btn-primary ">Bewerbung senden</button>
                </form>
            </div>
        </div>
    </div>

@endsection
