
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{asset('/master/')}}/img/profile_small.html"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{auth()->user()['name']}}</span>
                        <span class="text-muted text-xs block">Admin<b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="{{route('admin.profile')}}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('admin.loginSettings')}}">Login Settings</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="{{($seg2=="")?'active':''}}">
                <a href="{{adminUrl()}}">
                    <i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li class="{{($seg2=="users")?"active":''}}">
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{($seg2=="users" && $seg3=="create"?"active":'')}}"><a href="{{route('users.createNewUser')}}">Add New</a></li>
                    <li class="{{($seg2=="users" && $seg3=="list" || $seg3=="edit")?"active":''}}"><a href="{{route('users.listUser')}}">Users</a></li>
                    <li class="{{($seg2=="users" && $seg3=="reseller-list")?"active":''}}"><a href="{{route('users.reseller_list')}}">Reseller</a></li>
                   {{-- <li class="{{($seg2=="users" && $seg3=="reseller-payments")?"active":''}}"><a href="{{route('users.resellerPayments')}}">Reseller Account Credits</a></li>--}}
                </ul>
            </li>
            <li class="{{($seg2=="accounts")?"active":''}}">
                <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Accounts Plans</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{($seg2=="accounts" && $seg3=="create")?"active":''}}"><a href="{{route('accounts.create')}}">Add New</a></li>
                    <li class="{{($seg2=="accounts" && $seg3=="list" || $seg3=="edit")?"active":''}}"><a href="{{route('accounts.list')}}">List</a></li>

                </ul>
            </li>
            <li class="{{($seg2=="funds")?"active":''}}">
                <a href="#"><i class="fa fa-bank"></i> <span class="nav-label">Funds</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{($seg2=="funds" && $seg3=="create")?"active":''}}"><a href="{{route('admin.funds.create')}}">Add New</a></li>
                    <li class="{{($seg2=="funds" && $seg3=="list" || $seg3=="edit")?"active":''}}"><a href="{{route('admin.funds.list')}}">Log</a></li>

                </ul>
            </li>
            <li class="{{($seg2=="general-settings")?"active":''}}">
                <a href="#"><i class="fa fa-cog"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{($seg2=="general-settings")?"active":''}}"><a href="{{route('admin.general_settings')}}">General</a></li>

                </ul>
            </li>
        </ul>

    </div>
</nav>