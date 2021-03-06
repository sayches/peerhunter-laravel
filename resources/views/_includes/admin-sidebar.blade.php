<div class="sidebar-nav slimscrollsidebar">

    <div class="sidebar-head">

        <h3>

        	<span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span>

        	<span class="hide-menu">Navigation</span>

        </h3>

    </div>

    <ul class="nav" id="side-menu">

        <li style="padding: 70px 0 0;">

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
            <a href="{{ route('profile') }}" class="dropdown-item">

                <i class="fa fa-user fa-fw" aria-hidden="true"></i>

                Profile

            </a>

        </li>
        <li>
            <a href="{{ route('logout') }}"

            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"

            class="dropdown-item">

             <i class="fa fa-sign-out" aria-hidden="true"></i>

             Logout

         </a>
        </li>

    </ul>

</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

    @csrf

</form>