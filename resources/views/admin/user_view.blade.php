@extends('admin.app')

@section('title', 'Add User')
@section('page', 'Add User')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing card" style="padding: 30px;">

                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-lg-12">
                                {{--                                <h5 style="margin-bottom: 30px;">Add User</h5>--}}
                                <form action="{{route('admin.add.user.save')}}" method="post">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-lg-6 mt-3">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Full Name">
                                            @error('name')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mt-3">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                                            @error('email')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mt-3">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Enter Username">
                                            @error('username')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mt-3">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                            @error('password')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mt-3">
                                            <label>User Type</label>
                                            <select name="user_type" class="form-control">
                                                <option value="" >Select Option</option>
                                                <option value="1" >User</option>
                                                <option value="2"  >Model</option>
                                            </select>
                                            @error('user_type')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mt-3">
                                            <label>Interested In</label>
                                            <select name="interested" class="form-control">
                                                <option value="" >Select Option</option>
                                                <option value="women" >Women</option>
                                                <option value="men"  >Men</option>
                                            </select>
                                            @error('interested')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit"  class="btn btn-primary">Add User</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection
