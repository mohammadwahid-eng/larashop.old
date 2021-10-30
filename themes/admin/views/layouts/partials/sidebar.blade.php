<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.home') }}">Larashop</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.home') }}"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" fill="#394eea" viewBox="0 -0.114 49.742 51.317" xmlns:v="https://vecta.io/nano"><path d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25a.8.8 0 0 1-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334a.82.82 0 0 1 .028-.21c.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093s.053-.04.079-.06.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068s.055.038.078.06c.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51a.81.81 0 0 1 .028-.208c.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06s.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068l.077.06c.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216zM1.602 7.719v31.068L19.22 48.93v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066s-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084s-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1s-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09V12.33L4.965 9.654 1.602 7.72zm8.81-5.994L2.405 6.334l8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764l4.645-2.674V7.719l-3.363 1.936-4.646 2.675v20.096zM39.243 7.164l-8.006 4.609 8.006 4.609 8.005-4.61zm-.801 10.605l-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937zM20.02 38.33l11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833z"/></svg></a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Navigation') }}</li>
            <li>
                <a class="nav-link" href="{{ route('admin.home') }}"><i class="fas fa-home"></i><span>{{ __('Dashboard') }}</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cubes"></i> <span>Products</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">All Products</a></li>
                    <li><a class="nav-link" href="#">Add New</a></li>
                    <li><a class="nav-link" href="#">Categories</a></li>
                    <li><a class="nav-link" href="#">Tags</a></li>
                    <li><a class="nav-link" href="#">Attributes</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store"></i> <span>Shop</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Orders</a></li>
                    <li><a class="nav-link" href="#">Coupons</a></li>
                    <li><a class="nav-link" href="#">Settings</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-wallet"></i> <span>Payment Getways</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Stripe</a></li>
                    <li><a class="nav-link" href="#">PayPal</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-sliders-h"></i> <span>Settings</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">General</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>