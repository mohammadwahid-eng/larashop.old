@extends('layouts.app')

@section('title')
	{{ __('Edit Attribute') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('admin.attributes.edit', $attribute) }}
@endsection

@section('content')
	<section class="section">
		<div class="section-body">
			<form action="{{ route('admin.attributes.update', $attribute) }}" method="POST" class="card">
				@csrf
				@method('PUT')
				<div class="card-body pb-0">
					<div class="form-group">
						<label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $attribute->name }}" data-slugify="#slug" required>
						@error('name')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('The name is how it appears on your site.') }}</small>
					</div>
					<div class="form-group">
						<label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
						<input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') ?? $attribute->slug }}" required>
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
								<option value="{{ $type }}" @if($type == (old('frontend_type') ?? $attribute->frontend_type)) selected @endif>{{ ucfirst($type) }}</option>
							@endforeach
						</select>
						@error('frontend_type')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('The "frontend type" is the type of the field that will appear in frontend.') }}</small>
					</div>
				</div>
				<div class="card-footer pt-0">
					<button class="btn btn-primary mr-1" type="submit">{{ __('Update Attribute') }}</button>
					<a href="{{ route('admin.attributes.index') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
				</div>
			</form>
		</div>
	</section>
@endsection