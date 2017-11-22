<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="{{ url('/') }}"><img src="/img/icalogo.png"  width="auto" height="35px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            @if(!Auth::guest())
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
             @if(Auth::user()->role_id == '3')            
            <li class="nav-item">
                <a class="nav-link" href="{{ url('lecturer/dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            @endif
            @if(Auth::user()->role_id == '2')            
            <li class="nav-item">
                <a class="nav-link" href="{{ url('lecturer/dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            @endif
            @if(Auth::user()->role_id == '1')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Administrator
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ url('course/list') }}">Courses <span class="sr-only">(current)</span></a>
                    <a class="dropdown-item" href="{{ url('subject/list') }}">Subjects <span class="sr-only">(current)</span></a>
                    <a class="dropdown-item" href="{{ url('user/list') }}">Users <span class="sr-only">(current)</span></a>
                    <a class="dropdown-item" href="{{ url('ica-subject/list') }}">ICA Subject <span class="sr-only">(current)</span></a>
                
                </div>                
            </li>
            @endif
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="https://www.sparklabs.com/forum/styles/comboot/theme/images/default_avatar.jpg" class="rounded-circle" style="width: 20px; height: 20px" alt="Avatar"/> {{ Auth::user()->first_name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ url('change-password') }}">Change Password</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
            @endif
        </ul>
    </div>
</nav>    

{{-- <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Dashboard</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            @if(!Auth::guest())
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('user/list') }}">Users <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @endif
        </ul>
    </div>
</nav>    

 --}}
