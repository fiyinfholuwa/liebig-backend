<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Model Dashboard</title>
    <!-- CSS -->
    <link href="{{asset('frontend/css/Dashboard.css')}}" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ionicons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/ionicons.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --background-color: #f4f6f8;
            --text-color: #34495e;
            --icon-size: 24px;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Icon Container */
        .icon-container {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* Base Icon Styles */
        .custom-icon {
            width: var(--icon-size);
            height: var(--icon-size);
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease;
            background-size: cover;
            background-position: center;
        }

        .custom-icon:hover {
            transform: scale(1.1);
        }

        /* Sophisticated Eye Icon */
        .custom-eye-icon {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="%233498db" viewBox="0 0 24 24"><path d="M12 4.5c-3.5 0-6.5 2.8-8 6.5 1.5 3.7 4.5 6.5 8 6.5s6.5-2.8 8-6.5c-1.5-3.7-4.5-6.5-8-6.5zm0 11c-2.1 0-3.8-1.7-3.8-3.8S9.9 8 12 8s3.8 1.7 3.8 3.8S14.1 15.5 12 15.5z"/><circle cx="12" cy="12" r="2.5" fill="%23ffffff"/></svg>');
        }

        /* Sophisticated Chat Icon */
        .custom-chat-icon {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" fill="%232c3e50" viewBox="0 0 24 24"><path d="M20 4h-16c-1.1 0-2 .9-2 2v14l4-4h14c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2zm-8 7h-8v-2h8v2zm4-4h-12v-2h12v2zm0 8h-12v-2h12v2z"/></svg>');
        }

        /* NFT Container Styling */
        .nft {
            border: none;
            border-radius: 12px;
            padding: 25px;
            background-color: #ffffff;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .nft:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .nft .title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-top: 15px;
        }

        /* Tooltip styles */
        [title] {
            position: relative;
        }

        [title]:hover::after {
            content: attr(title);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--secondary-color);
            color: #ffffff;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        [title]:hover::after {
            opacity: 1;
        }

        .ff-fab-container {
            position: fixed;
            bottom: 150px;
            right: 20px;
            display: flex;
            flex-direction: column-reverse; /* Reverse the column direction */
            align-items: center;
        }

        .ff-fab {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #343434;
            color: white;
            border: none;
            font-size: 24px;
            cursor: pointer;
            margin-top: 10px; /* Add margin to separate the buttons */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
    display: flex;
    justify-content: center;
    align-items: center;
}

.ff-fab img {
    width: 50%;  /* Make the image smaller than the button */
    height: 50%; /* Maintain aspect ratio and center it */
    object-fit: contain; /* Ensure the image fits well within the button */
        }

        .ff-fab:hover {
            background-color: #600f2d;
        }

        .ff-secondary {
            display: none;
        }

        .ff-hidden {
            display: none;
        }

        .ff-modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .ff-modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 5px;
        }

        .ff-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .ff-close:hover,
        .ff-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #ff-status-form {
            display: flex;
            flex-direction: column;
        }

        #ff-status-form label {
            margin-bottom: 10px;
        }

        #ff-status-form input {
            margin-bottom: 20px;
        }

        #ff-status-form button {
            padding: 10px;
            background-color: #562d38;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #ff-status-form button:hover {
            background-color: #824554;
        }

        /* End Responsive */


    </style>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Floated Chat Button */
        #chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            padding: 15px 25px;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            font-size: 18px;
        }

        /* Chat Box */
        #chat-box {
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 400px;
            height: 600px;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: none;
            flex-direction: column;
        }

        @media (min-width: 1024px) {
            #chat-box {
                width: 500px;
                height: 700px;
            }
        }

        /* Header */
        #chat-header {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
        }

        #search-box {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        #chat-person-header {
            display: none;
            align-items: center;
        }

        #chat-person-header button {
            margin-right: 10px;
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        #chat-person-name {
            font-size: 18px;
            font-weight: bold;
        }

        /* Chat List */
        #chat-list {
            height: 300px;
            overflow-y: scroll;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        @media (min-width: 1024px) {
            #chat-list {
                height: 400px;
            }
        }

        .chat-item {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }

        .chat-item:hover {
            background-color: #f0f0f0;
        }

        /* Chat Content */
        #chat-content {
            display: none;
            padding: 10px;
            flex-grow: 1;
            flex-direction: column;
        }

        #message-list {
            height: 400px;
            overflow-y: scroll;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        #message-list img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }

        #chat-input {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #message-input {
            width: 65%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        #image-input {
            width: 20%;
        }

        button {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
<!-- Sidebar Container -->
<div class="sidebar hidden">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <img src="{{asset('frontend/images/Lieblings-300x126.png')}}" alt="Logo" class="img-fluid mb-4">
        <div class="side-nav">
            <a href="{{route('user.dashboard')}}" class="menu-item d-flex align-items-center mb-3 active">
                <ion-icon name="apps-outline" class="me-2"></ion-icon>
                <p class="mb-0">Dashboard</p>
            </a>
            <a href="" class="menu-item d-flex align-items-center mb-3">
                <ion-icon name="person-outline" class="me-2"></ion-icon>
                <p class="mb-0">Mein Profil</p>
            </a>
            <a href="{{route('show.model.chat')}}" class="menu-item d-flex align-items-center mb-3">
                <ion-icon name="chatbubble-outline" class="me-2"></ion-icon>
                <p class="mb-0">Meine Chats</p>
            </a>



            <a href="{{route('user.news')}}" class="menu-item d-flex align-items-center mb-3">
                <ion-icon name="trophy-outline" class="me-2"></ion-icon>
                <p class="mb-0">Nachrichten anzeigen</p>
            </a>


            <a target="_blank" href="{{route('models')}}" class="menu-item d-flex align-items-center mb-3">
                <ion-icon name="search-outline" class="me-2"></ion-icon>
                <p class="mb-0">Model suchen</p>
            </a>
            <a href="" class="menu-item d-flex align-items-center mb-3">
                <ion-icon name="trophy-outline" class="me-2"></ion-icon>
                <p class="mb-0">Glucksrad</p>
            </a>

            <a href="{{route('user.coins')}}" class="menu-item d-flex align-items-center mb-3">
                <ion-icon name="cash-outline" class="me-2"></ion-icon>
                <p class="mb-0">Coins Kaufen</p>
            </a>
            <a href="{{route('user.payment')}}" class="menu-item d-flex align-items-center mb-3">
                <ion-icon name="wallet-outline" class="me-2"></ion-icon>
                <p class="mb-0">Bestellverlauf</p>
            </a>
            <hr>
            <a href="" class="menu-item d-flex align-items-center mb-3">
                <ion-icon name="help-circle-outline" class="me-2"></ion-icon>
                <p class="mb-0">Hilfe</p>
            </a>
        </div>
        <div class="log-out">
            <a href="{{route('logout')}}" class="menu-item d-flex align-items-center">
                <ion-icon name="log-out-outline" class="me-2"></ion-icon>
                <p class="mb-0">Logout</p>
            </a>
        </div>
    </div>
</div>

<!-- Toggle Button -->
<button class="sidebar-toggle" aria-label="Toggle sidebar">
    <ion-icon name="menu-outline" class="icon-open"></ion-icon>
    <ion-icon name="close-outline" class="icon-close"></ion-icon>
</button>

@yield('content')




<div class="ff-fab-container">
    <button id="ff-main-fab" class="ff-fab">+</button>
    <div id="ff-secondary-buttons" class="ff-hidden">
        <button id="ff-chat-btn" class="ff-fab ff-secondary">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSR9IyxsfqiQSWjikSN9R_qovButKOzYbYxqA&s"/>
        </button>

        <script>
            document.getElementById('ff-chat-btn').addEventListener('click', function() {
                window.location.href = "{{ route('show.model.chat') }}";
            });
        </script>
        <button id="ff-update-status-btn" class="ff-fab ff-secondary"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS__2Q54HucOe8WGDOpNVpzuTTk0HYe1eV-Fw&s"/></button>
    </div>
</div>

<!-- Status Modal -->
<div id="ff-status-modal" class="ff-modal ff-hidden">
    <div class="ff-modal-content">
        <span id="ff-close-modal" class="ff-close">&times;</span>
        <h4 style="text-align: center; margin-bottom: 20px;">Status Update</h4>
        <form id="ff-status-form" method="post" action="{{route('user.status.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="file"  name="file-upload" required>
            <button style="margin-top: 40px;" type="submit">Update Status</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainFab = document.getElementById('ff-main-fab');
        const secondaryButtons = document.getElementById('ff-secondary-buttons');
        const chatBtn = document.getElementById('ff-chat-btn');
        const updateStatusBtn = document.getElementById('ff-update-status-btn');
        const statusModal = document.getElementById('ff-status-modal');
        const closeModal = document.getElementById('ff-close-modal');

        // Toggle secondary buttons visibility
        mainFab.addEventListener('click', () => {
            secondaryButtons.classList.toggle('ff-hidden');
            const secondaryBtns = document.querySelectorAll('.ff-secondary');
            secondaryBtns.forEach(btn => {
                btn.style.display = btn.style.display === 'block' ? 'none' : 'block';
            });
        });

        // Redirect to chat page
        chatBtn.addEventListener('click', () => {
            window.location.href = '#';
        });

        // Open the status modal
        updateStatusBtn.addEventListener('click', () => {
            statusModal.style.display = 'block';
        });

        // Close the modal
        closeModal.addEventListener('click', () => {
            statusModal.style.display = 'none';
        });

        // Close the modal when clicking outside of it
        window.addEventListener('click', (event) => {
            if (event.target === statusModal) {
                statusModal.style.display = 'none';
            }
        });

    });

    // Sample chat data

</script>

<!-- Ion Icons Js -->
<script
    type="module"
    src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"
></script>
<script
    nomodule
    src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"
></script>

<!-- JS -->
<script src="{{asset('frontend/js/Dashboard.js')}}"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}";
    switch (type) {
        case 'info':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #00b09b, #96c93d)"}
            }).showToast();
            break;

        case 'success':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #00b09b, #96c93d)"}
            }).showToast();
            break;

        case 'warning':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #00b09b, #96c93d)"}
            }).showToast();
            break;

        case 'error':
            Toastify({
                text: "{{ Session::get('message') }}", duration: 3000,
                style: {background: "linear-gradient(to right, #ff0000, #ff0000)"}
            }).showToast();
            break;
    }

    // Unset the session
    {{ Session::forget('message') }}
    {{ Session::forget('alert-type') }}
    @endif
</script>
</body>
</html>
