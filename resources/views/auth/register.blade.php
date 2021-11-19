@include('../layouts.partials._header')

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="{{ URL::to('/') }}">
                    {{-- <img src="{{ URL::to('/') }}/vendors/images/deskapp-logo.svg" alt=""> --}}
                    <img src="{{ URL::to('/') }}/vendors/pictures/logo_pht.png" width="35" height="35" alt="logo"
                        class="light-logo pr-1" />
                    <span class="text-dark">{{ __('benz.nameHos') }}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-12">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title text-center">
                            <img src="vendors/pictures/logo_pht.png" alt="" class="img-fluid" width="30%"
                                width="30%">
                            <h1 class="text-center text-primary">{{ __('gobal.registertocreateaccount') }}</h1>
                        </div>
                        @if ($message = Session::get('error'))
                            <div class="alert alert-warning" role="alert">
                                {{ $message }}
                            </div>
                        @endif

                        <form action="/checkregister" method="POST">
                            @csrf
                            <label for="">{{ __('Username') }}</label>
                            <div class="input-group custom">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="off" autofocus
                                    placeholder="{{ __('Username') }}">

                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="">{{ __('Password') }}</label>
                            <div class="input-group custom">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="" required placeholder="**********">

                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-padlock1"></i></span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="">{{ __('Confirm Password') }}</label>
                            <div class="input-group custom">
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" value="" required placeholder="**********">

                                {{-- <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-padlock1"></i></span>
                                </div> --}}
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg btn-block">{{ __('gobal.register') }}</button>
                                    </div>
                                    <div class="text-right mt-1">
                                        <a href="{{ URL::to('/') }}">{{ __('gobal.login') }} ?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="{{ URL::to('/') }}/vendors/scripts/defaults/core.js"></script>
    <script src="{{ URL::to('/') }}/vendors/scripts/defaults/script.min.js"></script>
    <script src="{{ URL::to('/') }}/vendors/scripts/defaults/process.js"></script>
    <script src="{{ URL::to('/') }}/vendors/scripts/defaults/layout-settings.js"></script>
</body>

</html>
