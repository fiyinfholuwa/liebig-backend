
@extends('admin.app')

@section('title', 'Payment History')
@section('page', 'Payment History')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <form style="margin-bottom: 20px;" method="post" action="{{route('admin.payment.report')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2  mt-1">
                            <div class="" style="">

                                <input name="date_from" class="form-control "  type="date"  placeholder="Start Date"  required/>

                            </div>
                        </div>
                        <div class="col-lg-2  mt-1">
                            <div class="" style="">

                                <input name="date_to" class="form-control "  type="date"  placeholder="End Date"   required/>

                            </div>
                        </div>

                        <div class="col-lg-4   mt-1" >
                            <button type="submit" class='btn btn-primary'>Export to CSV</button>
                        </div>
                    </div>
                </form>


                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing card" style="padding: 30px;">

                    <div class="widget-content widget-content-area br-6 table-responsive">
                        {{--                        <h6></h6>--}}

                        <table id="my-table" class="table dt-table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
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
                                    <td>{{$payment->user_email}}</td>
                                    <td>{{$payment->amount}}</td>
                                    <td>{{$payment->payment_type}}</td>
                                    <td>{{$payment->gateway}}</td>
                                    <td>
                                        @if($payment->status =='paid')
                                            <span class="badge bg-light-success">Paid</span>
                                        @else
                                            <span class="badge bg-light-primary">Pending</span>
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
                            @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </div>

@endsection
