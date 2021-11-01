@section('title')
    {{ __('Verify Your Email Address') }}
@endsection

<x-guest-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success rounded-0" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('customer.verification.send') }}">
                    @csrf
                    <button type="submit" class="px-2 py-0 m-0 btn btn-light border-0 text-capitalize">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
