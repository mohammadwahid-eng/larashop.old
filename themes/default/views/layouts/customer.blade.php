@section('title')
    {{ __("My Account") }}
@endsection
<x-app-layout>
    <div class="container">
        <div class="row">
            <!--Sidebar-->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar">
                @include('customer.sidebar')
            </div>
            <!--End Sidebar-->
            
            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{ $slot }}
            </div>
            <!--End Main Content-->
        </div>
    </div>
</x-app-layout>