@extends('layouts.sidenav')

@section('title', 'View Tenant Details')

@section('content')
    <main>
        <div class="flex-container">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="columns m-t-10">
                <div class="column">
                    <h1 class="title">View Tenant Details</h1>
                </div> <!-- end of column -->

                <div class="column">
                    <a href="{{route('users.edit', $userAccount->UserAccount_Id)}}" class="button is-primary is-pulled-right"><i class="fa fa-user m-r-10"></i> Edit User</a>
                </div>
            </div>
            <hr class="m-t-0">

            <div class="columns">
                <div class="column">
                    <div class="field">
                        <div class="field">
                            <img width="300px" height="300px" src="/storage/images/{{$userAccount->user->User_Picture}}">
                        </div>
                    </div>

                    <div class="field">
                        <label for="name" class="label">Name</label>
                        <pre>{{$userAccount->user->User_FirstName.' '.$userAccount->user->User_LastName}}</pre>
                    </div>

                    <div class="field">
                        <div class="field">
                            <label for="email" class="label">Email</label>
                            <pre>{{$userAccount->UserAccount_Email}}</pre>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field">
                            <label for="email" class="label">Room</label>
                            <pre>{{$tenantInfo->room->Room}}</pre>
                        </div>
                    </div>

                    <div class="field">
                        <div class="field">
                            <label for="email" class="label">Guardian Name</label>
                            <pre>{{$tenantInfo->tenantGuardian->TenantGuardian_FirstName.' '.$tenantInfo->tenantGuardian->TenantGuardian_LastName}}</pre>
                        </div>
                    </div>

                    <!--Contract Table-->
                    <b>Contract</b>
                    <div class="column">
                        <a href="{{ route('contract.create', ['UserAccount_Id' => $userAccount->UserAccount_Id]) }}" class="button is-primary is-pulled-right"><i class="fa fa-clipboard m-r-10"></i> Add Contract</a>
                    </div>
                    <table class="table table-hover">
                        <!--Table head-->
                        <thead class="blue lighten-3">
                        <tr>
                            <th>Start</th>
                            <th>Expiry</th>
                            <th>Status</th>
                            <th>File</th>
                            <th></th>
                        </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                        @if(count($contracts) > 0)
                            @foreach($contracts as $contract)
                                <tr>
                                    <td>{{date('F d, Y', strtotime($contract->Contract_Start))}}</td>
                                    <td>{{date('F d, Y', strtotime($contract->Contract_Expiry))}}</td>
                                    <td>{{$contract->Contract_Status}}</td>
                                    <td>{{$contract->Contract_File}}</td>
                                    <td>
                                        <a class="fa fa-eye fa-2x blue-text" data-toggle="tooltip"
                                           data-placement="top" title="View" href="{{ route('contract.show', $contract->Contract_Id ) }}"></a>&nbsp;&nbsp;
                                        {{--<a class="fa fa-edit fa-2x amber-text" data-toggle="tooltip"--}}
                                           {{--data-placement="top" title="Edit" href="{{ route('contract.edit', $room->TenantRoom_Id) }}"></a>&nbsp;&nbsp;--}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>No records found.</p>
                        @endif
                        </tbody>
                        <!--Table body-->

                    </table>

                    <!--Violations Table-->
                    <b>Violations</b>
                    <div class="column">
                        <a href="{{ route('violations.create', ['UserAccount_Id' => $userAccount->UserAccount_Id]) }}" class="button is-primary is-pulled-right"><i class="fa fa-clipboard m-r-10"></i> Add Contract</a>
                    </div>
                    <table class="table table-hover">
                        <!--Table head-->
                        <thead class="blue lighten-3">
                        <tr>
                            <th>Title</th>
                            <th>Text</th>
                            <th>Date Created</th>
                            <th></th>
                        </tr>
                        </thead>
                        <!--Table head-->

                        <!--Table body-->
                        <tbody>
                        @if(count($violations) > 0)
                            @foreach($violations as $violation)
                                <tr>
                                    <td>{{$violation->Records_Title}}</td>
                                    <td>{{$violation->Records_Text}}</td>
                                    <td>{{date('F d, Y', strtotime($violation->Records_DateTime_Added))}}</td>
                                    <td>
                                        {{--<a class="fa fa-eye fa-2x blue-text" data-toggle="tooltip"--}}
                                           {{--data-placement="top" title="View" href="{{ route('violations.show', $violation->Contract_Id ) }}"></a>&nbsp;&nbsp;--}}
                                        {{--<a class="fa fa-edit fa-2x amber-text" data-toggle="tooltip"--}}
                                        {{--data-placement="top" title="Edit" href="{{ route('contract.edit', $room->TenantRoom_Id) }}"></a>&nbsp;&nbsp;--}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>No records found.</p>
                        @endif
                        </tbody>
                        <!--Table body-->

                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection