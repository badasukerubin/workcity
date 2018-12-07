<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.userIncludes.head')
</head>

<body>
<div class="wrapper">
@include('user.userIncludes.sidebar')

    <div class="main-panel">
    @include('user.userIncludes.navbar')
    @yield('content')

    @include('user.userIncludes.footer')
    </div>
</div>

</body>

@include('user.userIncludes.foot')

</html>