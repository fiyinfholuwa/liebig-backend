



@extends('user_new.app')

@section('title', 'Glücksrad')
@section('page', 'Glücksrads')
@section('content')
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div style="padding: 20px;" class="main_c mt-4">
                        <div class="wheel-container">
                            <div class="wheel" id="wheel">
                                @foreach($rewards as $index => $reward)
                                    <div class="sector" style="transform: rotate({{ $index * 45 }}deg) translateY(-50%);">
                                        <div class="reward-image">
                                            <img src="{{ asset($reward['image']) }}" alt="{{ $reward['name'] }}">
                                        </div>
                                        <div class="reward-name">{{ $reward['name'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Spin Button with Spinner -->
                        <button class="btn btn-dark" id="spinButton" onclick="spinWheel()">
                            <i class="fa fa-spin fa-spinner" id="spinSpinner" style="display: none;"></i>

                            Glücksrad drehen
                        </button>

                        <p id="result"></p>

                        <!-- Claim Button with Spinner -->
                        <button id="claimButton" class="btn btn-success" disabled onclick="claimReward()">
                            <i class="fa fa-spin fa-spinner" id="claimSpinner" style="display: none;"></i>
                            Belohnung einlösen
                        </button>

                        <button class="btn btn-dark" id="moveButton" disabled onclick="moveReward()">
                            <i class="fa fa-spin fa-spinner" id="moveSpinner" style="display: none;"></i>
                            Zum Inventar verschieben
                        </button>


                        <script>
                            // Global variable to hold the rewards
                            const rewards = @json($rewards); // Pass rewards data from Laravel to JavaScript
                            let selectedReward = null; // Initialize selectedReward

                            // Check if rewards is an array
                            if (!Array.isArray(rewards)) {
                                console.error('Rewards is not an array:', rewards);
                            }

                            // Define getReward function globally
                            function getReward() {
                                let totalChance = 0;
                                rewards.forEach(r => totalChance += r.chance); // Calculate total chance

                                let random = Math.random() * totalChance; // Generate a random number
                                let sum = 0;

                                // Find the reward based on the random chance
                                for (let reward of rewards) {
                                    sum += reward.chance;
                                    if (random <= sum) {
                                        return reward; // Return the selected reward
                                    }
                                }
                            }

                            function rotateWheel(degree) {
                                const wheel = document.getElementById("wheel");
                                wheel.style.transform = `rotate(${degree}deg)`;
                            }

                    {{--        async function spinWheel() {--}}
                    {{--            const spinButton = document.getElementById("spinButton");--}}
                    {{--            const spinSpinner = document.getElementById("spinSpinner");--}}
                    {{--            const claimButton = document.getElementById("claimButton");--}}
                    {{--            const moveButton = document.getElementById("moveButton");--}}
                    {{--            const resultElement = document.getElementById("result");--}}

                    {{--            spinButton.disabled = true;--}}
                    {{--            claimButton.disabled = true;--}}
                    {{--            moveButton.disabled = true;--}}
                    {{--            resultElement.textContent = "";--}}
                    {{--            spinSpinner.style.display = "inline"; // Show spinner inside spin button--}}

                    {{--            try {--}}
                    {{--                // Send request to Laravel to validate spinning--}}
                    {{--                const response = await fetch('/spin/validate', {--}}
                    {{--                    method: 'POST',--}}
                    {{--                    headers: {--}}
                    {{--                        'Content-Type': 'application/json',--}}
                    {{--                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Use the Laravel blade directive--}}
                    {{--                    }--}}
                    {{--                });--}}

                    {{--                const result = await response.json();--}}

                    {{--                if (result.success === true) {--}}
                    {{--                    // Spin the wheel if successful--}}
                    {{--                    const reward = getReward(); // Call getReward--}}
                    {{--                    selectedReward = reward;--}}

                    {{--                    const rotationDegrees = Math.floor(Math.random() * 360) + 720; // Random rotation--}}
                    {{--                    rotateWheel(rotationDegrees);--}}

                    {{--                    setTimeout(() => {--}}
                    {{--                        resultElement.innerHTML = `--}}
                    {{--    <img style="height: 100px; width: 100px; border-radius: 25%;" src="{{ asset('${reward.image}') }}" alt="${reward.name}" width="100">--}}
                    {{--    <p>You won: ${reward.name} ${reward.points ? `(${reward.points} points)` : ''}</p>--}}
                    {{--`;--}}
                    {{--                        claimButton.disabled = false;--}}
                    {{--                        moveButton.disabled = false;--}}
                    {{--                        spinButton.disabled = false;--}}
                    {{--                    }, 5000); // Simulate the wheel spinning for 5 seconds--}}
                    {{--                } else {--}}
                    {{--                    alert(result.message || 'Failed to spin.');--}}
                    {{--                    spinButton.disabled = false;--}}
                    {{--                }--}}
                    {{--            } catch (error) {--}}
                    {{--                alert(error.message || 'Something went wrong.');--}}
                    {{--                spinButton.disabled = false;--}}
                    {{--            } finally {--}}
                    {{--                spinSpinner.style.display = "none"; // Hide spinner after processing--}}
                    {{--            }--}}
                    {{--        }--}}

                    async function spinWheel() {
                        const spinButton = document.getElementById("spinButton");
                        const spinSpinner = document.getElementById("spinSpinner");
                        const claimButton = document.getElementById("claimButton");
                        const moveButton = document.getElementById("moveButton");
                        const resultElement = document.getElementById("result");

                        spinButton.disabled = true;
                        claimButton.disabled = true;
                        moveButton.disabled = true;
                        resultElement.textContent = "";
                        spinSpinner.style.display = "inline"; // Show spinner inside spin button

                        try {
                            // Send request to Laravel to validate spinning
                            const response = await fetch('/spin/validate', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Use the Laravel blade directive
                                }
                            });

                            const result = await response.json();

                            if (result.success === true) {
                                // Spin the wheel if successful
                                const reward = getReward(); // Call getReward
                                selectedReward = reward;

                                const rotationDegrees = Math.floor(Math.random() * 360) + 720; // Random rotation
                                rotateWheel(rotationDegrees);

                                setTimeout(async () => {
                                    resultElement.innerHTML = `
                    <img style="height: 100px; width: 100px; border-radius: 25%;" src="{{ asset('${reward.image}') }}" alt="${reward.name}" width="100">
                    <p>You won: ${reward.name} ${reward.points ? `(${reward.points} points)` : ''}</p>
                `;
                                    claimButton.disabled = false;
                                    moveButton.disabled = false;
                                    spinButton.disabled = false;

                                    // Automatically move the reward after spinning
                                    await moveReward(); // Call the moveReward function
                                }, 5000); // Simulate the wheel spinning for 5 seconds
                            } else {
                                alert(result.message || 'Failed to spin.');
                                spinButton.disabled = false;
                            }
                        } catch (error) {
                            alert(error.message || 'Something went wrong.');
                            spinButton.disabled = false;
                        } finally {
                            spinSpinner.style.display = "none"; // Hide spinner after processing
                        }
                    }


                            async function claimReward() {
                                const claimButton = document.getElementById("claimButton");
                                const claimSpinner = document.getElementById("claimSpinner");

                                if (selectedReward) {
                                    claimButton.disabled = true;
                                    claimSpinner.style.display = "inline"; // Show spinner inside claim button

                                    try {
                                        // Send request to Laravel to claim the reward
                                        const response = await fetch('/claim/reward', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Use the Laravel blade directive
                                            },
                                            body: JSON.stringify({
                                                reward: selectedReward
                                            })
                                        });

                                        const result = await response.json();

                                        if (result.success === true) {
                                            alert(`Congratulations! You've claimed your reward: ${selectedReward.name}`);
                                            selectedReward = null;
                                            claimButton.disabled = true;
                                            location.reload();
                                        } else {
                                            alert(result.message || 'Error claiming the reward.');
                                            location.reload();
                                        }
                                    } catch (error) {
                                        alert(error.message || 'Something went wrong while claiming the reward.');
                                        location.reload();
                                    } finally {
                                        claimSpinner.style.display = "none"; // Hide spinner after processing
                                    }
                                }
                            }
                            async function moveReward() {
                                const claimButton = document.getElementById("moveButton");
                                const claimSpinner = document.getElementById("moveSpinner");

                                if (selectedReward) {
                                    claimButton.disabled = true;
                                    claimSpinner.style.display = "inline"; // Show spinner inside claim button

                                    try {
                                        // Send request to Laravel to claim the reward
                                        const response = await fetch('/move/reward', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Use the Laravel blade directive
                                            },
                                            body: JSON.stringify({
                                                reward: selectedReward
                                            })
                                        });

                                        const result = await response.json();

                                        if (result.success === true) {
                                            alert(`Congratulations! You've move your reward: ${selectedReward.name} to Inventory`);
                                            selectedReward = null;
                                            claimButton.disabled = true;
                                            location.reload();
                                        } else {
                                            alert(result.message || 'Error moving the reward.');
                                            location.reload();
                                        }
                                    } catch (error) {
                                        alert(error.message || 'Something went wrong while moving the reward.');
                                        location.reload();
                                    } finally {
                                        claimSpinner.style.display = "none";
                                    }
                                }
                            }
                        </script>


                    </div>
                    <style>

                        .wheel-container {
                            position: relative;
                            width: 300px;
                            height: 300px;
                            border-radius: 50%;
                            border: 5px solid #333;
                            overflow: hidden;
                            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
                        }

                        .wheel {
                            position: absolute;
                            width: 100%;
                            height: 100%;
                            transition: transform 5s ease-out;
                            transform: rotate(0deg);
                        }

                        .sector {
                            position: absolute;
                            width: 50%;
                            height: 50%;
                            background: linear-gradient(45deg, #4C2835, #8B4D5C, #D99FA6);
                            border: 1px solid #fff;
                            transform-origin: 100% 100%;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            text-align: center;
                            /*clip-path: polygon(100% 0, 50% 100%, 0 0);*/
                        }

                        .reward-image img {
                            width: 80px;
                            height: 80px;
                            border-radius: 50%;
                            margin-bottom: 10px;
                        }

                        .reward-name {
                            font-size: 10px;
                            font-weight: bold;
                            color: #ffffff;
                            padding: 15px;
                        }


                        #spinButton, #claimButton, #moveButton {
                            margin: 20px;
                            padding: 10px 20px;
                            font-size: 16px;
                            cursor: pointer;
                        }

                        #claimButton[disabled], #moveButton[disabled] {
                            background-color: #ccc;
                            cursor: not-allowed;
                        }

                        #result {
                            font-size: 18px;
                            font-weight: bold;
                            color: #28a745;
                            margin-top: 10px;
                        }

                        #result img {
                            margin-top: 10px;
                        }

                    </style>
                    <script>
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                    </script>
                </div>
            </div>
        </section>



    </main><!-- End #main -->
    <style>
        .card-body {
            max-height: 500px;
            overflow-y: auto;
        }
        .message-out, .message-in {
            margin-bottom: 10px;
        }
        .message-out .msg-content {
            background-color: #007bff;
            color: white;
            border-radius: 10px;
        }
        .message-in .msg-content {
            background-color: #f1f1f1;
            border-radius: 10px;
        }
        .chat-msg {
            padding: 5px;
        }
        .card-footer {
            background-color: #f8f9fa;
        }
        /* Fancy File Upload */
        .fancy-file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .fancy-file-upload input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            cursor: pointer;
            height: 100%;
            width: 100%;
        }
        .fancy-upload-btn {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            display: inline-block;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .fancy-upload-btn:hover {
            background-color: #0056b3;
        }
        .image-preview {
            margin-top: 10px;
            max-width: 200px;
            max-height: 200px;
            display: none;
        }
    </style>
    <script>
        // Function to preview the image before upload
        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        }
    </script>

@endsection
