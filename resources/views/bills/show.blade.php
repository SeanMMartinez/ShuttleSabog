@extends('layouts.sidenav')

@section('title', 'Bills')

@section('content')
    <main>
        <div class="card">
            <h3>Bill</h3>
            @if(count($billbreakdowns)>0)
                <div class="card-body" >
                    <h5><b>Bill_Id:{{$bill->Bill_Id}}</b></h5>
                    <p><b>Tenant Room Id:</b> {{$bill->user->tenantInfo->room->Room}}</p>
                    <p><b>User Id:</b> {{$bill->user->User_FirstName}}</p>
                    <p><b>Bill Month</b> {{$bill->Bill_Month}}</p>
                    <p><b>Bill Total</b> {{$bill->Bill_Total}}</p>
                    <p><b>Bill Divided Total</b> {{$bill->Bill_DividedTotal}}</p>
                    <p><b>Bill DueDate:</b> {{date('F d, Y', strtotime($bill->Bill_DueDate))}}</p>
                    @if($bill->Bill_Status == 0)
                        <p><b>Bill Status:</b> Unpaid</p>
                    @elseif($bill->Bill_Status == 1)
                        <p><b>Bill Status:</b> Paid</p>
                        @endif
                    </br>
                </div>
                @foreach($billbreakdowns as $billbreakdown)
                    <p><b>Bill break down Input:</b> {{$billbreakdown->BillBDown_Input }}</p>
                    <p><b>Bill break down Consumption:</b> {{$billbreakdown->BillBDown_Consumption }}</p>
                    <p><b>Bill break down PriceRate :</b> {{$billbreakdown->BillBDown_PriceRate  }}</p>
                    <p><b>Bill break down Total:</b> {{$billbreakdown->BillBDown_Total  }}</p>

                @endforeach
            @else <p>No Bills found</p>
            @endif
            <a class="waves-effect" href="{{ route('bills.edit', $bill->Bill_Id) }}">Edit Status</a>

        </div>
    </main>

@endsection