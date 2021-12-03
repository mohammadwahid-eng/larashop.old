@extends('layouts.app')

@section('title')
	{{ __('Create Attribute') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('admin.attributes.create') }}
@endsection

@section('content')
	<section class="section">
		<div class="section-body">
			<form action="{{ route('admin.attributes.store') }}" method="POST" class="card">
				@csrf
				<div class="card-body pb-0">
					<div class="form-group">
						<label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" data-slugify="#slug" required>
						@error('name')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('The name is how it appears on your site.') }}</small>
					</div>
					<div class="form-group">
						<label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
						<input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
						@error('slug')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.') }}</small>
					</div>
					<div class="form-group">
						<label for="frontend_type">{{ __('Frontend Type') }} <span class="text-danger">*</span></label>
						<select name="frontend_type" id="frontend_type" class="form-control @error('frontend_type') is-invalid @enderror" required>
							<option value="">{{ __('Select an option') }}</option>
							@foreach (['select', 'checkbox', 'radio'] as $type)
								<option value="{{ $type }}" @if($type == old('frontend_type')) selected @endif>{{ ucfirst($type) }}</option>
							@endforeach
						</select>
						@error('frontend_type')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('The "frontend type" is the type of the field that will appear in frontend.') }}</small>
					</div>
				</div>
				<div class="card-footer pt-0 d-flex justify-content-between">
					<div>
						<button class="btn btn-primary mr-1" type="submit">{{ __('Create Attribute') }}</button>
						<a href="{{ route('admin.attributes.index') }}" class="btn btn-danger">{{ __('Back') }}</a>
					</div>
					<button class="btn btn-dark" type="reset">{{ __('Reset Form') }}</button>
				</div>
			</form>
		</div>
	</section>
@endsection