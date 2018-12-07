<div class="sidebar" data-background-color="black" data-active-color="warning">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('user/profile') }}" class="simple-text">
                {{ Auth::user()->fullname }}
            </a>
        </div>

        <ul class="nav">
            <li class="{{ $page == 'index' ? 'active' : ''}}">
                <a href="{{ url('/user/index') }}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ $page == 'profile' ? 'active' : ''}}">
                <a href="{{ url('user/edit_profile') }}">
                    <i class="ti-user"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="{{ $page == '1' ? 'active' : ''}}">
                <a href="{{ url('/') }}">
                    <i class="ti-cloud-down"></i>
                    <p>Agro Hub</p>
                </a>
            </li>
            <li class="{{ $page == '2' ? 'active' : ''}}">
                <a href="{{ url('/') }}">
                    <i class="ti-credit-card"></i>
                    <p>Online Payments</p>
                </a>
            </li>
            <li class="{{ $page == 'sponsors_investors' ? 'active' : ''}}">
                <a href="{{ url('/user/be_sponsors_investors') }}">
                    <i class="ti-world"></i>
                    <p>Sponsors and investors</p>
                </a>
            </li>
            {{--<li class="{{ $page == '4' ? 'active' : ''}}">--}}
                {{--<a href="{{ url('/') }}">--}}
                    {{--<i class="ti-map"></i>--}}
                    {{--<p>Maps</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="{{ $page == '5' ? 'active' : ''}}">--}}
                {{--<a href="{{ url('/') }}">--}}
                    {{--<i class="ti-bell"></i>--}}
                    {{--<p>Notifications</p>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="active-pro">
                <a href="{{ route('logout') }}">
                    <i class="ti-export"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>