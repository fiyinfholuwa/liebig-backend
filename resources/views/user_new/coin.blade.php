




@extends('user_new.app')

@section('title', 'Coins Kaufen')
@section('page', 'Coins Kaufen')
@section('content')

    <div class="coin_modal" id="paymentModal">
        <div class="coin_modal_dialog">
            <div class="coin_modal_header">
                <h5 class="coin_modal_title" id="coin_modalLabel">Bestätigen Sie Ihre Zahlung</h5>
                <button type="button" class="coin_modal_close" id="closeModal">&times;</button>
            </div>
            <div class="coin_modal_body">
                <form id="paymentForm" method="POST" action="{{route('user.buy.coin')}}">
                    @csrf
                    <input type="hidden" name="plan_id" id="plan_id">
                    <div class="form-group">
                        <label for="amount">Zu zahlender Betrag:</label>
                        <input type="text" class="form-control" name="amount" id="amount" readonly>
                    </div>
                    <div class="form-group">
                        <label for="payment_type">Wählen Sie die Zahlungsart:</label>
                        <select class="form-control" name="payment_type" id="payment_type" required>
                            <option value="">Wählen Sie das Gateway</option>

                            @foreach($payments as $payment)
                                <option value="{{ $payment->name }}">{{ ucfirst($payment->name) }}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="coin_modal_btn">Zahlung verarbeiten</button>
                </form>
            </div>
        </div>
    </div>

    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    @foreach($plans as $plan)
                        <div class="col-lg-6 col-sm-4 col-md-6 pricing-column-wrapper">
                            <div class="pricing-column">
                                <div class="pricing-price-row">
                                    <div class="pricing-price-wrapper">
                                        <img src="{{ asset($plan->image) }}" alt="{{ $plan->name }}" class="img-fluid rounded" style="height: 200px; width: 200px; border-radius: 30px;">
                                    </div>
                                </div>
                                <div class="pricing-row-title">
                                    <div class="pricing_row_title">{{ $plan->name }}</div>
                                    <div class="pricing_row_title">${{ $plan->amount }}</div>
                                </div>
                                <div class="pricing-footer">
                                    <div class="gem-button-container gem-button-position-center">
                                        <button class="btn btn-primary"
                                                data-id="{{ $plan->id }}"
                                                data-amount="{{ $plan->amount }}"
                                                onclick="openModal({{ $plan->id }}, '{{ $plan->amount }}')">
                                            Münze kaufen
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>



    </main><!-- End #main -->
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

        /* Custom Modal Styles */
        .coin_modal {
            display: none; /* Initially hidden */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            /*background-color: rgba(0, 0, 0, 0.5); !* Modal background *!*/
            justify-content: center;
            align-items: center;
        }
        .coin_modal_dialog {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            width: 100%;
            max-width: 500px;
            position: relative;
            top: 50px !important;
        }
        .coin_modal_header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }
        .coin_modal_title {
            font-size: 20px;
            font-weight: bold;
        }
        .coin_modal_close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #999;
        }
        .coin_modal_close:hover {
            color: #555;
        }
        .coin_modal_body {
            padding: 15px 0;
        }
        .coin_modal_btn {
            background-color: deeppink;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .coin_modal_btn:hover {
            background-color: #600f2d;
        }

        /* Plan Card Styles */
        .pricing-column-wrapper {
            margin-bottom: 30px;
            display: flex;
            /*justify-content: ;*/
        }

        .pricing-column {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            padding: 20px;
            max-width: 100%;
            overflow: hidden;
        }

        .pricing-column:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .pricing-price-wrapper img {
            border-radius: 15px;
            margin-bottom: 15px;
            max-width: 100%;
            height: auto;
        }

        .pricing-row-title {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .pricing-row-title .pricing_row_title {
            font-size: 16px;
            margin-bottom: 10px;
            color: #555;
        }

        .pricing-footer {
            margin-top: 20px;
        }

        .gem-button-container {
            text-align: center;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            padding: 10px 25px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 30px;
            transition: background-color 0.3s ease;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Responsive Styles */
        @media (max-width: 767px) {
            .pricing-column-wrapper {
                width: 100%;
            }
        }

    </style>
    <script>
        // Function to open modal
        function openModal(planId, amount) {
            // Set values in the modal form
            document.getElementById('plan_id').value = planId;
            document.getElementById('amount').value = amount;

            // Show modal
            document.getElementById('paymentModal').style.display = 'flex';
        }

        // Close the modal
        document.getElementById('closeModal').addEventListener('click', function () {
            document.getElementById('paymentModal').style.display = 'none';
        });

        // Also close the modal when clicking outside of the modal content
        window.onclick = function(event) {
            var modal = document.getElementById('paymentModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        };
    </script>

@endsection
