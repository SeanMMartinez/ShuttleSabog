@extends ('layouts.sidenav')

@section('title', 'Post New Personnel Schedule')
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
                                        <strong>Post Personnel Schedule</strong>
                                    </h3>
                                </div>
                                <hr/>
                                <form method="POST" action="{{ action('PersonnelScheduleController@store') }}"
                                      class="form-elegant md-form animated fadeIn">
                                    {{csrf_field()}}
                                    <div class="form-group md-form pb-3">
                                        <select class="mdb-select" id="Personnel_Id" name="Personnel_Id">
                                            <option value="" selected disabled>Select Personnel</option>
                                            @foreach($personnels as $personnel)
                                                <option value="{{$personnel->Personnel_Id}}">{{$personnel->Personnel_FirstName}} {{$personnel->Personnel_LastName}}</option>
                                            @endforeach
                                        </select>
                                        <label for="Personnel_Id" class="grey-text">Personnel</label>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group md-form pb-3">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a href="javascript:void(0);" class="add_button btn btn-info"><i
                                                                    class="fa fa-plus"></i> Add New Schedule</a>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="field_wrapper">

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group md-form pb-5">
                                        <div class="switch round blue-white-switch">
                                            <label>
                                                Vacant
                                                <input type="hidden" id="checkbox101" name="Vacancy" value="0">
                                                <input type="checkbox" id="checkbox101" name="Vacancy" value="1">
                                                <span class="lever"></span>
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group md-form pb-3">
                                        <select id="civStat"
                                                class="mdb-select colorful-select dropdown-primary validate" name="Floor">
                                            <option value="" disabled selected>Select Floor
                                            </option>
                                            <option value="1st">1st</option>
                                            <option value="2nd">2nd</option>
                                            <option value="3rd">3rd</option>
                                            <option value="4th">4th</option>
                                            <option value="5th">5th</option>
                                            <option value="6th">6th</option>
                                            <option value="7th">7th</option>
                                            <option value="8th">8th</option>
                                            <option value="9th">9th</option>
                                            <option value="10th">10th</option>
                                            <option value="11th">11th</option>
                                            <option value="12th">12th</option>
                                        </select>
                                        <label for="civStat" data-error="wrong"
                                               data-success="right">Floor</label>
                                    </div>
                                    <a class="btn btn-grey float-left" href="/personnelSched">
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