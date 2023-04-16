{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

</x-guest-layout> --}}
<x-guest-layout>

<link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />

<!-- Font Icons -->
<link href="{{ asset('admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

<!-- animate css -->
<link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet" />

<!-- Waves-effect -->
<link href="{{ asset('admin/css/waves-effect.css') }}" rel="stylesheet">

<!-- sweet alerts -->
{{--   <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet"> --}}

<!-- Custom Files -->
<link href="{{ asset('admin/css/helper.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" />


<script src="{{ asset('admin/js/modernizr.min.js') }}"></script>

@livewireStyles



    <div class="wrapper-page">
        <div class="panel panel-color panel-primary panel-pages">
            <div class="panel-heading bg-img">
                <div class="bg-overlay"></div>
                <h3 class="text-center m-t-10 text-white"> <strong>Inventory System</strong> </h3>

            </div>


            <div class="panel-body">

            <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control input-lg " type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email Address">
                    </div>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>

                    @endif
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password" class="form-control input-lg" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                    </div>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>

                    @endif
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="remember" type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : '' }}" >
                            <label for="checkbox-signup">
                                Remember me
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-pink btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group m-t-30">
                    <div class="col-sm-7">
                        <a href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                    <div class="col-sm-5 text-right">
                        <a href="{{ route('register') }}">Create an account</a>
                    </div>
                </div>
            </form>
            </div>

        </div>
    </div>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/waves.js') }}"></script>
    <script src="{{ asset('admin/js/wow.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('admin/assets/chat/moment-2') }}.2.1.js"></script>
    <script src="{{ asset('admin/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-detectmobile/detect.js') }}"></script>
    <script src="{{ asset('admin/assets/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

    <!-- sweet alerts -->
    <script src="{{ asset('admin/assets/sweet-alert/sweet') }}-alert.min.js"></script>
    <script src="{{ asset('admin/assets/sweet-alert/sweet') }}-alert.init.js"></script>

    <!-- flot Chart -->
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('admin/assets/flot-chart/jquery.flot.crosshair.js') }}"></script>

    <!-- Counter-up -->
    <script src="{{ asset('admin/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('admin/js/jquery.app.js') }}"></script>

    <!-- Dashboard -->
    <script src="{{ asset('admin/js/jquery.dashboard.js') }}"></script>

    <!-- Chat -->
    <script src="{{ asset('admin/js/jquery.chat.js') }}"></script>

    <!-- Todo -->
    <script src="{{ asset('admin/js/jquery.todo.js') }}"></script>


    @stack('scripts')
    @livewireScripts

</x-guest-layout>
