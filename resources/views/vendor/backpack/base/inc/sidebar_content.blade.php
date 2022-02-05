<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('scan-history') }}'><i class='nav-icon las la-history'></i> Scan Histories</a></li>
@role('superadmin')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('q-r-code') }}'><i class='nav-icon las la-qrcode'></i> QR Codes</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i>
        <span>Users</span></a></li>
@endrole