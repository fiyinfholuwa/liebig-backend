@extends('admin.app')

@section('title', 'Manage Plans')
@section('page', 'Manage Plans')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing card" style="padding: 30px;">

                    <div class="widget-content widget-content-area br-6">
                        <div style="margin-bottom: 30px; margin-top: 20px;" class="">
                            <a  data-bs-toggle="modal" data-bs-target="#add_category" class="btn btn-primary text-white"> <i class="fa fa-plus"></i> Add Coin Plan</a>
                            <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form method="post" action="{{route('admin.add.plan')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Coin Plan</h5>

                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Plan Name</label>
                                                    <input name="name" required class="form-control" type="text" placeholder="Plan Name">
                                                </div>

                                                <div class="form-group">
                                                    <label>Plan Image</label>
                                                    <input name="image" required class="form-control" type="file" placeholder="Plan Image">

                                                </div>


                                                <div class="form-group">
                                                    <label>Plan Amount</label>
                                                    <input name="amount" required class="form-control" type="number" step="0.01" placeholder="Plan Amount">
                                                </div>


                                                <div class="form-group">
                                                    <label>Equivalent Coins</label>
                                                    <input name="coins" required class="form-control" type="number" placeholder="Equivalent Coins">
                                                </div>


                                                <div class="form-group">
                                                    <label>Plan Status</label>
                                                    <select required name="status" class="form-control">
                                                        <option value="">Select Option</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                                                <button type="submit" class="btn btn-primary">Save Plan</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>



                        </div>
                        {{--                        <h5>Post Categories</h5>--}}
                        <div class="table-responsive">
                            <table id="my-table"  class="table dt-table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Equivalent Coins</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="no-content">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>

                                @foreach($plans as $plan)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$plan->name}}</td>
                                        <td>{{$plan->amount}}</td>
                                        <td>{{$plan->coins}}</td>
                                        <td><img height="100px" width="100px" src="{{asset($plan->image)}}" alt="image"></td>
                                        <td>
                                            @if($plan->status == 1)
                                                <span class="badge bg-light-success">Active</span>
                                            @else
                                                <span class="badge bg-light-warning">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit_{{$plan->id}}" ><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_{{$plan->id}}" ><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    @include('admin.modals.plan')
                                @endforeach

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection
