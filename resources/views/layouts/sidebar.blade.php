<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('dashboard') }}"
            style="
    text-align: center;
    flex-direction: column;
    margin-left: 10px;
">
            <img src="{{ asset('assets/vendors/images/Untitled-1.svg') }}" alt="image" style="width:40%">
            {{-- <img src="{{ asset('assets/vendors/images/12.svg') }}"  alt=""> --}}
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="{{ route('dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">الرئيسية</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-building"></span><span class="mtext">البنوك</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('bank.index') }}">قائمة البنوك</a></li>
                        <li><a href="{{ route('bank.create') }}">إضافة بنك</a></li>
                    </ul>
                </li>

                @can('manage_user')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-add-user"></span><span class="mtext">الموظفين</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('employ.index') }}">قائمة الموظفين</a></li>

                            <li><a href="{{ route('employ.create') }}">إضافة موظف</a></li>

                        </ul>
                    </li>
                @endcan
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-group"></span><span class="mtext">الزبائن</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('customer.index') }}">قائمة الزبائن</a></li>
                        <li><a href="{{ route('customer.create') }}">إضافة زبون</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-car"></span><span class="mtext">السيارات</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('car.index') }}">قائمة السيارات</a></li>
                        <li><a href="{{ route('car.create') }}">إضافة سيارة</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-compass1"></span><span class="mtext">السائقين</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('driver.index') }}">قائمة السائقين</a></li>
                        <li><a href="{{ route('driver.create') }}">إضافة سائق</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-deal"></span><span class="mtext">العقودات</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('contract.index') }}">قائمة العقودات</a></li>
                        <li><a href="{{ route('contract.create') }}">إضافة عقد</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
