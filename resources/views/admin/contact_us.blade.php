
@extends('admin.app')

@section('title', 'Manage Contact Us')
@section('page', 'Manage Contact Us')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing card" style="padding: 30px;">

                    <div class="widget-content widget-content-area br-6 table-responsive">
                        {{--                        <h6></h6>--}}

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="my-table" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($all_messages as $message)
                                        <tr>

                                            <td>{{$i++;}}</td>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->message}}</td>
                                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#message_{{$message->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                            </td>

                                            <div class="modal" id="message_{{$message->id}}" tabindex="-1">
                                                <form method="post" action="{{route('admin.contact.delete', $message->id)}}">
                                                    @csrf
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-weight:bold;" class="modal-title text-primary">Contact Delete</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this Message?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!-- End Disabled Animation Modal-->

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

@endsection
