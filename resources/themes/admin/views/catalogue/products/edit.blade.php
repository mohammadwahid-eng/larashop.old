@extends('layouts.app')

@section('title')
	{{ __('Edit Product') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('admin.products.edit', $product) }}
@endsection

@section('content')
	<section class="section">
		<div class="section-body">
			<form action="{{ route('admin.products.update', $product) }}" method="POST" class="card" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="card-body pb-0">
					<div class="form-group">
						<label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $product->name }}" data-slugify="#slug" required>
						@error('name')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('The name is how it appears on your site.') }}</small>
					</div>
					<div class="form-group">
						<label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
						<input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') ?? $product->slug }}" required>
						@error('slug')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.') }}</small>
					</div>
					<div class="form-group">
						<label for="featured_image">{{ __('Featured Image') }}</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input h-100 @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image">
							<label class="custom-file-label" for="featured_image">{{ __('Choose file') }}</label>
							@error('featured_image')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>
				</div>
				<div class="card-footer pt-0">
					<button class="btn btn-primary mr-1" type="submit">{{ __('Update Product') }}</button>
					<a href="{{ route('admin.products.index') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
				</div>
			</form>
		</div>
	</section>
@endsection