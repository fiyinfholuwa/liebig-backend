
@extends('admin.app')

@section('title', 'Manage Gateway')
@section('page', 'Manage Gateway')

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing card" style="padding: 30px;">

                    <div class="widget-content widget-content-area br-6">
                        <div style="margin-bottom: 30px; margin-top: 20px;" class="">
                            {{--                            <a  data-bs-toggle="modal" data-bs-target="#add_kyc" class="btn btn-primary text-white"> <i class="fa fa-plus"></i> Add Gateway</a>--}}
                            <div class="modal fade" id="add_kyc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form method="post" action="{{route('admin.gateway.add')}}">
                                    @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Gateway</h5>

                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Gateway Name</label>
                                                    <input name="name" required class="form-control" type="text" placeholder="Gateway Name">
                                                </div>

                                                <div class="form-group">
                                                    <label>Secret Key</label>
                                                    <input name="secret_key" required class="form-control" type="text" placeholder="Gateway Secret Key">
                                                </div>


                                                <div class="form-group">
                                                    <label>Public Key</label>
                                                    <input name="public_key" required class="form-control" type="text" placeholder="Gateway Public Key">
                                                </div>


                                                <div class="form-group">
                                                    <label>Gateway Status</label>
                                                    <select required name="status" class="form-control">
                                                        <option value="">Select Option</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                                                <button type="submit" class="btn btn-primary">Save Gateway</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>



                        </div>
                        {{--                        <h5>All Gateways</h5>--}}
                        <table id="my-table" class="table dt-table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="no-content">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>

                            @foreach($gateways as $gateway)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$gateway->name}}</td>
                                    <td>
                                        @if($gateway->status == 1)
                                            <span class="badge bg-light-success">Active</span>
                                        @else
                                            <span class="badge bg-light-warning">InActive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit_{{$gateway->id}}" ><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>

                                @include('admin.modals.gateway')
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </div>

@endsection
