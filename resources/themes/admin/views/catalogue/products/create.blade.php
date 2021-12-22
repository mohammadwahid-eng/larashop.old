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
			<form action="{{ route('admin.products.store') }}" class="product-form" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-8">
						<div class="card-widget">
							<div class="cw-body">
								<div class="form-group">
									<label for="name" class="required">{{ __('Name') }}</label>
									<input type="text" class="form-control @error('name') error @enderror" id="name" name="name" value="{{ old('name') }}" data-slugify="#slug">
									@error('name')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
									<small class="form-text text-muted">{{ __('The name is how it appears on your site.') }}</small>
								</div>
								<div class="form-group">
									<label for="slug" class="required">{{ __('Slug') }}</label>
									<input type="text" class="form-control @error('slug') error @enderror" id="slug" name="slug" value="{{ old('slug') }}">
									@error('slug')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
									<small class="form-text text-muted">{{ __('The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.') }}</small>
								</div>
								<div class="form-group">
									<label for="description">{{ __('Description') }}</label>
									<textarea class="summernote @error('description') error @enderror" id="description" name="description"></textarea>
									@error('description')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>

						@include('catalogue.products.partials.metabox')

						<div class="card-widget">
							<div class="cw-header">
								<span class="name" data-toggle="collapse" data-target="#product-short-description">{{ __('Product short description') }}</span>
							</div>
							<div class="collapse show" id="product-short-description">
								<div class="cw-body">
									<div class="form-group">
										<textarea class="summernote-simple @error('short_description') error @enderror" id="short_description" name="short_description"></textarea>
										@error('short_description')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card-widget">
							<div class="cw-header">
								<span class="name" data-toggle="collapse" data-target="#product-publish">{{ __('Publish') }}</span>
							</div>
							<div class="collapse show" id="product-publish">
								<div class="cw-body">
									<div class="form-group">
										<label class="w-100" for="status">{{ __('Status') }}</label>
										<label class="custom-switch pl-0">
											<input type="checkbox" name="status" id="status" class="custom-switch-input" @if (old('status')) checked @endif>
											<span class="custom-switch-indicator"></span>
											<span class="custom-switch-description">{{ __('Make this product active for customers') }}</span>
										</label>
										@error('status')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
									<div class="form-group">
										<label class="w-100" for="featured">{{ __('Featured') }}</label>
										<label class="custom-switch pl-0">
											<input type="checkbox" name="featured" id="featured" class="custom-switch-input" @if (old('featured')) checked @endif>
											<span class="custom-switch-indicator"></span>
											<span class="custom-switch-description">{{ __('This is a featured product') }}</span>
										</label>
										@error('featured')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
								<div class="cw-footer">
									<button class="btn" type="button">{{ __('Save as Draft') }}</button>
									<button class="btn btn-primary ml-auto" type="submit">{{ __('Publish') }}</button>
								</div>
							</div>
						</div>
						
						<div class="card-widget">
							<div class="cw-header">
								<span class="name" data-toggle="collapse" data-target="#product-categories">{{ __('Product categories') }}</span>
							</div>
							<div class="collapse show" id="product-categories">
								<div class="cw-body">
									<div class="form-group">
										<div class="category-checkbox-tree">
											<ul>
												@forelse (\App\Models\ProductCategory::where('parent_id', null)->get() as $category)
													<li>
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="category-{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
															<label class="custom-control-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
														</div>
														{{ \App\Models\ProductCategory::checkboxTree($category->children) }}
													</li>												
												@empty
													<li><a href="{{ route('admin.categories.create') }}" class="text-primary">{{ __("Add new category") }}</a></li>
												@endforelse
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="card-widget">
							<div class="cw-header">
								<span class="name" data-toggle="collapse" data-target="#product-tags">{{ __('Product tags') }}</span>
							</div>
							<div class="collapse show" id="product-tags">
								<div class="cw-body">
									<div class="form-group">
										<input type="text" class="form-control @error('tags') error @enderror" id="tags" name="tags" value="{{ old('tags') }}" data-role="tagsinput">
										@error('tags')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
										<small class="form-text text-muted">{{ __('Separate tags with commas') }}</small>
									</div>
								</div>
							</div>
						</div>
						
						<div class="card-widget">
							<div class="cw-header">
								<span class="name" data-toggle="collapse" data-target="#product-image">{{ __('Product image') }}</span>
							</div>
							<div class="collapse show" id="product-image">
								<div class="cw-body">
									<div class="form-group">
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
						</div>
						
						<div class="card-widget">
							<div class="cw-header">
								<span class="name" data-toggle="collapse" data-target="#product-gallery">{{ __('Product gallery') }}</span>
							</div>
							<div class="collapse show" id="product-gallery">
								<div class="cw-body">
									<div class="form-group">
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
				</div>
			</form>
		</div>
	</section>
@endsection

@push('css_lib')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
@endpush

@push('js_lib')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@push('footer')

    <script>
        (function($) {			
			// Form Validation
            $(".product-form").validate({
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
					}
                },
            });
        }(jQuery))
    </script>
@endpush