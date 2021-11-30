@extends('layouts.app')

@section('title')
	{{ __('Create Category') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('admin.categories.create') }}
@endsection

@section('content')
	<section class="section">
		<div class="section-body">
			<form action="{{ route('admin.categories.store') }}" method="POST" class="card" enctype="multipart/form-data">
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
						<label for="parent_id">{{ __('Parent category') }}</label>
						<select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
							<option value="">{{ __('None') }}</option>
							@foreach (\App\Models\Category::all() as $category)
								<option value="{{ $category->id }}" @if(old('parent_id') == $category->id) selected @endif>{{ $category->name }}</option>
							@endforeach
						</select>
						@error('parent_id')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.') }}</small>
					</div>
					<div class="form-group">
						<label for="description">{{ __('Description') }}</label>
						<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
						@error('description')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
						<small class="form-text text-muted">{{ __('The description is not prominent by default; however, some themes may show it.') }}</small>
					</div>
					<div class="form-group">
						<label for="photo">{{ __('Image') }}</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input h-100 @error('photo') is-invalid @enderror" id="photo" name="photo">
							<label class="custom-file-label" for="photo">{{ __('Choose file') }}</label>
							@error('photo')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>
				</div>
				<div class="card-footer pt-0 d-flex justify-content-between">
					<div>
						<button class="btn btn-primary mr-1" type="submit">{{ __('Create Category') }}</button>
						<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
					</div>
					<button class="btn btn-dark" type="reset">{{ __('Reset') }}</button>
				</div>
			</form>
		</div>
	</section>
@endsection