@extends('admin.app')

@section('title', 'Complete Model Profile')
@section('page', 'Complete Model Profile')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-10 col-lg-10 col-sm-12  layout-spacing card" style="padding: 30px;">

                    <div class="widget-content widget-content-area br-6">
                        <div class="row">
                            <div class="col-lg-12">
                                {{--                                <h5 style="margin-bottom: 30px;">Add User</h5>--}}
                                <form action="{{ route('admin.model.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-4">
                                        <!-- Profile Image -->
                                        <div class="col-lg-6 mt-3">
                                            <label>Profile Image</label>
                                            <input type="file" class="form-control" name="profile_image">
                                            @error('profile_image')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Age -->
                                        <div class="col-lg-6 mt-3">
                                            <label>Age</label>
                                            <input type="number" class="form-control" name="age" placeholder="Enter Age" value="{{ old('age') }}">
                                            @error('age')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- About Me -->
                                        <div class="col-lg-12 mt-3">
                                            <label>About Me</label>
                                            <textarea class="form-control" name="about_me" placeholder="Enter About Me">{{ old('about_me') }}</textarea>
                                            @error('about_me')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- My Interests -->
                                        <div class="col-lg-6 mt-3">
                                            <label>My Interests</label>
                                            <textarea class="form-control" name="my_interest" placeholder="Enter Interests">{{ old('my_interest') }}</textarea>
                                            @error('my_interest')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Address -->
                                        <div class="col-lg-6 mt-3">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address" placeholder="Enter Address">{{ old('address') }}</textarea>
                                            @error('address')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Sexuality -->
                                        <div class="col-lg-4 mt-3">
                                            <label>Sexuality</label>
                                            <input type="text" class="form-control" name="sexuality" placeholder="Enter Sexuality" value="{{ old('sexuality') }}">
                                            @error('sexuality')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Eye Color -->
                                        <div class="col-lg-4 mt-3">
                                            <label>Eye Color</label>
                                            <input type="text" class="form-control" name="eye_color" placeholder="Enter Eye Color" value="{{ old('eye_color') }}">
                                            @error('eye_color')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Hair -->
                                        <div class="col-lg-4 mt-3">
                                            <label>Hair</label>
                                            <input type="text" class="form-control" name="hair" placeholder="Enter Hair" value="{{ old('hair') }}">
                                            @error('hair')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Body Type -->
                                        <div class="col-lg-4 mt-3">
                                            <label>Body Type</label>
                                            <input type="text" class="form-control" name="body_type" placeholder="Enter Body Type" value="{{ old('body_type') }}">
                                            @error('body_type')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Height -->
                                        <div class="col-lg-4 mt-3">
                                            <label>Height</label>
                                            <input type="text" class="form-control" name="height" placeholder="Enter Height" value="{{ old('height') }}">
                                            @error('height')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Ethnicity -->
                                        <div class="col-lg-4 mt-3">
                                            <label>Ethnicity</label>
                                            <input type="text" class="form-control" name="ethnicity" placeholder="Enter Ethnicity" value="{{ old('ethnicity') }}">
                                            @error('ethnicity')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Hidden User ID -->
                                        <input type="hidden" class="form-control" name="userid" value="{{ Session::get('model_id') }}">

                                        <!-- Other Images -->
                                        <div class="col-lg-12 mt-3">
                                            <label>Other Images</label>
                                            <div id="imageInputsContainer">
                                                <!-- The first input field cannot be removed -->
                                                <div class="input-group mb-2">
                                                    <input type="file" class="form-control" name="images[]">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary mt-2" id="addImageButton">Add Another Image</button>
                                            <p id="error-message" style="color: red; font-size: 10px; font-weight: bolder; display: none;"></p>
                                            @error('images.*')
                                            <p style="color: red; font-size:10px; font-weight: bolder">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Add Another Image Script -->
                                        <script>
                                            const maxImages = 9;
                                            let imageCount = 1; // Start with one input field

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

                                                    removeButton.addEventListener('click', function() {
                                                        container.removeChild(newInputGroup);
                                                        imageCount--;
                                                    });
                                                } else {
                                                    document.getElementById('error-message').innerText = 'You can add up to 9 images only.';
                                                    document.getElementById('error-message').style.display = 'block';
                                                }
                                            });
                                        </script>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Model Details</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection
