<!DOCTYPE html>
<html lang="en">

<head>
    @include('coordinators.coordIncludes.head')
</head>

<body>
<div class="wrapper">
@include('coordinators.coordIncludes.sidebar')

    <div class="main-panel">
    @include('coordinators.coordIncludes.navbar')
    @yield('content')

    @include('coordinators.coordIncludes.footer')
    </div>
</div>

</body>

@include('coordinators.coordIncludes.foot')

</html>