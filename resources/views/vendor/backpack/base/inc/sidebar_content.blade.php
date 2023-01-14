<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
Stratifikasi Doktrin</a></li>
<li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i
            class="nav-icon las la-server"></i> Doktrin</a>
    <ul class="nav-dropdown-items">
    <li class='nav-item' style="padding-left: 0.1rem; font-weight: 300;"><a class='nav-link' href='{{ backpack_url('doktrin-jalesveva-jayamahe') }}'><i class='nav-icon las la-ship'></i> Doktrin Jalesveva Jayamahe</a></li>
        <li class='nav-item' style="padding-left: 0.1rem; font-weight: 300;"><a class='nav-link' href='{{ backpack_url('doktrin') }}'><i
                    class='nav-icon las la-file-alt'></i>
                Doktrin Operasi</a></li>
        <li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"
                style="padding-left: 1.1rem;"><i class="nav-icon las la-restroom"></i> Doktrin Fungsi</a>
            <ul class="nav-dropdown-items">
                <li class='nav-item' style="padding-left: 0.3rem; font-weight: 300;"><a class='nav-link'
                        href='{{ backpack_url('doktrin-fungsi-umum') }}'><i class='nav-icon las la-file-alt'></i> Doktrin
                        Fungsi Umum</a></li>
                <li class='nav-item' style="padding-left: 0.3rem; font-weight: 300;"><a class='nav-link'
                        href='{{ backpack_url('doktrin-fungsi-khusus') }}'><i class='nav-icon las la-file-alt'></i>
                        Doktrin
                        Fungsi Khusus</a></li>
            </ul>
        </li>
    </ul>
</li>
<li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i
            class="nav-icon las la-server"></i> Petunjuk</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item' style="padding-left: 0.1rem; font-weight: 300;"><a class='nav-link' href='{{ backpack_url('jukgar') }}'><i
                    class='nav-icon las la-file-alt'></i>
                Jukgar</a></li>
        <li class='nav-item' style="padding-left: 0.1rem; font-weight: 300;"><a class='nav-link' href='{{ backpack_url('juknis') }}'><i
                    class='nav-icon las la-file-alt'></i>
                Juknis</a></li>
        <li class='nav-item' style="padding-left: 0.1rem; font-weight: 300;"><a class='nav-link' href='{{ backpack_url('jukref') }}'><i
                    class='nav-icon las la-file-alt'></i>
                Jukref</a></li>
        <li class='nav-item' style="padding-left: 0.1rem; font-weight: 300;"><a class='nav-link' href='{{ backpack_url('protap') }}'><i
                    class='nav-icon las la-file-alt'></i>
                Protap</a></li>
    </ul>
</li>
@role('superadmin')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i>
        <span>Users</span></a></li>
@endrole

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('bidang') }}'><i class='nav-icon la la-question'></i> Bidangs</a></li>
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('petunjuk') }}'><i class='nav-icon la la-question'></i> Petunjuks</a></li> -->