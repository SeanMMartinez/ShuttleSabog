@extends ('layouts.sidenav')
@section('content')
    <main>
        <div class="justify-content-between">
            <div class="container-fluid  text-center">
                <div class="row text-left my-xl-5 ml-xl-1">
                    <div class="col-xl-12">
                        <form class="form-elegant animated fadeIn" action="" method="post" onsubmit="" runat="server">
                            <div class="card">
                                <div class="card-body mx-4">
                                    <div class="text-left">
                                        <h3 class="dark-grey-text mb-3">
                                            <strong>Manage Personnel</strong>
                                        </h3>
                                    </div>
                                    <hr/>
                                    <a class="btn btn-info mb-3" href="{{ route('personnels.create') }}">
                                        <i class="fa fa-pencil-alt"></i> Add New Personnel
                                    </a>
                                    <a class="btn btn-info mb-3" href="/personnelSched/create">
                                        <i class="fa fa-calendar-alt"></i> Add Personnel Schedule
                                    </a>
                                    <!--Table-->
                                    <table class="table table-hover">
                                        <!--Table head-->
                                        <thead class="blue lighten-3">
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Work</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <!--Table head-->

                                        <!--Table body-->
                                        <tbody>

                                        @foreach($personnels as $personnel)
                                            <tr>
                                                <th scope="row">{{$personnel->Personnel_FirstName}}</th>
                                                <td>{{$personnel->Personnel_LastName}}</td>
                                                <td>{{$personnel->work->Pwork_Name}}</td>

                                                @if($personnel->Personnel_Status == 1)
                                                    <td>Active</td>
                                                @elseif($personnel->Personnel_Status == 0)
                                                    <td>Vacant</td>
                                                @endif
                                                <td>
                                                    <a class="fa fa-eye fa-2x blue-text" data-toggle="tooltip"
                                                       data-placement="top" title="View" href="{{ route('personnels.show', $personnel->Personnel_Id) }}"></a>&nbsp;&nbsp;
                                                    <a class="fa fa-edit fa-2x amber-text" data-toggle="tooltip"
                                                       data-placement="top" title="Edit" href="{{ route('personnels.edit', $personnel->Personnel_Id) }}"></a>&nbsp;&nbsp;
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <!--Table body-->

                                    </table>
                                    <!--Table-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection