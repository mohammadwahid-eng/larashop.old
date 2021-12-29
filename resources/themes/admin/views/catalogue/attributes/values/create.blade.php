@extends('layouts.app')

@section('title')
	{{ __('Create ') . $attribute->name }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('admin.attributes.values.create', $attribute) }}
@endsection

@section('content')
	<section class="section">
		<div class="section-body">
			<form action="{{ route('admin.attributes.values.store', $attribute) }}" method="POST" class="card">
				@csrf
				<input type="hidden" name="attribute_id" value="{{ $attribute->id }}" required>
				<div class="card-body pb-0">
					<div class="form-group">
						<label for="name" class="required">{{ __('Name') }}</label>
						<input type="text" class="form-control @error('name') error @enderror" id="name" name="name" value="{{ old('name') }}" data-slugify="#slug" required>
						@error('name')
							<label id="name-error" class="error" for="name">{{ $message }}</label>
						@enderror
						<small class="form-text text-muted">{{ __('The name is how it appears on your site.') }}</small>
					</div>
					<div class="form-group">
						<label for="slug" class="required">{{ __('Slug') }}</label>
						<input type="text" class="form-control @error('slug') error @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
						@error('slug')
							<label id="slug-error" class="error" for="slug">{{ $message }}</label>
						@enderror
						<small class="form-text text-muted">{{ __('The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.') }}</small>
					</div>					
					<div class="form-group">
						<label for="description">{{ __('Description') }}</label>
						<textarea name="description" id="description" class="form-control @error('description') error @enderror">{{ old('description') }}</textarea>
						@error('description')
							<label id="description-error" class="error" for="description">{{ $message }}</label>
						@enderror
						<small class="form-text text-muted">{{ __('The description is not prominent by default; however, some themes may show it.') }}</small>
					</div>
				</div>
				<div class="card-footer pt-0 d-flex justify-content-between">
					<div>
						<button class="btn btn-primary mr-1" type="submit">{{ __('Create ') . $attribute->name }}</button>
						<a href="{{ route('admin.attributes.values.index', $attribute) }}" class="btn btn-danger">{{ __('Back') }}</a>
					</div>
					<button class="btn btn-dark" type="reset">{{ __('Reset Form') }}</button>
				</div>
			</form>
		</div>
	</section>
@endsection

@push('footer')
    <script>
        (function($) {
            $("form.card").validate({
                rules: {
                    name: {
						required: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					},
                    slug: {
						required: true,
						normalizer: function(value) {
							return $.trim(value);
						}
					},
                },
            });
        }(jQuery))
    </script>
@endpush