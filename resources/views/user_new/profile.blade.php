


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

                <div class="col-lg-5">

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

                <div class="col-lg-7">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing card" style="padding: 30px;">

                        <div class="widget-content widget-content-area br-6">
                            <h3>Update Profile</h3>

                            <div class="row">
                                <div class="col-lg-12">
                                    {{--                                <h5 style="margin-bottom: 30px;">Add User</h5>--}}
                                    <form action="{{route('user.user.update', $user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-4">
                                            <div class="col-lg-12 mt-3">
                                                <label>Full Name</label>
                                                <input type="text" value="{{$user->name}}" class="form-control" name="name" placeholder="Enter Full Name">
                                                @error('name')
                                                <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>Email</label>
                                                <input readonly type="email" value="{{$user->email}}" class="form-control" name="email" placeholder="Enter Email">
                                                @error('email')
                                                <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label>Username</label>
                                                <input type="text" value="{{$user->username}}" class="form-control" name="username" placeholder="Enter Username">
                                                @error('username')
                                                <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                                @enderror
                                            </div>


                                            <div class="col-lg-12 mt-3">
                                                <label>Interested In</label>
                                                <select name="interested" class="form-control">
                                                    <option value=""  >Select Option</option>
                                                    <option value="women" {{strtolower($user->interested_in) == 'women' ? 'selected' : ''}} >Women</option>
                                                    <option value="men" {{strtolower($user->interested_in) == 'men' ? 'selected' : ''}} >Men</option>
                                                </select>
                                                @error('interested')
                                                <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit"  class="btn btn-primary">Update Account</button>
                                    </form>






                                </div>

                                    <div class="row">
                                        <h3 style="margin-top: 20px;">Update  Information</h3>
                                        <div class="col-lg-12">
                                            <form action="{{ route('update.model.user') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-4">
                                                    <!-- Profile Image -->
                                                    <div class="col-lg-6 mt-3">
                                                        <label>Profile Image</label>
                                                        <input type="file" class="form-control" name="profile_image">
                                                        @error('profile_image')
                                                        <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                        @enderror
                                                        <div class="col-lg-9 col-md-8"><img style="height: 60px; width: 60px;" src="{{asset($user->profile_image)}}" alt="" class="profile-img"></div>
                                                    </div>

                                                    <!-- Age -->
                                                    <div class="col-lg-6 mt-3">
                                                        <label>Age</label>
                                                        <input type="number" class="form-control" name="age" placeholder="Enter Age" value="{{ old('age', $user->age) }}">
                                                        @error('age')
                                                        <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- About Me -->
                                                    <div class="col-lg-12 mt-3">
                                                        <label>About Me</label>
                                                        <textarea class="form-control" name="about_me" placeholder="Enter About Me">{{ old('about_me', $user->about_me) }}</textarea>
                                                        @error('about_me')
                                                        <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- My Interests -->
                                                    <div class="col-lg-6 mt-3">
                                                        <label>My Interests</label>
                                                        <textarea class="form-control" name="my_interest" placeholder="Enter Interests">{{ old('my_interest', $user->my_interest) }}</textarea>
                                                        @error('my_interest')
                                                        <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Address -->
                                                    <div class="col-lg-6 mt-3">
                                                        <label>Address</label>
                                                        <textarea class="form-control" name="address" placeholder="Enter Address">{{ old('address', $user->address) }}</textarea>
                                                        @error('address')
                                                        <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Sexuality -->
                                                    <div class="col-lg-4 mt-3">
                                                        <label>Sexuality</label>
                                                        <input type="text" class="form-control" name="sexuality" placeholder="Enter Sexuality" value="{{ old('sexuality', $user->sexuality) }}">
                                                        @error('sexuality')
                                                        <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Eye Color -->
                                                    <div class="col-lg-4 mt-3">
                                                        <label>Eye Color</label>
                                                        <input type="text" class="form-control" name="eye_color" placeholder="Enter Eye Color" value="{{ old('eye_color', $user->eye_color) }}">
                                                        @error('eye_color')
                                                        <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Hair -->
                                                    <div class="col-lg-4 mt-3">
                                                        <label>Hair</label>
                                                        <input type="text" class="form-control" name="hair" placeholder="Enter Hair" value="{{ old('hair', $user->hair) }}">
                                                        @error('hair')
                                                        <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Body Type -->
                                                    <div class="col-lg-4 mt-3">
                                                        <label>Body Type</label>
                                                        <input type="text" class="form-control" name="body_type" placeholder="Enter Body Type" value="{{ old('body_type', $user->body_type) }}">
                                                        @error('body_type')
                                                        <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Height -->
                                                    <div class="col-lg-4 mt-3">
                                                        <label>Height</label>
                                                        <input type="text" class="form-control" name="height" placeholder="Enter Height" value="{{ old('height', $user->height) }}">
                                                        @error('height')
                                                        <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Ethnicity -->
                                                    <div class="col-lg-4 mt-3">
                                                        <label>Ethnicity</label>
                                                        <input type="text" class="form-control" name="ethnicity" placeholder="Enter Ethnicity" value="{{ old('ethnicity', $user->ethnicity) }}">
                                                        @error('ethnicity')
                                                        <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Hidden User ID -->
                                                    <input type="hidden" class="form-control" name="userid" value="{{ $user->id}}">

                                                    <!-- Other Images -->


                                                </div>

                                                <button type="submit" class="btn btn-primary">Update Model Details</button>
                                            </form>
                                        </div>
                                    </div>


                                <h2 class="mt-3">Change Password</h2>
                                <section id="multiple-column-form">
                                    <div class="card-body">
                                        <form action="{{route('user.password.change')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mt-2">
                                                <label for="email2">Old Password</label>
                                                <input type="password" class="form-control" id="email2" required name="old_password" placeholder="Enter Old Password">
                                                <small style="color:red; font-weight:500">
                                                    @error('old_password')
                                                    {{$message}}
                                                    @enderror
                                                </small>

                                            </div>

                                            <div class="form-group mt-2">
                                                <label for="email2">New Password</label>
                                                <input type="password" class="form-control" id="email2" required name="new_password" placeholder="Enter New Password">
                                                <small style="color:red; font-weight:500">
                                                    @error('new_password')
                                                    {{$message}}
                                                    @enderror
                                                </small>

                                            </div>

                                            <div class="form-group mt-2">
                                                <label for="email2">New Password</label>
                                                <input type="password" class="form-control" id="email2" required name="new_password_confirmation" placeholder="Enter New Password  Confirmation">
                                                <small style="color:red; font-weight:500">
                                                    @error('new_password_confirmation')
                                                    {{$message}}
                                                    @enderror
                                                </small>

                                            </div>
                                            <div class="card-action mt-4">
                                                <button class="btn btn-primary">Change Password</button>

                                            </div>
                                        </form>
                                    </div>

                                </section>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>



    </main><!-- End #main -->

@endsection
