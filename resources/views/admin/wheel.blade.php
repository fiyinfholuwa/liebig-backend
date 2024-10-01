@extends('admin.app')

@section('title', 'Manage Items')
@section('page', 'Manage Items')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing card" style="padding: 30px;">

                    <div class="widget-content widget-content-area br-6">
                        <div style="margin-bottom: 30px; margin-top: 20px;" class="">
                            <a  data-bs-toggle="modal" data-bs-target="#add_category" class="btn btn-primary text-white"> <i class="fa fa-plus"></i> Add  Wheel of Fortune Item</a>
                            <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form method="post" action="{{route('admin.add.item')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add  Wheel of Fortune Item</h5>

                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Item Name</label>
                                                    <input name="name" required class="form-control" type="text" placeholder="Item Name">
                                                </div>

                                                <div class="form-group">
                                                    <label>Item Image</label>
                                                    <input name="image" required class="form-control" type="file" placeholder="Item Image">

                                                </div>


                                                <div class="form-group">
                                                    <label>Item Points</label>
                                                    <input name="points" required class="form-control" type="number" placeholder="Item Points">
                                                </div>

                                                <div class="form-group">
                                                    <label>Item Chance</label>
                                                    <input name="chance" required class="form-control" type="number" placeholder="Item Chance">
                                                </div>


                                                <div class="form-group">
                                                    <label>Item Status</label>
                                                    <select required name="status" class="form-control">
                                                        <option value="">Select Option</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                                                <button type="submit" class="btn btn-primary">Save Item</button>
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
                                    <th>Points</th>
                                    <th>chances</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="no-content">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>

                                @foreach($items as $Item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$Item->name}}</td>
                                        <td>{{$Item->points}}</td>
                                        <td>{{$Item->chance}}</td>
                                        <td><img height="100px" width="100px" src="{{asset($Item->image)}}" alt="image"></td>
                                        <td>
                                            @if($Item->status == 1)
                                                <span class="badge bg-light-success">Active</span>
                                            @else
                                                <span class="badge bg-light-warning">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit_{{$Item->id}}" ><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_{{$Item->id}}" ><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @include('admin.modals.item')
                                @endforeach

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection
