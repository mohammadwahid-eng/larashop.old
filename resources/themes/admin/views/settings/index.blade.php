@extends('layouts.app')

@section('title')
	{{ __('Settings') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('admin.settings.index') }}
@endsection

@section('content')
	<section class="section">
		<div class="section-body">
			<form action="{{ route('admin.settings.update') }}" method="POST" class="card">
				@csrf
				@method('PUT')
				<div class="card-body pb-0">
					<div class="form-group">
						<label for="site_title">{{ __('Site Title') }}</label>
						<input type="text" class="form-control @error('site_title') is-invalid @enderror" id="site_title" name="site_title" value="{{ old('site_title') ?? Setting::get('site_title') }}">
						@error('site_title')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="tagline">{{ __('Tagline') }}</label>
						<input type="text" class="form-control @error('tagline') is-invalid @enderror" id="tagline" name="tagline" value="{{ old('tagline') ?? Setting::get('tagline') }}">
						@error('tagline')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('In a few words, explain what this site is about.') }}</small>
					</div>
				</div>
				<div class="card-footer pt-0">
					<button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
				</div>
			</form>
		</div>
	</section>
@endsection