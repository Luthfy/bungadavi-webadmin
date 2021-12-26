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

    <li class="submenu">
        <a href="#">
            <i class="fa fa-map-o" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Location</span>
            <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ url('bungadavi/location/country') }}">Country</a></li>
            <li><a href="{{ url('bungadavi/location/province') }}">Province</a></li>
            <li><a href="{{ url('bungadavi/location/city') }}">City</a></li>
            <li><a href="{{ url('bungadavi/location/district') }}">District</a></li>
            <li><a href="{{ url('bungadavi/location/village') }}">Village</a></li>
            <li><a href="{{ url('bungadavi/location/zipcode') }}">Zip Code</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-user-o" aria-hidden="true" style="font-size: 1.2em !important;"></i> <span> Client</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ url('admin/') }}">Personal</a></li>
            <li><a href="{{ url('admin/') }}">Corporate</a></li>
            <li><a href="{{ url('admin/') }}">Florist</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-cog" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Basic Setting</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ url('admin/') }}">Setting</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/unit') }}">Unit</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/color') }}">Color</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/slidingbanner') }}">Sliding Banner</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/category') }}">Category</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/subcategory') }}">Sub Category</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/currency') }}">Currency</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/currencyrate') }}">Currency Rate</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/discount') }}">Discount</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/promotion') }}">Promotion</a></li>
            <li><a href="{{ url('admin/') }}">Occasion Special Price</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/ourbank') }}">Our Bank</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/payment_type') }}">Payment Type</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/midtrans') }}">Midtrans Setting</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/cardmessagecategory') }}">Card Message Category</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/cardmessagesubcategory') }}">Card Message Sub Category</a></li>
            <li><a href="{{ url('bungadavi/basicsetting/timeslot') }}">Time Slot</a></li>
            <li><a href="{{ url('admin/') }}">Delivery Remark</a></li>
            <li><a href="{{ url('admin/') }}">Message Group</a></li>
            <li><a href="{{ url('admin/') }}">Icon Social Media</a></li>
            <li><a href="{{ url('admin/') }}">Testimonial</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-wrench" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Product Control</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="#">Stock</a></li>
            <li><a href="#">Stock Shop</a></li>
            <li><a href="#">Stock Opname</a></li>
            <li><a href="#">Stock Split</a></li>
            <li><a href="#">Product</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-calendar" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Order</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ url('admin/') }}">Create Order</a></li>
            <li><a href="{{ url('admin/') }}">New Order List</a></li>
        </ul>
    </li>
    <li>
        <a href="{{ url('/') }}"><i class="fa fa-clock-o" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Real Time Order</span> <span class="menu-arrow"></span></a>
    </li>
    <li class="submenu">
        <a href="#"><i class="fa fa-motorcycle" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span>Courier</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ url('admin/') }}">Create Courier</a></li>
            <li><a href="{{ url('admin/') }}">Courier List</a></li>
        </ul>
    </li>

</ul>
