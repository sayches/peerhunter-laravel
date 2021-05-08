<nav class="navbar navbar-default navbar-static-top m-b-0">

    <div class="navbar-header">

        <div class="top-left-part">

            <!-- Logo -->

            <a class="logo" href="/">

                <!-- Logo icon image, you can use font-icon also -->

                <b>

                    <!--This is dark logo icon-->
                    PH
                    <!-- <img src="{{asset('assets/images/fav.jpg')}}" alt="home" width="50px" style="width: 50px;height:50px" class="dark-logoos"/>-->

                </b>

                <!-- Logo text image you can use text also -->

                <span class="hidden-xs">

                    <!--This is dark logo text-->

                    <img src="{{asset('assets/images/logo.png')}}" style="width:200px;" alt="home" class="dark-logo"/>

                    <!--This is light logo text-->

                    <img src="{{asset('assets/images/logo.png')}}"alt="home" class="light-logo" style="width:200px;"/>

                 </span>

            </a>

        </div>

        <!-- /Logo -->



        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"

                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="fa fa-bars"></span>

        </button>

        <ul class="nav navbar-top-links navbar-right pull-right">

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