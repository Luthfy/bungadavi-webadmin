<li class="menu-title">
    <span>Bunga Davi</span>
</li>
<li class="submenu">
    <a href="#"><i class="las la-users"></i> <span> User Team</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a href="{{ url('admin/usergroup') }}">User Group</a></li>
        <li><a href="{{ url('admin/userdetail') }}">User Detail</a></li>
        <li><a href="{{ url('admin/userlog') }}">User Log</a></li>
    </ul>
</li>

<li class="submenu">
    <a href="#"><i class="la la-map"></i> <span> Location</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a href="{{ url('admin/location/country') }}">Country</a></li>
        <li><a href="{{ url('admin/location/province') }}">Province</a></li>
        <li><a href="{{ url('admin/location/city') }}">City</a></li>
        <li><a href="{{ url('admin/location/district') }}">District</a></li>
        <li><a href="{{ url('admin/location/village') }}">Village</a></li>
        <li><a href="{{ url('admin/location/zipcode') }}">Zip Code</a></li>
    </ul>
</li>

<li class="submenu">
    <a href="#"><i class="la la-users"></i> <span> Client</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a href="{{ url('admin/personal') }}">Personal</a></li>
        <li><a href="{{ url('admin/corporate') }}">Corporate</a></li>
        <li><a href="{{ url('admin/florist') }}">Florist</a></li>
    </ul>
</li>

<li class="submenu">
    <a href="#"><i class="la la-cog"></i> <span> Basic Setting</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a href="{{ url('/') }}">Setting</a></li>
        <li><a href="{{ url('admin/basicsetting/unit') }}">Unit</a></li>
        <li><a href="{{ url('admin/basicsetting/color') }}">Color</a></li>
        <li><a href="{{ url('admin/basicsetting/slidingbanner') }}">Sliding Banner</a></li>
        <li><a href="{{ url('admin/basicsetting/category') }}">Category</a></li>
        <li><a href="{{ url('admin/basicsetting/subcategory') }}">Sub Category</a></li>
        <li><a href="{{ url('admin/basicsetting/currency') }}">Currency</a></li>
        <li><a href="{{ url('admin/basicsetting/currencyrate') }}">Currency Rate</a></li>
        <li><a href="{{ url('admin/basicsetting/discount') }}">Discount</a></li>
        <li><a href="{{ url('admin/basicsetting/promotion') }}">Promotion</a></li>
        <li><a href="{{ url('/') }}">Occasion Special Price</a></li>
        <li><a href="{{ url('admin/basicsetting/ourbank') }}">Our Bank</a></li>
        <li><a href="{{ url('admin/basicsetting/payment_type') }}">Payment Type</a></li>
        <li><a href="{{ url('admin/basicsetting/midtrans') }}">Midtrans Setting</a></li>
        <li><a href="{{ url('admin/basicsetting/cardmessagecategory') }}">Card Message Category</a></li>
        <li><a href="{{ url('admin/basicsetting/cardmessagesubcategory') }}">Card Message Sub Category</a></li>
        <li><a href="{{ url('admin/basicsetting/timeslot') }}">Time Slot</a></li>
        {{-- <li><a href="{{ url('/') }}">Generate Date Time Slot</a></li>
        <li><a href="{{ url('/') }}">Date Time Slot</a></li> --}}
        <li><a href="{{ url('admin/basicsetting/deliveryremark') }}">Delivery Remark</a></li>
        <li><a href="{{ url('/') }}">Message Group</a></li>
        <li><a href="{{ url('/') }}">Icon Social Media</a></li>
        <li><a href="{{ url('/') }}">Testimonial</a></li>
    </ul>
</li>

<li class="submenu">
    <a href="#"><i class="las la-spa"></i> <span> Product Control</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a href="{{ route('stocks.index') }}">Stock</a></li>
        <li><a href="{{ route('shops.index') }}">Stock Shop</a></li>
        <li><a href="{{ route('opnames.index') }}">Stock Opname</a></li>
        <li><a href="{{ route('splits.index') }}">Stock Split</a></li>
        <li><a href="{{ route('products.index') }}">Product</a></li>
    </ul>
</li>

<li class="submenu">
    <a href="#"><i class="la la-calendar"></i> <span> Order</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a href="{{ url('admin/create_order') }}">Create Order</a></li>
        <li><a href="{{ url('admin/new_order_list') }}">New Order List</a></li>
    </ul>
</li>
<li>
    <a href="{{ url('admin/realtime_order') }}"><i class="la la-clock-o"></i> <span> Real Time Order</span> <span class="menu-arrow"></span></a>
</li>
<li class="submenu">
    <a href="#"><i class="la la-motorcycle"></i> <span>Courier</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a href="{{ url('admin/create_courier') }}">Create Courier</a></li>
        <li><a href="{{ url('admin/courier_list') }}">Courier List</a></li>
    </ul>
</li>
{{-- Bungadavi --}}
<li class="menu-title">
    <span>Bungadavi</span>
</li>

{{-- Florist --}}
<li class="menu-title">
    <span>Florist</span>
</li>

{{-- Corporate --}}
<li class="menu-title">
    <span>Corporate</span>
</li>
