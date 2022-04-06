<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>
@role('superadmin')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i>
        <span>Users</span></a></li>
@endrole
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('doktrin') }}'><i class='nav-icon las la-file-alt'></i> Doktrin</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('doktrin-fungsi-umum') }}'><i class='nav-icon la la-question'></i> Doktrin fungsi umums</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('doktrin-fungsi-khusus') }}'><i class='nav-icon la la-question'></i> Doktrin fungsi khususes</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('jukgar') }}'><i class='nav-icon la la-question'></i> Jukgars</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('juknis') }}'><i class='nav-icon la la-question'></i> Juknis</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('jukref') }}'><i class='nav-icon la la-question'></i> Jukrefs</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('protap') }}'><i class='nav-icon la la-question'></i> Protaps</a></li>