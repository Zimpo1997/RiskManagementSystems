<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
    </div>
    <div class="header-right">
        @if (Route::has('login'))
            @auth
                <div class="user-info-dropdown">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <span class="user-icon">
                                <img src="{{ URL::to('/') }}/vendors/images/photo1.jpg" alt="" />
                            </span>
                            <span class="user-name">{{ Auth::user()->username }} </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            {{-- <a class="dropdown-item" href="faq.html"><i
                                    class="dw dw-help"></i>{{ session('role_name') }}</a> --}}
                            <span class="dropdown-item"><i class="dw dw-help"></i> Admin</span>
                            <a class="dropdown-item" href="/profile"><i class="dw dw-user1"></i> Profile</a>
                            <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"><i class="dw dw-logout"></i> Log
                                Out</a>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        @endif
    </div>
</div>
