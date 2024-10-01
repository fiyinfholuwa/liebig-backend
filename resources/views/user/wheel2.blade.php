

@extends('user.app')

@section('content')
    <div class="dashboard-container">
        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- ======Topbar======= -->
            <div class="topbar d-flex justify-content-between align-items-center bg-light p-3 shadow-lg rounded">
                <!-- Status Update Section -->

                <!-- Notification and User Profile -->
                <div class="d-flex align-items-center">
                    <div class="notification icon me-4">
                        <ion-icon name="notifications-outline" style="font-size: 1.5rem;"></ion-icon>
                    </div>

                    <div class="user d-flex align-items-center">
                        <img src="https://raw.githubusercontent.com/programmercloud/nft-dashboard/main/img/user.png" alt="User" class="rounded-circle me-3 shadow-sm" style="width: 40px; height: 40px;" />
                        <p class="mb-0 me-2 d-none d-md-block fw-semibold text-dark">{{Auth::user()->name}}</p>
                        <ion-icon name="chevron-down-outline" style="font-size: 1.5rem;"></ion-icon>
                    </div>
                </div>
            </div>
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

                <button class="btn btn-dark" id="spinButton">Spin (100 Coins)</button>
                <p id="result"></p>
                <button id="claimButton" disabled>Claim Reward</button>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const spinButton = document.getElementById("spinButton");
                        const claimButton = document.getElementById("claimButton");
                        const resultElement = document.getElementById("result");
                        const wheel = document.getElementById("wheel");

                        const rewards = @json($rewards);
                        let selectedReward = null;

                        function getReward() {
                            const totalChance = 100;
                            let random = Math.random() * totalChance;
                            let sum = 0;

                            for (let reward of rewards) {
                                sum += reward.chance;
                                if (random <= sum) {
                                    return reward;
                                }
                            }
                        }

                        function rotateWheel(degree) {
                            wheel.style.transform = `rotate(${degree}deg)`;
                        }

                        spinButton.addEventListener("click", function () {
                            spinButton.disabled = true;
                            claimButton.disabled = true;
                            resultElement.textContent = "";

                            const reward = getReward();
                            selectedReward = reward.name;

                            const rotationDegrees = Math.floor(Math.random() * 360) + 720;
                            rotateWheel(rotationDegrees);

                            setTimeout(() => {
                                resultElement.innerHTML = `
                    <img style="height: 100px; width: 100px; border-radius: 25%;" src="{{ asset('${reward.image}') }}" alt="${reward.name}" width="100">
                    <p>You won: ${reward.name} ${reward.points ? `(${reward.points} points)` : ''}</p>
                `;
                                claimButton.disabled = false;
                                spinButton.disabled = false;
                            }, 5000);
                        });

                        claimButton.addEventListener("click", function () {
                            if (selectedReward) {
                                alert(`Congratulations! You've claimed your reward: ${selectedReward}`);
                                selectedReward = null;
                                claimButton.disabled = true;
                            }
                        });
                    });
                </script>
                <div class="top_models mt-5">
                </div>
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
        background-color: #4C2835;
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


    #spinButton, #claimButton {
        margin: 20px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    #claimButton[disabled] {
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
            @endsection


