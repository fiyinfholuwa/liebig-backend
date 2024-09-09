


@extends('admin.app')

@section('title', 'Manage Announcement Display')
@section('page', 'Manage Announcement Display')
@section('content')

    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            {{--              <h5 class="card-title"></h5>--}}
                            <div class="">

                                <form action="{{route('ribbon.save')}}" method="post" class="row g-3">
                                    @csrf
                                    @if($ribbon != NULL)
                                        <div class="col-md-12 col-lg-12">
                                            <label for="inputName5" class="form-label">Content:</label>
                                            <textarea type="text" rows="5" name="body"  class="form-control"  placeholder="Announcement Content" id="inputName5">{{$ribbon->body}}</textarea>
                                            <p style="font-weight:bold; color:red; font-size:12px;">
                                                @error('body')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>

                                        <div class="col-md-12 col-lg-12">
                                            <label for="inputName5" class="form-label">Display:</label>
                                            <select  name="display" class="form-control">
                                                <option value="{{$ribbon->display}}">{{$ribbon->display}}</option>
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="id" value="{{$ribbon->id}}" />
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-primary">Update Announcement</button>
                                        </div>
                                    @else
                                        <div class="col-md-12 col-lg-12">
                                            <label for="inputName5" class="form-label">Content:</label>
                                            <textarea type="text" rows="5" name="body"  class="form-control"  placeholder="Announcement Content" id="inputName5">{{old('body')}}</textarea>
                                            <p style="font-weight:bold; color:red; font-size:12px;">
                                                @error('body')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>

                                        <div class="col-md-12 col-lg-12">
                                            <label for="inputName5" class="form-label">Display:</label>
                                            <select name="display" class="form-control">
                                                <option value="">Select Option</option>
                                                <option value="yes">yes</option>
                                                <option value="no">no</option>
                                            </select>
                                        </div>

                                        <div class="text-left">
                                            <button type="submit" class="btn btn-primary">Save Announcement</button>
                                        </div>
                                    @endif
                                </form><!-- End Multi Columns Form -->


                            </div>
                        </div>


                    </div>
                </div>

        </section>



    </main><!-- End #main -->
@endsection
