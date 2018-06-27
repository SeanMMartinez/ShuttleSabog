@extends ('layouts.sidenav')

@section('title', 'Post New Bill')
@section('content')
    <main>
        <div class="justify-content-between">
            <div class="container-fluid text-center">
                <div class="row text-left my-xl-5 ml-xl-1">
                    <div class="col-xl-12">
                        <div class="card animated fadeIn">
                            <div class="card-body mx-4">
                                <div class="text-left">
                                    <h3 class="dark-grey-text mb-3">
                                        <strong>Post Bill</strong>
                                    </h3>
                                </div>
                                <hr/>
                                <form method="POST" action="{{ action('BillController@store') }}"
                                      class="form-elegant md-form animated fadeIn">
                                    {{csrf_field()}}
                                    <div class="form-group md-form pb-3">
                                        <select class="mdb-select" id="TenantRoom_Id" name="TenantRoom_Id">
                                            <option value="" selected disabled>Select Room</option>
                                            @foreach($rooms as $room)
                                                <option value="{{$room->TenantRoom_Id}}">{{$room->Room}}</option>
                                            @endforeach
                                        </select>
                                        <label for="TenantRoom_Id" class="grey-text">Room</label>
                                    </div>
                                    <div class="form-group md-form pb-3">
                                        <select class="mdb-select" id="Bill_Month" name="Bill_Month">
                                            <option value="" disabled selected>Select Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                        <label for="Bill_Month">Month of Bill</label>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group md-form pb-3">
                                                <i class="fa fa-clock-o prefix"></i>
                                                <input placeholder="Select Due Date"
                                                       type="text"
                                                       id="date-picker-example"
                                                       class="form-control datepicker"
                                                       name="Bill_DuteDate"
                                                       value="{{ old('Bill_DueDate') }}" required>
                                                <label for="date-picker-example"
                                                       data-error="wrong"
                                                       data-success="right">Bill Due Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group md-form pb-3">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a href="javascript:void(0);" class="add_button btn btn-info"><i
                                                                    class="fa fa-plus"></i> Add New Bill</a>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="field_wrapper">

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-grey float-left" href="/bills">
                                        Back
                                    </a>
                                    <button type="submit" class="btn btn-primary float-right">
                                        {{ __('Create') }}
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection