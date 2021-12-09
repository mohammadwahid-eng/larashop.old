@extends('layouts.app')

@section('title')
	{{ __('Create Product') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('admin.products.create') }}
@endsection

@section('content')
	<section class="section">
		<div class="section-body">
			<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-lg-8">
						<div class="card">
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
							<div class="card-footer pt-0 d-flex justify-content-between">
								<div>
									<button class="btn btn-primary mr-1" type="submit">{{ __('Create Product') }}</button>
									<a href="{{ route('admin.products.index') }}" class="btn btn-danger">{{ __('Back') }}</a>
								</div>
								<button class="btn btn-dark" type="reset">{{ __('Reset Form') }}</button>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card">
							<div class="card-body">
								<div class="form-group mb-0">
									<label for="categories">{{ __('Product Categories') }}</label>
									<ul class="nav nav-tabs">
										<li class="nav-item">
											<a href="#category_all" class="nav-link active" data-toggle="tab">{{ __('All Categories') }}</a>
										</li>
										<li class="nav-item">
											<a href="#category_most_used" class="nav-link" data-toggle="tab">{{ __('Most Used') }}</a>
										</li>
									</ul>
									<div class="tab-content tab-bordered">
										<div class="tab-pane fade show active" id="category_all">
											@foreach (\App\Models\ProductCategory::all() as $category)
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="category-{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
													<label class="custom-control-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
												</div>
											@endforeach
										</div>
										<div class="tab-pane fade" id="category_most_used"></div>
									</div>
									<a href="#" class="form-text text-primary">+ {{ __('Add new category') }}</a>
								</div>
							</div>							
						</div>
						<div class="card">
							<div class="card-body">
								<div class="form-group mb-0">
									<label for="tags">{{ __('Product Tags') }}</label>
									<input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags') }}">
									@error('tags')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
									<small class="form-text text-muted">{{ __('Separate tags with commas') }}</small>
								</div>
							</div>							
						</div>
						<div class="card">
							<div class="card-body">
								<div class="form-group mb-0">
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
						</div>
						<div class="card">
							<div class="card-body">
								<div class="form-group mb-0">
									<label for="gallery_images">{{ __('Gallery Images') }}</label>
									<div class="custom-file">
										<input type="file" class="custom-file-input h-100 @error('gallery_images') is-invalid @enderror" id="gallery_images" name="gallery_images" multiple>
										<label class="custom-file-label" for="gallery_images">{{ __('Choose file') }}</label>
										@error('gallery_images')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
@endsection