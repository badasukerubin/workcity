<div class="sidebar" data-background-color="black" data-active-color="warning">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a class="simple-text">
                {{ Auth::user()->fullname }}
            </a>
        </div>

        <ul class="nav">
            <li class="{{ $page == 'index' ? 'active' : ''}}">
                <a href="{{ url('/admin/welcome') }}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ $page == 'admin' ? 'active' : ''}}">
                <a href="{{ url('admin/admin_list') }}">
                    <i class="ti-crown"></i>
                    <p>Admin List</p>
                </a>
            </li>
            <li class="{{ $page == 'user' ? 'active' : ''}}">
                <a href="{{ url('admin/user') }}">
                    <i class="ti-user"></i>
                    <p>Registered User List</p>
                </a>
            </li>
            <li class="{{ $page == 'uuser' ? 'active' : ''}}">
                <a href="{{ url('admin/up_user') }}">
                    <i class="ti-credit-card"></i>
                    <p>Updated User List</p>
                </a>
            </li>
            <li class="{{ $page == 'banks' ? 'active' : ''}}">
                <a href="{{ url('admin/banks') }}">
                    <i class="ti-home"></i>
                    <p>Banks</p>
                </a>
            </li>
            <li class="{{ $page == 'schools' ? 'active' : ''}}">
                <a href="{{ url('admin/schools') }}">
                    <i class="ti-ruler-pencil"></i>
                    <p>Schools</p>
                </a>
            </li>
            <li class="{{ $page == 'business' ? 'active' : ''}}">
                <a href="{{ url('admin/business') }}">
                    <i class="ti-desktop"></i>
                    <p>Business Type</p>
                </a>
            </li>
            <li class="{{ $page == 'business_desc' ? 'active' : ''}}">
                <a href="{{ url('admin/business_desc') }}">
                    <i class="ti-thought"></i>
                    <p>Business Descriptions</p>
                </a>
            </li>
            @if ((Auth::user()->role) == 1)
            <li class="{{ $page == 'coords' ? 'active' : ''}}">
                <a href="{{ url('admin/coordinators') }}">
                    <i class="ti-hand-open"></i>
                    <p>Cordinators</p>
                </a>
            </li>
            @endif

        </ul>
    </div>
</div>