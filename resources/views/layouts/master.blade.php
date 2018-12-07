<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    @include('includes.header')

    <div>
        @yield('content')
    </div>

    <div>
        @include('includes.footer')
    </div>
</body>

</html>