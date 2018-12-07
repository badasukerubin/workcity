<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>

        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('admin/logs') }}">
                        <i class="ti-panel"></i>
                        <p>Logs</p>
                    </a>
                </li>


            <li>
                <a href="{{ url('admin/logout') }}">
                    <i class="ti-export"></i>
                    <p>Logout</p>
                </a>
            </li>

            </ul>

            <br><br><br><br>
            <ul class="nav">
                <li>
                    <form method="GET" role="search" action="{{ route('queries.search') }}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="search" id="search" class="form-control border-input" placeholder="Search Everything: Press Enter" value="{{ @$_GET['search'] }}">
                                    @if ($errors->has('search'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>