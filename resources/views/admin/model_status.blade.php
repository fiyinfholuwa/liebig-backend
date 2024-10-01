@extends('admin.app')

@section('title', 'Manage Model Statuses')
@section('page', 'Manage Model Statuses')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing card" style="padding: 30px;">

                    <div class="widget-content widget-content-area br-6">
                        <div style="margin-bottom: 30px; margin-top: 20px;" class="">
                            <a  data-bs-toggle="modal" data-bs-target="#add_category" class="btn btn-primary text-white"> <i class="fa fa-plus"></i> Add Model Status</a>
                            <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form method="post" action="{{route('admin.status.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Status</h5>

                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Select Model</label>
                                                    <select required name="model_id" class="form-control">
                                                        <option value="">Select Model</option>
                                                        @foreach($models as $model)
                                                            <option value="{{$model->id}}">{{$model->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Status Image</label>
                                                    <input name="image" required class="form-control" type="file" placeholder="Item Image">

                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                                                <button type="submit" class="btn btn-primary">Save Status</button>
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
                                    <th>Image</th>
                                    <th>TimeStamp</th>
                                    <th class="no-content">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>

                                @foreach($items as $Item)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{optional($Item->model_info)->name}}</td>
                                        <td><img height="100px" width="100px" src="{{asset($Item->image)}}" alt="image"></td>
                                        <td>{{ $Item->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_{{$Item->id}}" ><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @include('admin.modals.model_status')
                                @endforeach

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection
