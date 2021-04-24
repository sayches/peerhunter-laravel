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

    </ul>

</div>