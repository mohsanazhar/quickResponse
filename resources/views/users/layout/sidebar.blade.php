
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{asset('/master/')}}/img/profile_small.html"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{auth()->user()['name']}}</span>
                        <span class="text-muted text-xs block">{{ucwords(auth()->user()['user_type'])}}<b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="{{route('users.profile')}}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('users.settings')}}">Settings</a></li>
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
                <a href="{{userUrl()}}">
                    <i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li class="{{($seg2=="recipients")?'active':''}}">
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Recipients</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{($seg2=="recipients" && $seg3=='create')?'active':''}}"><a href="{{route('recipients.create')}}">Add New</a></li>
                    <li class="{{($seg2=="recipients" && ($seg3=='list' || $seg3=="edit"))?'active':''}}"><a href="{{route('recipients.list')}}">List</a></li>

                </ul>
            </li>
            <li class="{{($seg2=="messages")?'active':''}}">
                <a href="#"><i class="fa fa-comment"></i> <span class="nav-label">Messages</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{($seg2=="messages" && $seg3=='create')?'active':''}}"><a href="{{route('messages.create')}}">Create</a></li>
                    <li class="{{($seg2=="messages" && ($seg3=='list'))?'active':''}}"><a href="{{route('messages.list')}}">List</a></li>

                </ul>
            </li>
            <li class="{{($seg2=="settings")?'active':''}}">
                <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{($seg2=="settings" && $seg3=='profile')?'active':''}}"><a href="{{route('users.profile')}}">Profile</a></li>
                    <li class="{{($seg2=="settings" && $seg3=='password')?'active':''}}"><a href="{{route('users.settings')}}">Password</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>