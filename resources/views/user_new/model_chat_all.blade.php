@extends('user_new.app')

@section('title', 'Alle Chats')
@section('page', 'Alle Chats')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="top_models mt-5">
                <div  class="row">
                    <div class="col-lg-6">

                        @if(count($chats) > 0)
                            <ul style="" class="list-group">
                                @foreach($chats as $chat)
                                    <!-- Make the entire list item clickable -->
                                    <a  href="{{ route('model.chat.detail', optional($chat->user)->id) }}" style="text-decoration: none; color: inherit; margin-top: 20px;">
                                        <li class="list-group-item d-flex align-items-center">
                                            <!-- Profile Image as Circle -->
                                            <img src="{{ asset(optional($chat->user)->profile_image ?? 'https://static.vecteezy.com/system/resources/thumbnails/003/337/584/small/default-avatar-photo-placeholder-profile-icon-vector.jpg') }}" alt="Profile Image" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">

                                            <!-- Chat Details -->
                                            <div style="padding-left: 20px;" class="flex-grow-1">
                                                <div class="fw-semibold">
                                                    <span style="font-weight: bolder;">{{ optional($chat->user)->name }}</span>
                                                </div>
                                                <div class="text-muted">
                                                    @php
                                                        $last_msg =    get_last_message_user($chat->userid)
                                                    @endphp
                                                    {{$last_msg}}
                                                </div> <!-- Assuming 'last_message' is available -->
                                            </div>

                                            <div class="ms-3">
                                                <div class="custom-icon custom-chat-icon" title="Chats">
                                                    <sup>
                                                        {{-- Uncomment if unread count is available --}}
                                                        @php
                                                            $unread = get_model_unread_chats($chat->userid)
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

                                    <a class="btn btn-outline-danger" href="#">No Chats Yet</a>

                            </div>
                        @endif




                    </div>
                </div>
            </div>

        </div>

@endsection
