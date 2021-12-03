@extends('layouts.app')

@section('title')
	{{ __('Edit Tag') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('admin.tags.edit', $tag) }}
@endsection

@section('content')
	<section class="section">
		<div class="section-body">
			<form action="{{ route('admin.tags.update', $tag) }}" method="POST" class="card">
				@csrf
				@method('PUT')
				<div class="card-body pb-0">
					<div class="form-group">
						<label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $tag->name }}" data-slugify="#slug" required>
						@error('name')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('The name is how it appears on your site.') }}</small>
					</div>
					<div class="form-group">
						<label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
						<input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') ?? $tag->slug }}" required>
						@error('slug')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.') }}</small>
					</div>
					<div class="form-group">
						<label for="description">{{ __('Description') }}</label>
						<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') ?? $tag->description }}</textarea>
						@error('description')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('The description is not prominent by default; however, some themes may show it.') }}</small>
					</div>
				</div>
				<div class="card-footer pt-0">
					<button class="btn btn-primary mr-1" type="submit">{{ __('Update Tag') }}</button>
					<a href="{{ route('admin.tags.index') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
				</div>
			</form>
		</div>
	</section>
@endsection