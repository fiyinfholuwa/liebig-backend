@extends('admin.app')

@section('title', 'Manage Users')
@section('page', 'Manage Users')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <form style="margin-bottom: 20px;" method="post" action="{{route('admin.user.report')}}">
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

                        <div class="col-lg-2  mt-1">
                            <div class="" style="">
                                <select required class="form-control" name="user_type">
                                    <option value="">User Type</option>
                                    <option value="1">User</option>
                                    <option value="2">Model</option>
                                </select>
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
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Status</th>
                                <th class="no-content">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->user_type == 1)
                                            <span class="badge bg-light-success">User</span>
                                        @elseif($user->user_type ==2)
                                            <span class="badge bg-light-primary">Model</span>
                                        @else
                                            <span class="badge bg-light-warning">Admin</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->user_status == 1)
                                            <span class="badge bg-light-success">Active</span>
                                        @else
                                            <span class="badge bg-light-warning">Blocked</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" class="btn btn-secondary btn-sm" data-bs-target="#user_block_{{$user->id}}" ><i style="color:white;" class="fa fa-ban fa-1x"></i></a>
                                        <a href="#" data-bs-toggle="modal" class="btn btn-primary btn-sm" data-bs-target="#user_password_{{$user->id}}" ><i style="color:white;" class="fa fa-lock fa-1x"></i></a>

                                        <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-info btn-sm" ><i class="fa fa-edit"></i></a>

                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_{{$user->id}}" ><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @include('admin.modals.user')

                            @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </div>

@endsection
