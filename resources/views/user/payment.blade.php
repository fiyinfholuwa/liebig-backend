
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
            <h3>Order History</h3>
        </div>
        <div class="d_title">
            <div class="widget-content widget-content-area br-6">
                {{--                        <h6></h6>--}}

                <table id="my-table" class="table dt-table-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Payment Type</th>
                        <th>Gateway</th>
                        <th>Status</th>
                        <th>ReferenceId</th>
                        <th>Paid Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{($payment->amount)}}</td>
                            <td>{{$payment->payment_type}}</td>
                            <td>{{$payment->gateway}}</td>
                            <td>
                                @if($payment->status =='paid')
                                    <span class="btn btn-success">Paid</span>
                                @else
                                    <span class="btn btn-danger">Pending</span>
                                @endif
                            </td>
                            <td>{{$payment->referenceId}}</td>
                            <td>
                                @php
                                    $updatedAt = $payment->updated_at;
                                    $format = 'Y-m-d H:i:s';
                                    $dateTime = \Carbon\Carbon::createFromFormat($format, $updatedAt)->format('d-m-Y h:i A');
                                @endphp
                                {{ $dateTime }}
                            </td>
                        </tr>
                    @endforeach
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
                </script>
            </div>
        </div>
    </div>

@endsection
