<meta charset="utf-8" />
{{--<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/IMG-20171213-WA0003.jpg') }}">--}}
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('images/IMG-20171213-WA0003.jpg') }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title>WorkCity User Page - @if($page == 'index')
        Home
    @elseif($page == 'profile')
        Update your Profile
    @elseif($page == 'sponsors_investors')
        Sponsors and Investors
    @endif
</title>

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />


<!-- Bootstrap core CSS     -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

<!-- Animation library for notifications   -->
<link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

<!--  Paper Dashboard core CSS    -->
<link href="{{ asset('assets/css/paper-dashboard.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />


<!--  Fonts and icons     -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
<link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">
