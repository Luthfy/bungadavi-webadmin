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
        <span>Affiliate Menu</span>
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
        <a href="{{ url('/') }}"><i class="fa fa-motorcycle" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Courier</span></a>
    </li>

    <li>
        <a href="{{ url('/') }}"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Recipient</span> </a>
    </li>

    <li>
        <a href="{{ url('/') }}"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Message</span> </span></a>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-cog" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Order</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('affiliate.orders.index') }}">Order List</a></li>
        </ul>
    </li>

    <li>
        <a href="{{ url('/') }}"><i class="fa fa-credit-card" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Bill IN</span> </span></a>
    </li>

    <li>
        <a href="{{ url('/') }}"><i class="fa fa-credit-card" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Bill OUT</span> </span></a>
    </li>

    <li>
        <a href="{{ url('/') }}"><i class="fa fa-tags" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Re Delivery Order</span> </span></a>
    </li>

    <li>
        <a href="{{ route('affiliate.couriertask.index') }}"><i class="fa fa-truck" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Courier Task</span> </span></a>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-files-o" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Report</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ url('admin/') }}">Order</a></li>
            <li><a href="{{ url('admin/') }}">My Order</a></li>
            <li><a href="{{ url('admin/') }}">Bill IN</a></li>
            <li><a href="{{ url('admin/') }}">Bill OUT</a></li>
        </ul>
    </li>

</ul>
