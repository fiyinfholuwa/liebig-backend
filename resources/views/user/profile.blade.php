
@extends('user.app')

<style>
    .d_title {
        padding-left: 50px;
    }
    .d_title h3 {
        font-weight: bolder;
    }
    .topbar {
        background-color: #4C2835;
        color: white;
        border-radius: 8px;
    }
    .topbar .user p {
        color: white;
    }


</style>

@section('content')
    <!-- Custom Modal (Initially Hidden) -->

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <div class="topbar d-flex justify-content-between align-items-center bg-light p-3 shadow-lg rounded">

        </div>
        <div class="dashboard-content">
            <h3>Inventory History</h3>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="d_title">
                    <div class="widget-content widget-content-area br-6">
                        {{--                        <h6></h6>--}}

                        <table id="my-table" class="table dt-table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Reward Name</th>
                                <th>Reward Points</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($payments as $reward)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{(optional($reward->reward_info)->name)}}</td>
                                    <td>{{(optional($reward->reward_info)->points)}}</td>
                                    <td><button class="move_wallet-btn" data-id="{{ $reward->id }}">Move to Wallet</button></td>
                                </tr>
                            @endforeach

                            <!-- Custom Confirmation Modal -->
                            <div id="move_wallet-modal" class="move_wallet-modal">
                                <div class="move_wallet-modal-content">
                                    <span class="move_wallet-close">&times;</span>
                                    <h5>Confirm Move to Wallet</h5>
                                    <p>Are you sure you want to move this reward to your wallet?</p>
                                    <form id="moveToWalletForm" method="POST" action="{{route('reward_to_wallet')}}">
                                        @csrf
                                        <input type="hidden" name="reward_id" id="reward_id">
                                        <input type="hidden" name="reward_amount" id="reward_amount">
                                        <button type="button" class="move_wallet-cancel-btn">No</button>
                                        <button type="submit" class="move_wallet-confirm-btn">Yes, Move to Wallet</button>
                                    </form>
                                </div>
                            </div>


                            </tbody>
                        </table>

                        <div id="pagination-controls">
                            <button id="prev" disabled>Previous</button>
                            <span id="page-info"></span>
                            <button id="next">Next</button>
                        </div>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                const rowsPerPage = 5; // Set number of rows per page
                                const rows = $('#my-table tbody tr');
                                const totalRows = rows.length;
                                const totalPages = Math.ceil(totalRows / rowsPerPage);
                                let currentPage = 1;

                                function displayPage(page) {
                                    rows.hide(); // Hide all rows
                                    const start = (page - 1) * rowsPerPage;
                                    const end = start + rowsPerPage;
                                    rows.slice(start, end).show(); // Show only the rows for the current page

                                    $('#page-info').text(`Page ${currentPage} of ${totalPages}`);
                                    $('#prev').prop('disabled', currentPage === 1);
                                    $('#next').prop('disabled', currentPage === totalPages);
                                }

                                $('#prev').click(function() {
                                    if (currentPage > 1) {
                                        currentPage--;
                                        displayPage(currentPage);
                                    }
                                });

                                $('#next').click(function() {
                                    if (currentPage < totalPages) {
                                        currentPage++;
                                        displayPage(currentPage);
                                    }
                                });

                                // Initial display
                                displayPage(currentPage);
                            });


                            document.addEventListener('DOMContentLoaded', function () {
                                // Get all buttons to trigger the modal
                                const moveButtons = document.querySelectorAll('.move_wallet-btn');
                                const modal = document.getElementById('move_wallet-modal');
                                const closeBtn = document.querySelector('.move_wallet-close');
                                const cancelBtn = document.querySelector('.move_wallet-cancel-btn');
                                const rewardInput = document.getElementById('reward_id');

                                // Loop through each button to add event listeners
                                moveButtons.forEach(button => {
                                    button.addEventListener('click', function () {
                                        const rewardId = this.getAttribute('data-id');
                                        rewardInput.value = rewardId; // Set reward ID in the form
                                        modal.style.display = 'block'; // Show the modal
                                    });
                                });

                                // Close the modal when the close button is clicked
                                closeBtn.addEventListener('click', function () {
                                    modal.style.display = 'none';
                                });

                                // Close the modal when the cancel button is clicked
                                cancelBtn.addEventListener('click', function () {
                                    modal.style.display = 'none';
                                });

                                // Close the modal if clicked outside of the modal content
                                window.addEventListener('click', function (event) {
                                    if (event.target == modal) {
                                        modal.style.display = 'none';
                                    }
                                });
                            });

                        </script>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <style>
        /* Modal background */
        .move_wallet-modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            background-color: rgba(0, 0, 0, 0.5); /* Black with opacity */
        }

        /* Modal content box */
        .move_wallet-modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        /* Close button */
        .move_wallet-close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            color: #aaa;
        }

        .move_wallet-close:hover {
            color: #000;
        }

        /* Buttons */
        .move_wallet-btn, .move_wallet-confirm-btn, .move_wallet-cancel-btn {
            padding: 10px 15px;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .move_wallet-btn {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .move_wallet-confirm-btn {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .move_wallet-cancel-btn {
            background-color: #6c757d;
            color: white;
            border: none;
        }

        /* Hover effect */
        .move_wallet-btn:hover, .move_wallet-confirm-btn:hover, .move_wallet-cancel-btn:hover {
            opacity: 0.8;
        }

    </style>
@endsection
