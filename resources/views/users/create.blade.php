@extends('layouts.sidenav')

@section('title', 'Register Tenant')

@section('content')
    <main>
        <div class="justify-content-between">
            <div class="container-fluid text-center">
                <!--Grid row-->
                <div class="row text-left my-xl-5 ml-xl-3">
                    <!--Grid column-->
                    <div class="col-xl-12">
                        <!-- Steps form -->
                        <div class="card">
                            <div class="card-body mx-4">
                                <h2 class="text-center font-weight-bold pt-4 pb-5"><strong>Registration for
                                        Tenants</strong></h2>
                                <hr/>
                                <!-- Stepper -->
                                <div class="steps-form disabled pb-4">
                                    <div class="steps-row setup-panel">
                                        <div class="steps-step">
                                            <a href="#step-1" role="button"
                                               class="btn btn-info btn-circle animated pulse infinite">1</a>
                                        </div>
                                        <div class="steps-step">
                                            <a href="#step-2" role="button" class="btn btn-grey btn-circle disabled"
                                               aria-disabled="true">2</a>
                                        </div>
                                        <div class="steps-step">
                                            <a href="#step-3" role="button" class="btn btn-grey btn-circle disabled"
                                               aria-disabled="true">3</a>
                                        </div>
                                        <div class="steps-step">
                                            <a href="#step-4" role="button" class="btn btn-grey btn-circle disabled"
                                               aria-disabled="true">4</a>
                                        </div>
                                        <div class="steps-step">
                                            <a href="#step-5" role="button" class="btn btn-grey btn-circle disabled"
                                               aria-disabled="true">5</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress" style="height: 20px">
                                    <div class="progress-bar bg-info" role="progressbar" style="height:20px"
                                         aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <form role="form-elegant md-form animated fadeIn" action="{{ action('UserController@store') }}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <!-- First Step -->
                                    <fieldset>
                                        <div class="row setup-content" id="step-1">
                                            <div class="col-md-12">
                                                <h3 class="font-weight-bold pl-0 my-4"><strong>Step 1: Basic
                                                        Information</strong></h3>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="file-field">
                                                            <div class="mb-4">
                                                                <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                                                     class="rounded-circle z-depth-1-half avatar-pic"
                                                                     id="avatar">
                                                            </div>
                                                            <div class="d-flex">
                                                                <div class="btn btn-mdb-color btn-rounded float-left">
                                                                    <span>Add photo</span>
                                                                    <input type="file" id="uploadBtn" name="User_Picture">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group md-form pb-3">
                                                                    <i class="fa fa-user prefix"></i>
                                                                    <label for="firstName" data-error="wrong"
                                                                           data-success="right">First
                                                                        Name</label>
                                                                    <input id="firstName" type="text"
                                                                           required="required"
                                                                           class="form-control validate" name="User_FirstName" value="{{ old('User_FirstName') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group md-form pb-3">
                                                                    <label for="middleName" data-error="wrong"
                                                                           data-success="right">Middle
                                                                        Name</label>
                                                                    <input id="middleName" type="text"
                                                                           required="required"
                                                                           class="form-control validate" name="User_MiddleName" value="{{ old('User_MiddleName') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group md-form pb-3">
                                                                    <label for="lastName" data-error="wrong"
                                                                           data-success="right">Last
                                                                        Name</label>
                                                                    <input id="lastName" type="text" required="required"
                                                                           class="form-control validate" name="User_LastName" value="{{ old('User_LastName') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group md-form pb-3">
                                                                    <select id="gender"
                                                                            class="mdb-select colorful-select dropdown-primary validate" name="User_Gender" value="{{ old('User_Gender') }}">
                                                                        <option value="" disabled selected>Choose your gender</option>
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                    </select>
                                                                    <label for="gender" data-error="wrong"
                                                                           data-success="right">Gender</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group md-form pb-3">
                                                                    <select id="civStat"
                                                                            class="mdb-select colorful-select dropdown-primary validate" name="User_CivilStatus" value="{{ old('User_CivilStatus') }}">
                                                                        <option value="" disabled selected>Choose your civil status
                                                                        </option>
                                                                        <option value="Single">Single</option>
                                                                        <option value="Married">Married</option>
                                                                        <option value="Separated">Separated</option>
                                                                        <option value="Divorced">Divorced</option>
                                                                        <option value="Widowed">Widowed</option>
                                                                    </select>
                                                                    <label for="civStat" data-error="wrong"
                                                                           data-success="right">Civil Status</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group md-form pb-3">
                                                                    <input placeholder="Selected birthday" type="text"
                                                                           id="date-picker-example"
                                                                           class="form-control datepicker" name="User_Birthdate" value="{{ old('User_Birthdate') }}">
                                                                    <label for="date-picker-example" data-error="wrong"
                                                                           data-success="right">Birthday</label>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group md-form pb-3">
                                                                    <i class="fa fa-flag prefix"></i>
                                                                    <label for="nationality" data-error="wrong"
                                                                           data-success="right">Nationality</label>
                                                                    <input type="text" id="nationality"
                                                                           class="form-control validate" name="User_Nationality" value="{{ old('User_Nationality') }}">
                                                                    <span id="natMsg"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group md-form pb-3">
                                                                    <i class="fa fa-church prefix"></i>
                                                                    <label for="religion" data-error="wrong"
                                                                           data-success="right">Religion</label>
                                                                    <input type="text" id="religion"
                                                                           class="form-control validate" name="User_Religion" value="{{ old('User_Religion') }}">
                                                                    <span id="relMsg"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="md-form pb-3">
                                                            <i class="fa fa-home prefix"></i>
                                                            <input type="text" id="homeAdd"
                                                                   class="form-control" name="Address_HomeAdd" value="{{ old('Address_HomeAdd') }}">
                                                            <label for="address">Home Address</label>
                                                            <span id="addMsg"></span>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="md-form pb-3">
                                                                    <input type="text" id="city"
                                                                           class="form-control" name="Address_City" value="{{ old('Address_City') }}">
                                                                    <label for="city">City</label>
                                                                    <span id="cityMsg"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="md-form pb-3">
                                                                    <input type="text" id="province"
                                                                           class="form-control" name="Address_Province" value="{{ old('Address_Province') }}">
                                                                    <label for="province">Province</label>
                                                                    <span id="provinceMsg"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="md-form pb-3">
                                                                    <input type="number" id="zipcode"
                                                                           class="form-control" name="Address_ZipCode" value="{{ old('Address_ZipCode') }}">
                                                                    <label for="zipcode">Zip Code</label>
                                                                    <span id="zipMsg"></span>
                                                                </div>
                                                            </div>

                                                            <div class="col">
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
                                                            </div>

                                                            <div class="col">
                                                                <div class="form-group md-form pb-3">
                                                                    <select id="civStat"
                                                                            class="mdb-select colorful-select dropdown-primary validate" name="TenantRoom_Id">
                                                                        <option value="" disabled selected>Assign room
                                                                        </option>
                                                                        @foreach($rooms as $room)
                                                                            @if($room->RoomStatus == 1)
                                                                                @continue
                                                                            @endif
                                                                            <option value="{{$room->TenantRoom_Id}}">{{$room->Room}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <label for="civStat" data-error="wrong"
                                                                           data-success="right">Room</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <button class="btn btn-indigo nextBtn float-right"
                                                                type="button">
                                                            Next
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- Second Step -->
                                    <fieldset>
                                        <div class="row setup-content" id="step-2">
                                            <div class="col-md-12">
                                                <h3 class="font-weight-bold pl-0 my-4"><strong>Step 2: Guardian's
                                                        Information</strong></h3>
                                                <div class="col-md-4">
                                                    <div class="form-group md-form">
                                                        <select id="relateStat"
                                                                class="mdb-select colorful-select dropdown-primary validate" name="TenantGuardian_Relation">
                                                            <option value="" disabled selected>Choose the relation
                                                            </option>
                                                            <option value="Mother">Mother</option>
                                                            <option value="Father">Father</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                        <label for="civStat" data-error="wrong" data-success="right">Guardian's
                                                            Relation</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group md-form pb-3">
                                                            <i class="fa fa-user prefix"></i>
                                                            <label for="TenantGuardian_FirstName" data-error="wrong"
                                                                   data-success="right">First
                                                                Name</label>
                                                            <input id="TenantGuardian_FirstName" name="TenantGuardian_FirstName" type="text"
                                                                   required="required"
                                                                   class="form-control validate" value="{{ old('TenantGuardian_FirstName') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group md-form pb-3">
                                                            <label for="TenantGuardian_LastName" data-error="wrong"
                                                                   data-success="right">Last
                                                                Name</label>
                                                            <input id="TenantGuardian_LastName" name="TenantGuardian_LastName" type="text"
                                                                   required="required"
                                                                   class="form-control validate" value="{{ old('TenantGuardian_LastName') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group md-form pb-3">
                                                            <label for="age" data-error="wrong"
                                                                   data-success="right">Age</label>
                                                            <input id="TenantGuardian_Age" name="TenantGuardian_Age" type="text" required="required"
                                                                   class="form-control validate" value="{{ old('TenantGuardian_Age') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="md-form pb-3">
                                                    <i class="fa fa-at prefix"></i>
                                                    <input type="email" id="TenantGuardian_Email" name="TenantGuardian_Email" class="form-control" value="{{ old('TenantGuardian_Email') }}">
                                                    <label for="email">Email Address</label>
                                                    <span id="emailAddMsg"></span>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="md-form pb-3">
                                                            <i class="fa fa-mobile-alt prefix"></i>
                                                            <input type="number" id="TenantGuardian_CellphoneNo" name="TenantGuardian_CellphoneNo"
                                                                   class="form-control" value="{{ old('TenantGuardian_CellphoneNo') }}">
                                                            <label for="phoneno">Phone Number</label>
                                                            <span id="phoneNoMsg"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="md-form pb-3">
                                                            <i class="fa fa-phone prefix"></i>
                                                            <input type="number" id="TenantGuardian_LandlineNo" name="TenantGuardian_LandlineNo"
                                                                   class="form-control" value="{{ old('TenantGuardian_LandlineNo') }}">
                                                            <label for="phoneno">Landline Number</label>
                                                            <span id="landNoMsg"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-grey prevBtn float-left" type="button">Previous
                                                </button>
                                                <button class="btn btn-indigo nextBtn float-right" type="button">Next
                                                </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <!-- Third Step -->
                                    <fieldset>
                                        <div class="row setup-content" id="step-3">
                                            <div class="col-md-12">
                                                <h3 class="font-weight-bold pl-0 my-4"><strong>Step 3: Contact
                                                        Information</strong></h3>
                                                <div class="md-form pb-3">
                                                    <i class="fa fa-at prefix"></i>
                                                    <input type="email" id="UserAccount_Email" class="form-control" name="UserAccount_Email" value="{{ old('UserAccount_Email') }}">
                                                    <label for="email">Email Address</label>
                                                    <span id="emailAddMsg"></span>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="md-form pb-3">
                                                            <i class="fa fa-mobile-alt prefix"></i>
                                                            <input type="number" id="phoneno"
                                                                   class="form-control" name="User_CellphoneNo" value="{{ old('User_CellphoneNo') }}">
                                                            <label for="phoneno">Phone Number</label>
                                                            <span id="phoneNoMsg"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="md-form pb-3">
                                                            <i class="fa fa-phone prefix"></i>
                                                            <input type="number" id="landno"
                                                                   class="form-control" name="User_LandlineNo" value="{{ old('User_LandlineNo') }}">
                                                            <label for="phoneno">Landline Number</label>
                                                            <span id="landNoMsg"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-grey prevBtn float-left" type="button">Previous
                                                </button>
                                                <button class="btn btn-indigo nextBtn float-right" type="button">Next
                                                </button>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="row setup-content" id="step-4">
                                            <div class="col-md-12">
                                                <h3 class="font-weight-bold pl-0 my-4"><strong>Step 3: Contract
                                                        Information</strong></h3>
                                                <div class="md-form pb-3">
                                                    <i class="fa fa-at prefix"></i>
                                                    <input type="date" id="Contract_Start" class="form-control" name="Contract_Start" value="{{ old('Contract_Start') }}">
                                                    <label for="email">Start</label>
                                                    <span id="emailAddMsg"></span>
                                                </div>
                                                <div class="md-form pb-3">
                                                    <i class="fa fa-lock prefix"></i>
                                                    <input type="date" class="form-control" name="Contract_Expiry" value="{{ old('Contract_Expiry') }}">
                                                    <label for="password">Expiry</label>
                                                    <span id="password"></span>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="md-form pb-3">
                                                            <i class="fa fa-mobile-alt prefix"></i>
                                                            <input type="text" id="phoneno"
                                                                   class="form-control" name="Contract_Status" value="{{ old('Contract_Status') }}">
                                                            <label for="phoneno">Status</label>
                                                            <span id="phoneNoMsg"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="md-form pb-3">
                                                            <i class="fa fa-phone prefix"></i>
                                                            <input type="text" id="landno"
                                                                   class="form-control" name="Contract_File" value="{{ old('Contract_File') }}">
                                                            <label for="phoneno">File</label>
                                                            <span id="landNoMsg"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-grey prevBtn float-left" type="button">Previous
                                                </button>
                                                <button class="btn btn-indigo nextBtn float-right" type="button">Next
                                                </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="row setup-content" id="step-5">
                                            <div class="col-md-12">
                                                <h3 class="font-weight-bold pl-0 my-4"><strong>Step 4: Terms and
                                                        Conditions</strong></h3>
                                                <div class="form-check pb-3">
                                                    <input type="checkbox" class="filled-in form-check-input"
                                                           id="checkbox101" checked="checked">
                                                    <label class="form-check-label" for="checkbox101">I agree on the
                                                        terms and conditions of this dormitory</label>
                                                </div>
                                                <button class="btn btn-grey prevBtn float-left" type="button">Previous
                                                </button>
                                                <button class="btn btn-success float-right" type="submit">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
