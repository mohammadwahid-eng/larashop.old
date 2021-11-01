@section('title')
	{{ __('Reset Password') }}
@endsection

<x-guest-layout>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
				<div class="mb-4">
					<form method="POST" action="{{ route('customer.password.update') }}">
						@csrf

						<input type="hidden" name="token" value="{{ request()->token }}">

						<div class="row">                            
							<div class="col-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label for="email">{{ __('E-Mail Address') }}</label>
									<input id="email" type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
									@error('email')
										<span class="invalid-feedback"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label for="password">{{ __('Password') }}</label>
									<input id="password" type="password" class="form-control rounded-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
									@error('password')
										<span class="invalid-feedback"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label for="password-confirm">{{ __('Confirm Password') }}</label>
									<input id="password-confirm" type="password" class="form-control rounded-0 @error('password-confirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
								<input type="submit" class="btn mb-3" value="{{ __('Reset Now') }}">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</x-guest-layout>
