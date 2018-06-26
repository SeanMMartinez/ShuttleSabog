{{--@extends ('layouts.sidenav')

@section('title', 'Connections')

@section('content')
    <main>
        <div class="container">
            Hello
            @foreach($connections as $connection)
                <p>{{ $connection->User_FirstName }}</p>
            @endforeach
        </div>
    </main>
@endsection--}}

@extends ('layouts.sidenav')

@section('title', 'Conversation')

@section('content')
    <main>
        <div class="card grey lighten-3 chat-room">
            <div class="card-body">

                <!-- Grid row -->
                <div class="row px-lg-2 px-2">

                    <!-- Grid column -->
                    <div class="col-md-6 col-xl-4 px-0">

                        <h6 class="font-weight-bold mb-3 text-center text-lg-left">Member</h6>
                        <div class="white z-depth-1 px-3 pt-3 pb-0">
                            <ul class="list-unstyled friend-list">
                                @foreach($conversations as $conversation)
                                    <li class="active grey lighten-3 p-2">
                                        @foreach($conversation->messages as $message)
                                            @if($message->Friend_Id != Auth::user()->User_Id)
                                                <a href="{{ route('chat.show', $message->Friend_Id) }}"
                                                   class="d-flex justify-content-between">
                                            @else($message->User_Id != Auth::user()->User_Id)
                                                <a href="{{ route('chat.show', $message->User_Id) }}"
                                                   class="d-flex justify-content-between">
                                            @endif
                                        @endforeach
                                            <div class="text-small">
                                                <strong>{{ $conversation->Chat_Category }}</strong>
                                                <p class="last-message text-muted">Hello, Are you there?</p>
                                            </div>
                                            <div class="chat-footer">
                                                <p class="text-smaller text-muted mb-0">Just now</p>
                                                <span class="badge badge-danger float-right">1</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

                        <div class="chat-message">

                            <ul class="list-unstyled chat">
                                <li class="d-flex justify-content-between mb-4">
                                    <div class="chat-body white p-3 ml-2 z-depth-1">
                                        <div class="header">
                                            <strong class="primary-font">Brad Pitt</strong>
                                            <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                                        </div>
                                        <hr class="w-100">
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </li>
                                <li class="white">
                                    <div class="form-group basic-textarea">
                                        <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..."></textarea>
                                    </div>
                                </li>
                                <button type="button" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Send</button>
                            </ul>

                        </div>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
        </div>
    </main>
@endsection