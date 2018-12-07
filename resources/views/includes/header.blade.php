<h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Looking to improve your ideas?</span>
    <span class="site-heading-lower">WorkCity Naija</span>
</h1>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">WorkCity Nigeria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="{{ $page == 'index' ? 'active' : ''}} nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="{{ url('/') }}">Home
                        {{--<span class="sr-only">(current)</span>--}}
                    </a>
                </li>

                <li class="{{ $page == 'about' ? 'active' : ''}} nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="{{ url('/about') }}">About</a>
                </li>

                <li class="{{ $page == 'contact' ? 'active' : ''}} nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="{{ url('/contact') }}">Contact Us</a>
                </li>

                <li class="{{ $page == 'privacy' ? 'active' : ''}} nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="{{ url('/privacy') }}">Privacy Policy</a>
                </li>

                <li class="{{ $page == 'login' ? 'active' : ''}} nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="{{ route('login') }}">Login</a>
                </li>

                <li class="{{ $page == 'register' ? 'active' : ''}} nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>