<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->User_Id : null }}">
    <title>DormPanion | @yield('title')</title>
    <link rel="icon" href="{{asset('img/logo.png')}}"/>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">

    <link href="{{asset('css/fontawesome-all.css')}}" rel="stylesheet">

    <link href="{{asset('css/compiled.min.css')}}" rel="stylesheet">

</head>
<body style="background-color:#64e7d3">
@yield('sidenav')

@yield('content')

</body>

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>

<script src="{{asset('js/compiled.min.js')}}"></script>

<script src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript">
    var onloadCallback = function () {
        grecaptcha.render('https://www.google.com/recaptcha/api/siteverify', {
            'sitekey': 'your_site_key'
        });
    };
</script>

<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>

<script>
    CKEDITOR.replace( 'announce-message' );
</script>

<script src="{{asset('js/forms.js')}}"></script>

<script type="text/javascript">
    var onloadCallback = function () {
        grecaptcha.render('https://www.google.com/recaptcha/api/siteverify', {
            'sitekey': 'your_site_key'
        });
    };
</script>
<script>
    $(document).ready(function () {
        $('.mdb-select').material_select();
    });

    // SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);

    // Data Picker Initialization
    $('.datepicker').pickadate({
        min: new Date(1900, 1, 31),
        max: new Date(2099, 12, 31), selectYears: 5000, closeOnClear: false, closeOnSelect: false
    });

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Time Picker Initialization
    $('#input_starttime').pickatime({});

    // Time Picker Initialization
    $('#input_endtime').pickatime({});

    new WOW().init();
</script>
<script>
    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="row">\n' +
            '<div class="col-md-6">\n' +
            '<label for="BillBDown_Input[] ">Bill Input</label>\n' +
            '<input type="text" name="BillBDown_Input[] " value="" class="form-control">\n' +
            '</div>\n' +
            '<div class="col-md-5">\n' +
            '<label for="BillBDown_Consumption[]">Consumption</label>\n' +
            '<input type="text" name="BillBDown_Consumption[]" value="" class="form-control">\n' +
            '</div>'+
            '<div class="col-md-5">\n' +
            '<label for="BillBDown_PriceRate[]">Price Rate</label>\n' +
            '<input type="text" name="BillBDown_PriceRate[]" value="" class="form-control">\n' +
            '</div>'+
            '<a href="javascript:void(0);" class="remove_button"><i class="fa fa-2x red-text fa-minus"></i></a>' +
            '</div>\n'; //New input field html
        var x = 0; //Initial field counter is 1
//Once add button is clicked
        $(addButton).click(function () {
//Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
//Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
<script>
    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="row">\n' +
            '<div class="col-md-6">\n' +
            '<label for="Days[] ">Days</label>\n' +
            '<input type="text" name="Days[] " value="" class="form-control">\n' +
            '</div>\n' +
            '<div class="col-md-5">\n' +
            '<label for="Start_Time[]"></label>\n' +
            '<input type="time" name="Start_Time[]" value="" class="form-control">\n' +
            '</div>'+
            '<div class="col-md-5">\n' +
            '<label for="End_Time[]">End Time</label>\n' +
            '<input type="time" name="End_Time[]" value="" class="form-control">\n' +
            '</div>'+
            '<a href="javascript:void(0);" class="remove_button"><i class="fa fa-2x red-text fa-minus"></i></a>' +
            '</div>\n'; //New input field html
        var x = 0; //Initial field counter is 1
//Once add button is clicked
        $(addButton).click(function () {
//Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
//Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
</html>
