@section('title')
    {{ __('Confirm Password') }}
@endsection

<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4">
                    <div class="alert alert-info rounded-0" role="alert">
                        {{ __('Please confirm your password before continuing.') }}
                    </div>
                    <form method="POST" action="{{ route('customer.password.confirm') }}">
                        @csrf
                        
                        <div class="row">                            
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autofocus>
                                    @error('password')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="{{ __('Confirm') }}">
                                @if (Route::has('customer.password.request'))
                                    <p class="mb-4">
                                        {{ __('Forgot your password?') }} <a href="{{ route('customer.password.request') }}"><u>{{ __('Click here') }}</u></a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
