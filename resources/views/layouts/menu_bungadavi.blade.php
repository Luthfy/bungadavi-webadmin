<ul>
    <li class="menu-title">
        <span>Main</span>
    </li>
    <li class="submenu">
        <a href="{{ route('bungadavi.dashboard') }}">
            <i class="fa fa-tachometer pull-left" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Dashboard</span>
        </a>
    </li>

    <li class="menu-title">
        <span>Bunga Davi</span>
    </li>
    <li class="submenu">
        <a href="#">
            <i class="fa fa-users pull-left" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> User Team</span>
            <span class="menu-arrow"></span>
        </a>
        <ul style="display: none;">
            <li><a href="{{ url('admin/usergroup') }}">User Group</a></li>
            <li><a href="{{ url('admin/userdetail') }}">User Detail</a></li>
            <li><a href="{{ url('admin/userlog') }}">User Log</a></li>
        </ul>
    </li>

</ul>
