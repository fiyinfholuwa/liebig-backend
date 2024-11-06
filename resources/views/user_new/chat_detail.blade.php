



@extends('user_new.app')

@section('title', 'Chats')
@section('page', 'Chats')
@section('content')
    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div  style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; padding: 50px;" class=" chat-content">
                        <div class=" mb-0">
                            <form action="{{ route('user.chat.add') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="scroll-block chat-message">
                                    <div style="height: 500px; overflow-y: scroll; " class="">
                                        @php
                                            use Carbon\Carbon;

                                            function formatDate($date) {
                                                $carbonDate = Carbon::parse($date);
                                                return $carbonDate->isToday() ? 'Today' : ($carbonDate->isYesterday() ? 'Yesterday' : $carbonDate->format('F j, Y'));
                                            }
                                            $groupedMessages = [];
                                            foreach ($chats as $message) {
                                                $dateKey = Carbon::parse($message['created_at'])->toDateString();
                                                $groupedMessages[$dateKey][] = $message;
                                            }
                                        @endphp

                                        @foreach ($groupedMessages as $date => $messages)
                                            <p class="mb-1 text-muted text-center"><small>{{ formatDate($date) }}</small></p>
                                            @foreach ($messages as $message)
                                                @php $isUser = $message['user_type'] === 'user'; @endphp
                                                <div class="{{ $isUser ? 'message-out' : 'message-in' }}">
                                                    <div class="d-flex align-items-{{ $isUser ? 'end' : 'start' }} flex-column">
                                                        <div class="message d-flex align-items-{{ $isUser ? 'end' : 'start' }} flex-column">
                                                            <div class="d-flex align-items-center mb-1 chat-msg">
                                                                <div class="flex-grow-1 {{ $isUser ? 'ms-3' : 'me-3' }}">
                                                                    <div class="msg-content {{ $isUser ? 'bg-primary' : 'bg-light' }} p-2">
                                                                        <p class="mb-0">{{ $message['message'] }}</p>

                                                                    </div>
                                                                    @if(!is_null($message['image']))
                                                                        <a style="text-decoration: none; color: #b01e1e;" href="{{asset($message['image'])}}" class="mb-0">view image</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer py-2 px-3">
                                    <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="modelId" value="{{ $modelId }}">

                                    <textarea
                                        name="message"
                                        class="form-control border-0 shadow-none px-0"
                                        placeholder="Type a Message"
                                        rows="2"
                                        maxlength="200"
                                        oninput="document.getElementById('charCount').textContent = this.value.length + '/200 characters';">
</textarea>
                                    <small style="color: red; font-weight: bolder;" id="charCount">0/200 characters</small>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mt-2">
                                                <label class="fancy-file-upload">
                                                    <span class="fancy-upload-btn">attachment</span>
                                                    <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
                                                </label>
                                                <img id="image-preview" class="image-preview" />
                                            </div>

                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mt-3">
                                                <label class="fancy-file-upload">
                                                    <button data-bs-toggle="modal" data-bs-target="#add_category" type="button" class="btn btn-dark">
                                                        <span ><i class="ph-duotone ph-gift"></i>Send Gift</span>

                                                    </button>




                                                </label>
                                                <img id="image-preview" class="image-preview" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">

                                        </div>
                                    </div>


                                    <hr class="my-2">
                                    <div class="d-sm-flex align-items-center">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="ti ti-send f-18 "></i> Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form method="post" action="{{route('user.send.gift')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send Gift</h5>

                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="modelId" value="{{ $modelId }}">
                            <div class="form-group">
                                <label>Select Gifts</label>

                                <select required name="gift_id" class="form-control">
                                    <option value="">Select Option</option>
                                    @foreach($gifts as $gift)
                                        <option value="{{$gift->id}}">{{$gift->reward_name}} | Equivalent Coins {{$gift->reward_amount}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-cancel"></i> Discard</button>
                            <button type="submit" class="btn btn-success">Send Gift</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>



    </main><!-- End #main -->
    <style>
        .card-body {
            max-height: 500px;
            overflow-y: auto;
        }
        .message-out, .message-in {
            margin-bottom: 10px;
        }
        .message-out .msg-content {
            background-color: #007bff;
            color: white;
            border-radius: 10px;
        }
        .message-in .msg-content {
            background-color: #f1f1f1;
            border-radius: 10px;
        }
        .chat-msg {
            padding: 5px;
        }
        .card-footer {
            background-color: #f8f9fa;
        }
        /* Fancy File Upload */
        .fancy-file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .fancy-file-upload input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            cursor: pointer;
            height: 100%;
            width: 100%;
        }
        .fancy-upload-btn {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            display: inline-block;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .fancy-upload-btn:hover {
            background-color: #0056b3;
        }
        .image-preview {
            margin-top: 10px;
            max-width: 200px;
            max-height: 200px;
            display: none;
        }
    </style>
    <script>
        // Function to preview the image before upload
        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        }
    </script>

@endsection
