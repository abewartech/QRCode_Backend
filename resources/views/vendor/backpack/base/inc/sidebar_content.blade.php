<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('statistics') }}'><i class='nav-icon la la-chart-bar'></i> Statistics</a></li>
@role('superadmin')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i>
        <span>Users</span></a></li>
@endrole


<li class='nav-item'><a class='nav-link' href='{{ backpack_url('attendance') }}'><i class='nav-icon la la-database'></i> Attendances</a></li>
