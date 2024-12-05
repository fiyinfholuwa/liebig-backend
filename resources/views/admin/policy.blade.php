@extends('admin.app')

@section('title' , 'Manage Policy')
@section('page' , 'Manage Policy')
@section('content')

    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            {{--                            <h5 class="card-title"></h5>--}}
                            <div class="">

                                <form method="post" action="{{route('admin.policy.save')}}" enctype="multipart/form-data"
                                      class="row g-3">
                                    @csrf
                                    @if(is_null($policy))
                                        <form method="post" action="{{route('admin.policy.save')}}" enctype="multipart/form-data"
                                              class="row g-3">
                                            @csrf
                                            <div class="col-md-6 col-lg-12">
                                                <label for="inputName5" class="form-label">Title</label>
                                                <input type="text" name="title" value="{{old('title')}}" class="form-control"
                                                       placeholder="Enter Policy Title" id="inputName5">
                                                <p style="font-weight:bold; color:red; font-size:12px;">
                                                    @error('title')
                                                    {{$message}}
                                                    @enderror
                                                </p>
                                            </div>

                                            <div class="col-md-6 col-lg-12">
                                                <label for="inputName5" class="form-label">Policy Content</label>
                                                <textarea id="myTextarea" name="body" placeholder="Policy Content"
                                                          class="form-control" rows="20"></textarea>
                                                <p style="font-weight:bold; color:red; font-size:12px;">
                                                    @error('body')
                                                    {{$message}}
                                                    @enderror
                                                </p>
                                            </div>


                                            <div class="">
                                                <button type="submit" class="btn btn-primary">Save Settings</button>
                                            </div>
                                        </form><!-- End Multi Columns Form -->

                                    @else


                                    <div class="col-md-6 col-lg-12">
                                        <label for="inputName5" class="form-label">Title</label>
                                        <input type="text" name="title" value="{{$policy->title}}" class="form-control"
                                               placeholder="Enter Policy Title" id="inputName5">
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('title')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>

                                    <div class="col-md-6 col-lg-12">
                                        <label for="inputName5" class="form-label">Policy Content</label>
                                        <textarea id="myTextarea" name="body" placeholder="Policy Content"
                                                  class="form-control" rows="20">{{$policy->body}}</textarea>
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('body')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                    @endif

                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>
                                </form><!-- End Multi Columns Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
