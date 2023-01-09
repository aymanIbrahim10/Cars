<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>

    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-name">{{ auth()->user()->name }}</span>
                    <span class="user-icon">
                        @if (auth()->user()->picture == '')
                            <img src="{{ asset('assets/vendors/images/Avatar-Profile-Vector-PNG.png') }}" alt="pic"
                                style="height: 52px;width: 52px;">
                        @else
                            <img src="{{ asset(auth()->user()->picture) }}" alt="pic"
                                style="height: 52px;width: 52px;">
                        @endif

                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{ route('employ.edit', auth()->user()->id) }}"><i
                            class="dw dw-user1"></i> الصفحة الشخصية</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" class="dropdown-item"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                            <i class="dw dw-logout"></i> تسجيل الخروج
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
