


@extends('admin.app')

@section('title', 'Manage News')
@section('page', 'Manage News')
@section('content')

    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            {{--              <h5 class="card-title"></h5>--}}


                            <!-- Table with stripped rows -->
                            <table id="my-table" class="table datatable">
                                <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td><img height="40px" width="40px" src="{{asset($blog->image)}}"></td>
                                        <td>{!! (\Illuminate\Support\Str::limit($blog->body, 20, '...')) !!}
                                        </td>

                                        <td>
                                            <a href="{{route('admin.blog.edit', $blog->id)}}">
                                                <i  class="fa fa-edit text-primary"></i>
                                            </a>
                                            <a type="button" class="" data-bs-toggle="modal" data-bs-target="#blog_delete_{{$blog->id}}">
                                                <i  class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                        @include('admin.modals.blog')
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </section>



    </main><!-- End #main -->
@endsection
