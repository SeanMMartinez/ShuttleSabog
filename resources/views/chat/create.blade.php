@extends ('layouts.sidenav')
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Add New Message') }}</div>

                        <div class="card-body">

                            <form method="POST" action="{{ action('ChatController@store') }}">
                                @csrf

                                <div class="form-group md-form pb-3">
                                    <select class="mdb-select" id="Chat_Category" name="Chat_Category">
                                        <option value="" selected disabled>Select Category</option>
                                        <option value="Inquiry">Inquiry</option>
                                        <option value="Concern">Concern</option>
                                    </select>
                                    <label for="Chat_Category" class="grey-text">Category</label>
                                </div>

                                <div class="white z-depth-1 px-3 pt-3 pb-0">
                                    <ul class="list-unstyled friend-list">
                                        @foreach($connections as $connection)
                                            <li class="active grey lighten-3 p-2">
                                                {{--@foreach($conversation->messages as $message)--}}
                                                {{--@if($message->Friend_Id != Auth::user()->User_Id)--}}
                                                {{--<a href="{{ route('chat.show', $message->Friend_Id) }}"--}}
                                                {{--class="d-flex justify-content-between">--}}
                                                {{--@else($message->User_Id != Auth::user()->User_Id)--}}
                                                {{--<a href="{{ route('chat.show', $message->User_Id) }}"--}}
                                                {{--class="d-flex justify-content-between">--}}
                                                {{--@endif--}}
                                                {{--@endforeach--}}
                                                <a href="{{ route('chat.show', [$connection->User_Id]) }}"
                                                   class="d-flex justify-content-between">
                                                    <div class="text-small">
                                                        <strong>{{ $connection->user->User_FirstName }}</strong>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection