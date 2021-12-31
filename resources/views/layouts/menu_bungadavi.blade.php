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
            <li><a href="{{ route('bungadavi.country.index') }}">Country</a></li>
            <li><a href="{{ route('bungadavi.province.index') }}">Province</a></li>
            <li><a href="{{ route('bungadavi.city.index') }}">City</a></li>
            <li><a href="{{ route('bungadavi.district.index') }}">District</a></li>
            <li><a href="{{ route('bungadavi.village.index') }}">Village</a></li>
            <li><a href="{{ route('bungadavi.zipcode.index') }}">Zip Code</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-user-o" aria-hidden="true" style="font-size: 1.2em !important;"></i> <span> Client</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('bungadavi.personal.index') }}">Personal</a></li>
            <li><a href="{{ route('bungadavi.personalrecipient.index') }}">Personal Recipient</a></li>
            <li><a href="{{ route('bungadavi.corporate.index') }}">Corporate</a></li>
            <li><a href="{{ route('bungadavi.florist.index') }}">Florist</a></li>
            <li><a href="{{ route('bungadavi.floristrecipient.index') }}">Florist Recipient</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-cog" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Basic Setting</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ url('admin/') }}">Setting</a></li>
            <li><a href="{{ route('bungadavi.unit.index') }}">Unit</a></li>
            <li><a href="{{ route('bungadavi.color.index') }}">Color</a></li>
            <li><a href="{{ route('bungadavi.slidingbanner.index') }}">Sliding Banner</a></li>
            <li><a href="{{ route('bungadavi.category.index') }}">Category</a></li>
            <li><a href="{{ route('bungadavi.subcategory.index') }}">Sub Category</a></li>
            <li><a href="{{ route('bungadavi.currency.index') }}">Currency</a></li>
            <li><a href="{{ route('bungadavi.currencyrate.index') }}">Currency Rate</a></li>
            <li><a href="{{ route('bungadavi.discount.index') }}">Discount</a></li>
            <li><a href="{{ route('bungadavi.promotion.index') }}">Promotion</a></li>
            <li><a href="{{ url('admin/') }}">Occasion Special Price</a></li>
            <li><a href="{{ route('bungadavi.ourbank.index') }}">Our Bank</a></li>
            <li><a href="{{ route('bungadavi.paymenttype.index') }}">Payment Type</a></li>
            <li><a href="{{ route('bungadavi.paymenttype.index') }}">Midtrans Setting</a></li>
            <li><a href="{{ route('bungadavi.cardmessagecategory.index') }}">Card Message Category</a></li>
            <li><a href="{{ route('bungadavi.cardmessagesubcategory.index') }}">Card Message Sub Category</a></li>
            <li><a href="{{ route('bungadavi.timeslot.index') }}">Time Slot</a></li>
            <li><a href="{{ route('bungadavi.deliveryremark.index') }}">Delivery Remark</a></li>
            <li><a href="{{ url('admin/') }}">Message Group</a></li>
            <li><a href="{{ url('admin/') }}">Icon Social Media</a></li>
            <li><a href="{{ url('admin/') }}">Testimonial</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-archive" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Stock Control</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('bungadavi.stocks.index') }}">Stock</a></li>
            <li><a href="{{ route('bungadavi.shops.index') }}">Stock Shop</a></li>
            <li><a href="{{ route('bungadavi.opnames.index') }}">Stock Opname</a></li>
            <li><a href="{{ route('bungadavi.splits.index') }}">Stock Split</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-wrench" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Product Control</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('bungadavi.products.index') }}">Product</a></li>
        </ul>
    </li>

    <li class="submenu">
        <a href="#"><i class="fa fa-calendar" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Order</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('bungadavi.orders.create') }}">Create Order</a></li>
            <li><a href="{{ route('bungadavi.orders.index') }}">Order List</a></li>
        </ul>
    </li>
    <li>
        <a href="{{ route('bungadavi.orders.realtimeorder') }}"><i class="fa fa-clock-o" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span> Real Time Order</span></a>
    </li>
    <li class="submenu">
        <a href="#"><i class="fa fa-motorcycle" aria-hidden="true" style="font-size: 1.2em !important;"></i>
            <span>Courier</span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li><a href="{{ route('bungadavi.courier.index') }}">Create Courier</a></li>
            <li><a href="{{ route('bungadavi.courier.index') }}">Courier List</a></li>
        </ul>
    </li>

</ul>
