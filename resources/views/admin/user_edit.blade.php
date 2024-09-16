@extends('admin.app')

@section('title', 'Update Account')
@section('page', 'Update Account')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-8 col-lg-8 col-sm-12  layout-spacing card" style="padding: 30px;">

                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-lg-12">
                                {{--                                <h5 style="margin-bottom: 30px;">Add User</h5>--}}
                                <form action="{{route('admin.user.update', $user->id)}}" method="post" enctype="multipart/form-data">
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
                                            <input type="email" value="{{$user->email}}" class="form-control" name="email" placeholder="Enter Email">
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

                                        <div class="col-lg-6 mt-3">
                                            <label>User Type</label>
                                            <select name="user_type" class="form-control">
                                                <option value="" >Select Option</option>
                                                <option value="1" {{$user->user_type == 1 ? 'selected' : ''}} >User</option>
                                                <option value="2" {{$user->user_type == 2 ? 'selected' : ''}}  >Model</option>
                                            </select>
                                            @error('user_type')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mt-3">
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

                            @if($user->user_type == 2)
                                <div class="row">
                                    <h3 style="margin-top: 20px;">Update Model Information</h3>
                                    <div class="col-lg-12">
                                        <form action="{{ route('update.model.admin') }}" method="post" enctype="multipart/form-data">
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

                                                @php
                                                $images = json_decode($user->images,true);
                                                @endphp
                                                <div class="col-lg-12 mt-3">
                                                    <label>Other Images</label>

                                                    <div id="imageInputsContainer">
                                                        <!-- Display Previously Uploaded Images -->
                                                        @if (!empty($images))
                                                            @foreach ($images as $index => $image)
                                                                <div class="input-group mb-2 existing-image-group" id="existing-image-{{ $index }}">
                                                                    <img src="{{ asset($image) }}" alt="Image {{ $index }}" style="max-height: 100px; margin-right: 10px;">
                                                                    <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                                                    <button type="button" class="btn btn-danger removeExistingImageButton" data-index="{{ $index }}">Remove</button>
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                        <!-- The first input field for adding new images -->
                                                        <div class="input-group mb-2">
                                                            <input type="file" class="form-control" name="images[]">
                                                        </div>
                                                    </div>

                                                    <!-- Button to add more image upload inputs -->
                                                    <button type="button" class="btn btn-primary mt-2" id="addImageButton">Add Another Image</button>

                                                    <p id="error-message" style="color: red; font-size: 10px; font-weight: bolder; display: none;"></p>

                                                    @error('images.*')
                                                    <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <script>
                                                    const maxImages = 9;
                                                    let imageCount = {{ count($images) }}; // Start with the count of existing images

                                                    // Add new image input field
                                                    document.getElementById('addImageButton').addEventListener('click', function() {
                                                        if (imageCount < maxImages) {
                                                            const container = document.getElementById('imageInputsContainer');
                                                            const newInputGroup = document.createElement('div');
                                                            newInputGroup.className = 'input-group mb-2';

                                                            const newInput = document.createElement('input');
                                                            newInput.type = 'file';
                                                            newInput.className = 'form-control';
                                                            newInput.name = 'images[]';

                                                            const removeButton = document.createElement('button');
                                                            removeButton.type = 'button';
                                                            removeButton.className = 'btn btn-danger removeImageButton';
                                                            removeButton.innerText = 'Remove';

                                                            newInputGroup.appendChild(newInput);
                                                            newInputGroup.appendChild(removeButton);
                                                            container.appendChild(newInputGroup);

                                                            imageCount++;
                                                            document.getElementById('error-message').style.display = 'none';

                                                            // Add remove functionality to the new image input
                                                            removeButton.addEventListener('click', function() {
                                                                container.removeChild(newInputGroup);
                                                                imageCount--;
                                                            });
                                                        } else {
                                                            document.getElementById('error-message').innerText = 'You can add up to 9 images only.';
                                                            document.getElementById('error-message').style.display = 'block';
                                                        }
                                                    });

                                                    // Remove existing image
                                                    document.querySelectorAll('.removeExistingImageButton').forEach(function(button) {
                                                        button.addEventListener('click', function() {
                                                            const index = button.getAttribute('data-index');
                                                            const existingImageGroup = document.getElementById('existing-image-' + index);
                                                            existingImageGroup.remove(); // Remove the image from the DOM

                                                            // Optionally, append a hidden input to mark this image for deletion on the server side
                                                            const container = document.getElementById('imageInputsContainer');
                                                            const removeInput = document.createElement('input');
                                                            removeInput.type = 'hidden';
                                                            removeInput.name = 'removed_images[]';
                                                            removeInput.value = images[index];  // Reference the image using the JavaScript variable
                                                            container.appendChild(removeInput);

                                                            imageCount--;
                                                        });
                                                    });
                                                </script>

                                            </div>

                                            <button type="submit" class="btn btn-primary">Update Model Details</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection
