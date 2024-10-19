


@extends('user_new.app')

@section('title', 'Manage Inventory')
@section('page', 'Manage Inventory')
@section('content')

    <main id="main" class="main">

        <section class="section">
            <div class="row">

                <div style="margin-bottom: 30px; margin-top: 20px;" class="">
                    <a  data-bs-toggle="modal" data-bs-target="#add_category" class="btn btn-primary text-white"> <i class="fa fa-plus"></i>Buy Gift</a>
                    <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="post" action="{{route('user.buy.gift')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Buy Gift</h5>

                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label>Select Gifts</label>
                                            <select required name="gift_id" class="form-control">
                                                <option value="">Select Option</option>
                                                @foreach($gifts as $gift)
                                                    <option value="{{$gift->id}}">{{$gift->name}} | Equivalent Coins {{$gift->points}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                                        <button type="submit" class="btn btn-primary">Proceed</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>



                </div>

                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            {{--              <h5 class="card-title"></h5>--}}


                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table id="my-table" class="table datatable">
                                    <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Reward Name
                                        </th>
                                        <th>Reward Point</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    <?php $i = 1; ?>
                                    @foreach($payments as $reward)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$reward->reward_name}}</td>
                                            <td>{{$reward->reward_amount}}</td>
                                            <td>

                                                <a  class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#move_wallet-btn_{{$reward->id}}">
                                                    Move to Wallet
                                                </a>
                                            </td>
                                        </tr>

                                        @include('user_new.modals.inventory')
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>



    </main><!-- End #main -->

@endsection
