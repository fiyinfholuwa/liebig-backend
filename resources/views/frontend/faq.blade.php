@extends('frontend.app')


@section('content')

    <style>
        .hero-content p{
            color: whitesmoke;
        }
        .hero_home{
            padding: 0 200px;
        }

        @media (max-width: 425px) {
            .hero_home{
                padding: 0 20px;
            }

            .model_c{
                margin-top: 30px !important;
            }
        }

    </style>
    <div class="container-fluid p-0 mt-5">
        <!-- Desktop View -->
        <div class="d-none d-md-flex justify-content-center align-items-center vh-100">
            <div class="col-12 text-center">
                <img src="{{asset('frontend/images/faq desktop.png')}}" alt="Full Screen Banner" class="img-fluid" style="width: 70%; height: auto; margin-top: 20px;">
            </div>
        </div>
        <!-- Mobile View -->
        <div class="d-flex d-md-none justify-content-center align-items-center">
            <div class="col-12 p-0">
                <img src="{{asset('frontend/images/faq mobile.png')}}" alt="Mobile Banner" class="img-fluid w-100" style="margin-top: 20px;">
            </div>
        </div>
    </div>
    <div class="accordion hero_home mt-5" id="faqAccordion">
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-1s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                    Wie funktioniert das kostenlose Startguthaben?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Nach der Anmeldung erhalten Sie automatisch ein Startguthaben, mit dem Sie unsere Chats unverbindlich ausprobieren können. So können Sie sich ein Bild von unseren Angeboten machen, ohne sofort investieren zu müssen.
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-2s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                    Was ist das Geschenk-System und wie funktioniert es?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Unser Geschenk-System ermöglicht es Ihnen, Ihrem Lieblingsmodel im Chat besondere Geschenke zu machen. Diese Geschenke können direkt im Chat gekauft und mit Coins bezahlt werden. Es ist eine wunderbare Möglichkeit, Ihrem Model noch mehr Zuneigung zu zeigen und das Gespräch besonders zu gestalten.
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-3s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                    Was ist das Glücksrad und wie funktioniert es?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Das Glücksrad ist eine spannende Funktion auf unserer Website, bei der Sie die Chance haben, tolle Preise zu gewinnen. Jede Drehung am Glücksrad gewinnt einen Preis. Sie können Geschenke und bis zu 4500 Coins gewinnen. Probieren Sie Ihr Glück und freuen Sie sich auf tolle Überraschungen!
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-4s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                    Wie schalte ich die unzensierten Bilder frei?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Tauchen Sie ein in die verführerische Galerie jedes Models! Neben den öffentlichen Fotos gibt es exklusive, zensierte Bilder, die nur darauf warten, von Ihnen entdeckt zu werden. Mit ein paar Coins können Sie diese zensierten Bilder freischalten und unzensiert genießen. Der Preis für jedes Bild wird von den Models selbst festgelegt. Und das Beste: Als neuer Nutzer erhalten Sie einmalig die Möglichkeit, ein zensiertes Bild kostenlos unzensiert freizuschalten. Probieren Sie es aus und entdecken Sie die sinnliche Seite unserer Models hautnah!
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-5s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                    Muss ich ein Abonnement abschließen?
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Nein, bei uns gibt es keine Abonnements. Sie entscheiden selbst, wie viele Coins Sie kaufen und ausgeben möchten. Es gibt keine versteckten Kosten oder langfristigen Verpflichtungen.
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-6s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                    Wie kaufe ich Coins?
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Coins können einfach und sicher über unser Zahlungssystem erworben werden. Sie können aus verschiedenen Zahlungsmethoden wählen, wie Kreditkarte, PayPal oder andere gängige Online-Zahlungsoptionen.
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-7s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven">
                    Was passiert, wenn mein Coin-Guthaben aufgebraucht ist?
                </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Wenn Ihr Coin-Guthaben aufgebraucht ist, können Sie jederzeit neues Guthaben kaufen, um weiter zu chatten. Es gibt keine automatische Nachbuchung, sodass Sie immer die volle Kontrolle über Ihre Ausgaben behalten.
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-8s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight">
                    Welche Models sind verfügbar?
                </button>
            </h2>
            <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Unsere Plattform bietet eine Vielzahl wunderschöner und liebevoller Models, die sich darauf freuen, Sie kennenzulernen. Egal, ob Sie auf der Suche nach anregenden Gesprächen oder sinnlichen Momenten sind, bei uns finden Sie das passende Model.
                </div>
            </div>
        </div>

        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-10s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen">
                    Kann ich bestimmte Models favorisieren?
                </button>
            </h2>
            <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Ja, Sie können Ihre Lieblingsmodels favorisieren und schnell auf deren Profile und Chats zugreifen. So bleiben Ihre bevorzugten Models immer in Reichweite.
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-11s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven">
                    Wie lange dauert eine Chat-Sitzung?
                </button>
            </h2>
            <div id="collapseEleven" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Die Dauer einer Chat-Sitzung hängt von der Anzahl der Coins ab, die Sie verwenden möchten. Sie haben die Flexibilität, selbst zu bestimmen, wie lange Sie chatten möchten.
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-12s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve">
                    Wie wird meine Privatsphäre geschützt?
                </button>
            </h2>
            <div id="collapseTwelve" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Ihre Privatsphäre hat für uns oberste Priorität. Wir verwenden modernste SSL-Verschlüsselung, um Ihre Daten zu schützen und sicherzustellen, dass alle Ihre Gespräche vertraulich bleiben. Ihre persönlichen Informationen werden niemals an Dritte weitergegeben.
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-13s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen">
                    Sind meine Zahlungsinformationen sicher?
                </button>
            </h2>
            <div id="collapseThirteen" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Ja, Ihre Zahlungsinformationen werden durch unsere sichere Zahlungsabwicklung geschützt. Wir verwenden Verschlüsselungstechnologien, um sicherzustellen, dass Ihre Daten sicher und vertraulich bleiben.
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-14s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen">
                    Kann ich die Plattform auch mobil nutzen?
                </button>
            </h2>
            <div id="collapseFourteen" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Ja, unsere Plattform ist vollständig mobil optimiert. Sie können jederzeit und überall über Ihr Smartphone oder Tablet auf unsere Services zugreifen.
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-15s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen">
                    Was mache ich, wenn ich ein Problem habe oder Unterstützung benötige?
                </button>
            </h2>
            <div id="collapseFifteen" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Unser Kundensupport steht Ihnen jederzeit zur Verfügung. Sie können uns über unser Kontaktformular, per E-Mail oder telefonisch erreichen. Wir helfen Ihnen gerne weiter.
                </div>
            </div>
        </div>
        <div class="accordion-item animate__animated animate__fadeInUp animate__delay-16s">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixteen">
                    Gibt es spezielle Aktionen oder Rabatte?
                </button>
            </h2>
            <div id="collapseSixteen" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-white">
                    Ja, wir bieten regelmäßig spezielle Aktionen und Rabatte an. Melden Sie sich für unseren Newsletter an, um keine Angebote zu verpassen und immer über die neuesten Aktionen informiert zu sein.
                </div>
            </div>
        </div>
    </div>
@endsection
