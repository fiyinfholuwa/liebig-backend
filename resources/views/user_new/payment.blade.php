



@extends('user_new.app')

@section('title', 'Transaktionen')
@section('page', 'Transaktionen')
@section('content')
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <table id="my-table" class="table dt-table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Betrag</th>
                            <th>Zahlungsart</th>
                            <th>Gateway</th>
                            <th>Status</th>
                            <th>Referenz-ID</th>
                            <th>Zahlungsdatum</th>
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
                                        <span class="badge bg-light-success">Abgeschlossen</span>
                                    @else
                                        <span class="badge bg-light-danger">Ausstehen</span>
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

                </div>
            </div>
        </section>



    </main><!-- End #main -->

@endsection
