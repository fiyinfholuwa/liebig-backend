
@extends('user.app')

@section('content')
    <div class="dashboard-container">
        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <!-- ======Topbar======= -->
            <div class="topbar d-flex justify-content-between align-items-center bg-light p-3 shadow-lg rounded">
                <!-- Status Update Section -->

                <!-- Notification and User Profile -->
                <div class="d-flex align-items-center">
                    <div class="notification icon me-4">
                        <ion-icon name="notifications-outline" style="font-size: 1.5rem;"></ion-icon>
                    </div>

                    <div class="user d-flex align-items-center">
                        <img src="https://raw.githubusercontent.com/programmercloud/nft-dashboard/main/img/user.png" alt="User" class="rounded-circle me-3 shadow-sm" style="width: 40px; height: 40px;" />
                        <p class="mb-0 me-2 d-none d-md-block fw-semibold text-dark">{{Auth::user()->name}}</p>
                        <ion-icon name="chevron-down-outline" style="font-size: 1.5rem;"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="main_c mt-4">

                <div class="top_models mt-5">
                    <div style="padding: 50px;" class="row">
                        <div class="col-lg-6">
                            <h2>My Chats</h2>
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
                                    <a href="{{route('models')}}">All Model</a>

                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            @endsection


