<nav class="navbar navbar-default navbar-static-top m-b-0">

    <div class="navbar-header">



        <!-- /Logo -->



        <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"

                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="fa fa-bars"></span>

        </button>-->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

            @csrf

        </form>
        <ul class="nav navbar-top-links navbar-left pull-left">
            
            <li>
                <a href="{{ route('dashboard') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
            </li>
            <li>
                <a href="{{ route('users.all') }}" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>Users</a>
            </li>
            <li>
                <a href="{{ route('offers.all') }}" class="waves-effect"><i class="fa fa-bars fa-fw" aria-hidden="true"></i>Offers</a>
            </li>
            <li>
                <a href="{{ route('reports.all') }}" class="waves-effect"><i class="fa fa-file fa-fw" aria-hidden="true"></i>Report Management</a>
            </li>
            <li>
                <a href="{{ route('profile') }}" class="waves-effect">

                    <i class="fa fa-user fa-fw" aria-hidden="true"></i>

                    Profile

                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"

                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"

                class="waves-effect">

                 <i class="fa fa-sign-out" aria-hidden="true"></i>

                 Logout

             </a>
            </li>
        </ul>

        <ul class="nav navbar-top-links navbar-right pull-right" style="display: none">

            <li>

                <a class="profile-pic dropdown-toggle" href="javascript:;" data-toggle="dropdown">

                    <!--<img src="https://dev.bodyf1rst.com/plugins/images/users/varun.jpg" alt="user-img" width="36"-->

                    <!--     class="img-circle">-->

                    <b class="hidden-xs">{{ucfirst(auth()->user()->name)}}</b>

                    <i class="fa fa-angle-down" style="font-size:16px;"></i>

                </a>

                <div class="dropdown-menu dropdown-menu-tip-nw">

                    <a href="{{ route('profile') }}" class="dropdown-item">

                        <i class="fa fa-user fa-fw" aria-hidden="true"></i>

                        Profile

                    </a>

                  

                    <a href="{{ route('logout') }}"

                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"

                       class="dropdown-item">

                        <i class="fa fa-sign-out" aria-hidden="true"></i>

                        Logout

                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                        @csrf

                    </form>

                </div>

            </li>

        </ul>

    </div>

    <!-- /.navbar-header -->

    <!-- /.navbar-top-links -->

    <!-- /.navbar-static-side -->

</nav>