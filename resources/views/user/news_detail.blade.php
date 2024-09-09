@extends('user.app')

<style>
    .d_title {
        padding-left: 50px;
    }
    .d_title h3 {
        font-weight: bolder;
    }
    .topbar {
        background-color: #4C2835;
        color: white;
        border-radius: 8px;
    }
    .topbar .user p {
        color: white;
    }


    /* Responsive Styles */
    @media (max-width: 767px) {
        .pricing-column-wrapper {
            width: 100%;
        }
    }

</style>

@section('content')
    <!-- Custom Modal (Initially Hidden) -->

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <div class="topbar d-flex justify-content-between align-items-center bg-light p-3 shadow-lg rounded">

        </div>
        <div class="dashboard-content">
        </div>
    </div>


    <div style="margin-top: 50px;" class="container">
        <h3>{{$new->title}}</h3>
        <div class="img_div">
            <img style="width: 100%;" src="{{$new->image}}"/>
        </div>
        <div style="margin-top: 50px;" class="mt-6">
            <p>{{$new->body}}</p>
        </div>
    </div>

@endsection
