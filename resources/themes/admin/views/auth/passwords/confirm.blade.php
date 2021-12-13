@extends('layouts.guest')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Confirm Password') }}</div>

                    <div class="card-body">
                        {{ __('Please confirm your password before continuing.') }}

                        <form method="POST" action="{{ route('admin.password.confirm') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right required">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') error @enderror" name="password" required autocomplete="current-password" autofocus>

                                    @error('password')
                                        <label id="password-error" class="error" for="password">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-0 form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm Password') }}
                                    </button>

                                    @if (Route::has('admin.password.request'))
                                        <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer')
    <script>
        (function($) {
            $("form").validate({
                rules: {
                    password: {
                        minlength: 8
                    }
                },
            });
        }(jQuery))
    </script>
@endpush