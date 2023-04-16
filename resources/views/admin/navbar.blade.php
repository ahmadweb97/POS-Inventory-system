     <!-- Top Bar Start -->
     <div class="topbar">
        @php
        $setting=DB::table('settings')->first();
        $user = DB::table('users')->where('id', Auth::id())->first();

        @endphp
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="{{ url('/dashboard') }}" class="logo">
                    <img class="img-circle" src="{{ asset($setting->company_logo )}}" width="45px" height="45px" alt="">
                    <span style="font-size: 14px">{{ $setting->company_name }} </span></a>
            </div>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fa fa-bars"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>
                    <form class="navbar-form pull-left" role="search"  action="{{ url('/search') }}" method="GET">
                        <div class="form-group">
                          <input type="search" value="{{ Request::get('search') }}" class="form-control search-bar" placeholder="Search your product..." name="search" onkeypress="if(event.keyCode==13) { this.form.submit(); return false; }">
                        </div>
                      </form>


                    <ul class="nav navbar-nav navbar-right pull-right">

                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                        </li>

                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ asset('admin/images/avatar-1.jpg') }}" alt="user-img" class="img-circle"> </a>
                            <ul class="dropdown-menu">
                                @if ($user)
                                <li><a href="{{ url('profile/'.$user->id) }}"><i class="md md-face-unlock"></i> Profile</a></li>
                            @endif

                                <li><a href="{{ url('/website-settings') }}"><i class="md md-settings"></i> Settings</a></li>

                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post">
                                @csrf
                                </form></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <script>
        $(function() {
            $('#search-form input[name="searchTerm"]').on('keydown', function(event) {
                if (event.keyCode === 13) { // 13 is the code for the "Enter" key
                    event.preventDefault();
                    $('#search-form').submit();
                }
            });
        });
    </script>
