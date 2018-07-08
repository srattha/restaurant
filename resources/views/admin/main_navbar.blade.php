<!-- Main navbar -->
<div class="navbar navbar-inverse navbar-fixed-top header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/logo_light.png') }}" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img style="width: 30px; height: 30px; display: inline-block; border-radius: 50%; border: 2px solid rgba(255, 255, 255, 0.78);background-color: #fff;" src="{{ asset('customer/upload/admin/'.Auth::user()->image_file) }}" onerror="this.src='/assets/images/user_icon.png';" alt="">
                    <!-- <img src="{{ asset('assets/images/image.png') }}" alt=""> -->
                    <span>{{Auth::user()->name}}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="/profile/{{Auth::user()->id}}"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
<!-- /main navbar -->