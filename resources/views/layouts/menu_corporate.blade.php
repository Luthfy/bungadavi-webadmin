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
        <span>Corporate Menu</span>
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

    <li>
        <a href="{{ url('/') }}"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Recipient</span> </span></a>
    </li>

    <li>
        <a href="{{ url('/') }}"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Message</span> </span></a>
    </li>

    <li>
        <a href="{{ url('/') }}"><i class="fa fa-pagelines" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Product</span> </span></a>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-cog" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> My Order</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ url('admin/') }}">List Order</a></li>
            <li><a href="{{ url('admin/') }}">Create Order</a></li>
        </ul>
    </li>

    <li>
        <a href="{{ url('/') }}"><i class="fa fa-credit-card" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Bill</span> </span></a>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-files-o" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Report</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ url('admin/') }}">List Report</a></li>
            <li><a href="{{ url('admin/') }}">Bill</a></li>
        </ul>
    </li>


</ul>
