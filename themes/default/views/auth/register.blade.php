@section('title')
    {{ __('Create an account') }}
@endsection

<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4">
                    <form method="POST" action="{{ route('customer.registration') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="first_name">{{ __('First Name') }} <span class="text-danger">*</span></label>
                                    <input id="first_name" type="text" class="form-control rounded-0 @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="given-name" autofocus>
                                    @error('first_name')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="last_name">{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                    <input id="last_name" type="text" class="form-control rounded-0 @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name">
                                    @error('last_name')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }} <span class="text-danger">*</span></label>
                                    <input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }} <span class="text-danger">*</span></label>
                                    <input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                    <input id="password-confirm" type="password" class="form-control rounded-0 @error('password-confirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-check">
                                    <label class="form-check-label padding-15px-left">
                                        <input type="checkbox" name="agree" class="form-check-input @error('agree') is-invalid @enderror" required {{ old('agree') ? 'checked' : '' }}> {{ __('I agree with the') }} <a href="{{ route('terms') }}">{{ __('Terms of Service') }}</a>
                                        @error('agree')
                                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="{{ __('Create') }}">
                                @if (Route::has('customer.login'))
                                    <p class="mb-4">
                                        {{ __('Already have an account?') }} <a href="{{ route('customer.login') }}"><u>{{ __('Login now') }}</u></a>
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
