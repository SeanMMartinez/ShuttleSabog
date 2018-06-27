@extends ('layouts.sidenav')

@section('title', 'Update Bill')
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
                                        <strong>Update Bill</strong>
                                    </h3>
                                </div>
                                <hr/>
                                <form method="POST" action="{{ route('bills.update', $bill->Bill_Id) }} }}"
                                      class="form-elegant md-form animated fadeIn">
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}
                                    <label for="Bill_Status">Bill Status</label>
                                    <div class="form-group md-form pb-3">
                                        <div class="col">
                                            <div class="switch round blue-white-switch">
                                                <label>
                                                    Unpaid
                                                    <input type="hidden" id="checkbox101" name="Bill_Status" value="0">
                                                    <input type="checkbox" id="checkbox101" name="Bill_Status" value="1"
                                                           @if($bill->Bill_Status == 1) checked="checked" @endif>
                                                    <span class="lever"></span>
                                                    Paid
                                                </label>
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