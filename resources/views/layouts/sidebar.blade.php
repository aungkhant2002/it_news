<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center">
                    <span class="bg-primary p-2 rounded d-flex justify-content-center align-items-center mr-2">
                        <i class="feather-shopping-bag text-white h4 mb-0"></i>
                    </span>
            <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary">My Shop</span>
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <x-menu-spacer/>
            <x-menu-item class="feather-home" link="{{ route('home') }}" name="Home"/>
            <x-menu-spacer/>

            <x-menu-title title="Item Management"/>
            <x-menu-item class="feather-plus-circle" name="Add Item"/>
            <x-menu-item class="feather-list" name="Item Lists" counter="15"/>
            <x-menu-spacer/>
            <li class="menu-item">
                <a href="{{ route('logout') }}" class="btn btn-outline-primary w-100" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </li>
        </ul>
    </div>
</div>
