
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
                    <div class="row">
                        <div class="col-lg-9">
                            <h2>My Chats</h2>
                            @if(count($my_chats) > 0)
                                <div class="row">
                                    @foreach($my_chats as $model)
                                        <div class="col-lg-4 nft mb-4">

                                            <img height="100%" src="{{asset($model->profile_image)}}" alt="Beautiful Woman Portrait" class="img-fluid rounded shadow-sm" />
                                            <div class="title mt-2 fw-semibold">{{$model->name}}</div>
                                            <div class="details d-flex justify-content-between align-items-center mt-2">
                                                <div class="icons d-flex align-items-center">
                                                    <div class="icon-container me-3">
                                                        <!-- Eye Icon -->
                                                        <a href="{{route('model.detail', $model->id)}}"><div class="custom-icon custom-eye-icon me-2" title="Views"></div></a>
                                                        <!-- Chat Icon -->
                                                       <a><div class="custom-icon custom-chat-icon" title="Chats"><sup><span class="badge bg-danger text-white">3</span></sup></div></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @endsection


