<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.adminIncludes.head')
</head>

<body>
<div class="wrapper">
@include('admin.adminIncludes.sidebar')

    <div class="main-panel">
    @include('admin.adminIncludes.navbar')
    @yield('content')

    @include('admin.adminIncludes.footer')
    </div>
</div>

</body>

@include('admin.adminIncludes.foot')

</html>