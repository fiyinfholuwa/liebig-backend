


@extends('user_new.app')

@section('title', 'Meine Chats')
@section('page', 'Meine Chats')
@section('content')

    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                                        @if(count($my_chats) > 0)
                                            <ul class="list-group">
                                                @foreach($my_chats as $model)
                                                    <!-- Make the entire list item clickable -->
                                                    <a href="{{ route('user.chat.detail', $model->id) }}" style="text-decoration: none; color: inherit;">
                                                        <li class="list-group-item d-flex align-items-center">
                                                            <!-- Profile Image as Circle -->
                                                            <img src="{{ asset($model->profile_image) }}" alt="Profile Image" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">

                                                            <!-- Chat Details -->
                                                            <div style="padding-left: 20px;" class="flex-grow-1">
                                                                <div class="fw-semibold">
                                                                    <span style="font-weight: bolder;">{{ $model->name }}</span>
                                                                </div>

                                                                <div class="text-muted">
                                                                    @php
                                                                        $last_msg =    get_last_message_user(\Illuminate\Support\Facades\Auth::user()->id)
                                                                    @endphp
                                                                    {{$last_msg}}
                                                                </div> <!-- Assuming 'last_message' is available -->
                                                            </div>

                                                            <div class="ms-3">
                                                                <div class="custom-icon custom-chat-icon" title="Chats">
                                                                    <sup>
                                                                        {{-- Uncomment if unread count is available --}}
                                                                        @php
                                                                            $unread = get_user_unread_chats(\Illuminate\Support\Facades\Auth::user()->id)
                                                                        @endphp

                                                                        @if($unread > 0)
                                                                            <span class="badge bg-danger text-white">{{ $unread }}</span>
                                                                        @endif
                                                                    </sup>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </a>
                                                @endforeach
                                            </ul>

                                        @else
                                            <div style="padding: 40px;">
                                                @if(Auth::user()->user_type ===1)
                                                    <a class="btn btn-outline-danger" href="{{route('models')}}">No Chats Yet View All Model</a>

                                                @else
                                                    <a class="btn btn-outline-danger" href="#">No Chats Yet</a>

                                                @endif

                                            </div>
                                        @endif

                            </div>

                    </div>

        </section>



    </main><!-- End #main -->

@endsection
