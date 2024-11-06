

@extends('user_new.app')

@section('title')
    Chats With <span style="color: #0a58ca">{{ $name }}</span>
@endsection
@section('page', 'Chats')
@section('content')

    <style>
        .card-body {
            max-height: 500px; /* Adjust the height as needed */
            overflow-y: auto;
        }
    </style>

    <div class="chat-content">
        <div class="card mb-0">
            @php
                use Carbon\Carbon;

                function formatDate($date) {
                    $carbonDate = Carbon::parse($date);
                    if ($carbonDate->isToday()) {
                        return 'today';
                    } elseif ($carbonDate->isYesterday()) {
                        return 'yesterday';
                    } else {
                        return $carbonDate->format('F j, Y');
                    }
                }

                $groupedMessages = [];

                foreach ($chats as $message) {
                    $dateKey = Carbon::parse($message['created_at'])->toDateString();
                    if (!isset($groupedMessages[$dateKey])) {
                        $groupedMessages[$dateKey] = [];
                    }
                    $groupedMessages[$dateKey][] = $message;
                }
            @endphp

            <div class="scroll-block chat-message">
                <div class="card-body">
                    @foreach ($groupedMessages as $date => $messages)
                        <p class="mb-1 text-muted text-center"><small>{{ formatDate($date) }}</small></p>
                        @foreach ($messages as $message)
                            @php
                                $isUser = $message['user_type'] === 'user';
                            @endphp

                            <div class="{{ $isUser ? 'message-out' : 'message-in' }}">
                                <div class="d-flex align-items-{{ $isUser ? 'end' : 'start' }} flex-column">
                                    <div class="message d-flex align-items-{{ $isUser ? 'end' : 'start' }} flex-column">
                                        <div class="d-flex align-items-center mb-1 chat-msg">
                                            <div class="flex-grow-1 {{ $isUser ? 'ms-3' : 'me-3' }}">
                                                <div class="msg-content {{ $isUser ? 'bg-primary' : 'card' }} mb-0">
                                                    <p class="mb-0">{{ $message['message'] }}</p>
                                                </div>
                                                @if($isUser)
                                                    <button class="btn btn-sm btn-link reply-btn"
                                                            data-userid="{{ $message['userid'] }}"
                                                            data-modelid="{{ $message['modelId'] }}">
                                                        Reply
                                                    </button>
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

            <!-- Hidden Form -->
            <div id="replyForm" class="card-footer py-2 px-3" style="display: none;">
                <form action="{{ route('admin.chat.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="userid" id="replyUserid">
                    <input type="hidden" name="modelid" id="replyModelid">

                    <textarea
                        name="message"
                        class="form-control border-0 shadow-none px-0"
                        placeholder="Type a Message"
                        rows="2"
                        maxlength="200"
                        oninput="document.getElementById('charCount').textContent = this.value.length + '/200 characters';">
</textarea>

                                       <hr class="my-2">

                    <!-- Optional Image Upload -->
                    <input type="file" name="image" class="form-control-file mb-2">

                    <div class="d-sm-flex align-items-center">
                        <button type="submit" class="btn btn-link-primary">
                            <i class="ti ti-send f-18"></i>Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.querySelectorAll('.reply-btn').forEach(button => {
                button.addEventListener('click', function() {
                    // Show the reply form
                    document.getElementById('replyForm').style.display = 'block';

                    // Populate userid and modelid
                    document.getElementById('replyUserid').value = this.dataset.userid;
                    document.getElementById('replyModelid').value = this.dataset.modelid;

                    // Scroll to the form
                    document.getElementById('replyForm').scrollIntoView();
                });
            });
        </script>

        <script>
            function checkWordLimit(textarea, maxWords) {
                let words = textarea.value.trim().split(/\s+/).filter(word => word.length > 0);
                if (words.length > maxWords) {
                    textarea.value = words.slice(0, maxWords).join(" ");
                    words = words.slice(0, maxWords);
                }
                document.getElementById('wordCount').textContent = `${words.length}/${maxWords} words`;
            }
        </script>

    </div>

@endsection
