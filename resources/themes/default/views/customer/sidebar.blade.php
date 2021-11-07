<div class="sidebar_tags">
    <div class="sidebar_widget">
        <div class="widget-content">
            <ul>
                <li><a href="{{ route('customer.home') }}">{{ __('Dashboard') }}</a></li>
                <li><a href="{{ route('customer.orders') }}">{{ __('Orders') }}</a></li>
                <li><a href="{{ route('customer.downloads') }}">{{ __('Downloads') }}</a></li>
                <li><a href="{{ route('customer.addresses') }}">{{ __('Addresses') }}</a></li>
                <li><a href="{{ route('customer.payment_methods') }}">{{ __('Payment Methods') }}</a></li>
                <li><a href="{{ route('customer.account') }}">{{ __('Account Details') }}</a></li>
                <li><a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
            </ul>
        </div>
    </div>
</div>