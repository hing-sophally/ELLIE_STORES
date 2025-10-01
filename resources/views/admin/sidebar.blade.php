<div class="main-sidebar shadow">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand text-center py-4">
            <a href="{{ route('dashboard.index') }}" class="text-white font-weight-bold" style="font-size: 1.4rem;">
                Ellie Store
            </a>
        </div>

        <div class="sidebar-user text-center my-3">
            <img alt="image" src="{{ asset('dist/img/avatar/avatar-1.jpeg') }}" class="rounded-circle mb-2" width="70">
            <div class="user-name text-white font-weight-bold">{{ Auth::user()->name ?? 'Admin' }}</div>
            <div class="user-role text-white small">Store Administrator</div>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <i class="ion ion-speedometer"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Store Management</li>

            <!-- Category -->
            <li class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <a href="#" class="has-dropdown">
                    <i class="ion ion-ios-pricetag-outline"></i> <span>Categories</span>
                </a>
                <ul class="menu-dropdown">
                    <li><a href="{{ route('admin.categories.index') }}">All Categories</a></li>
                    <li><a href="{{ route('admin.categories.create') }}">Add Category</a></li>
                </ul>
            </li>

            <!-- Products -->
            <li class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <a href="#" class="has-dropdown">
                    <i class="ion ion-ios-pricetag-outline"></i> <span>Products</span>
                </a>
                <ul class="menu-dropdown">
                    <li><a href="{{ route('admin.products.index') }}">All Products</a></li>
                    <li><a href="{{ route('admin.products.create') }}">Add Product</a></li>
                </ul>
            </li>

            <!-- Orders -->
            <li class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <a href="#" class="has-dropdown">
                    <i class="ion ion-ios-cart-outline"></i> <span>Orders</span>
                </a>
                <ul class="menu-dropdown">
                    <li><a href="{{ route('admin.orders.index') }}">All Orders</a></li>
                    <li><a href="{{ route('admin.orders.pending') }}">Pending</a></li>
                    <li><a href="{{ route('admin.orders.processing') }}">Processing</a></li>
                    <li><a href="{{ route('admin.orders.completed') }}">Completed</a></li>
                    <li><a href="{{ route('admin.orders.cancelled') }}">Cancelled</a></li>
                </ul>
            </li>
        </ul>

        <div class="mt-4 p-3">
            <a href="{{ route('logout') }}" class="btn btn-danger btn-block btn-shadow"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>
