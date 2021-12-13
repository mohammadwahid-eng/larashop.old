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
					<div class="col-lg-8">
						
						<div class="card">
							<div class="card-body pb-0">
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
								<div class="form-group mb-0">
									<label for="description">{{ __('Description') }}</label>
									<textarea class="summernote form-control @error('description') error @enderror" id="description" name="description"></textarea>
									@error('description')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>
						
						<div class="card meta-card">
							<div class="card-body">
								<div class="form-group row mb-0 align-items-center">
									<label for="type" class="col-auto col-form-label">{{ __('Product Type') }}</label>
									<div class="col">
										<select class="form-control @error('type') error @enderror" name="type" id="type" onchange="alert(this.value)">
											<option value="simple">{{ __('Simple Product') }}</option>
											<option value="grouped">{{ __('Grouped Product') }}</option>
											<option value="external">{{ __('External Product') }}</option>
											<option value="variable">{{ __('Variable Product') }}</option>
											<option value="variable">{{ __('Virtual Product') }}</option>
											<option value="variable">{{ __('Downloadable Product') }}</option>
										</select>
										@error('type')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-body pb-0">
								<div class="form-group mb-0">
									<label for="short_description">{{ __('Short Description') }}</label>
									<textarea class="summernote-simple form-control @error('short_description') error @enderror" id="short_description" name="short_description"></textarea>
									@error('short_description')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>

					</div>
					<div class="col-lg-4">

						<div class="card">
							<div class="card-body">
								<div class="form-group mb-3">
									<label for="status">{{ __('Status') }}</label>
									<select class="form-control @error('status') error @enderror" id="status" name="status">
										<option value="draft">{{ __('Draft') }}</option>
										<option value="pending_review">{{ __('Pending Review') }}</option>
										<option value="publish">{{ __('Publish') }}</option>
									</select>
									@error('status')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group mb-3">
									<label for="visibility">{{ __("Visibility") }}</label>
									<select class="form-control @error('visibility') error @enderror" id="visibility" name="visibility">
										<option value="public">{{ __('Public') }}</option>
										<option value="private">{{ __('Private') }}</option>
										<option value="protected">{{ __('Protected') }}</option>
									</select>
									@error('visibility')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
									<div class="form-group mb-0 mt-3 d-none">
										<label for="password">{{ __("Password") }}</label>
										<input type="password" class="form-control @error('password') error @enderror" id="password" name="password" value="{{ old("password") }}">
										@error('password')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group mb-3">
									<label for="catalogue_visibility">{{ __('Catalogue Visibility') }}</label>
									<select class="form-control @error('catalogue_visibility') error @enderror" id="catalogue_visibility" name="catalogue_visibility">
										<option value="shop_and_search">{{ __('Shop & Search') }}</option>
										<option value="only_shop">{{ __('Only Shop') }}</option>
										<option value="only_search">{{ __('Only Search') }}</option>
										<option value="hidden">{{ __('Hidden') }}</option>
									</select>
									@error('catalogue_visibility')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group mb-0">
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
							<div class="card-footer bg-primary-off d-flex justify-content-between align-items-center">
								<a href="#" class="text-primary">{{ __('Save Draft') }}</a>
								<button class="btn btn-primary" type="submit">{{ __('Publish') }}</button>
							</div>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="form-group mb-0">
									<label for="categories">{{ __('Product Categories') }}</label>
									<div style="max-height: 180px; overflow-y:auto">
										@forelse (\App\Models\ProductCategory::all() as $category)
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="category-{{ $category->id }}" name="categories[]" value="{{ $category->id }}">
												<label class="custom-control-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
											</div>
										@empty
											<span>{{ __("No Category") }}</span>
										@endforelse
									</div>																	
									<a href="#new_cat_collapse" data-toggle="collapse" class="form-text text-primary"><u>{{ __('Add new category') }}</u></a>
									<div class="collapse mt-2" id="new_cat_collapse">
										<div class="form-group mb-2">
											<label for="new_cat_name" class="required">{{ __('Name') }}</label>
											<input type="text" class="form-control form-control-sm" name="new_cat_name" id="new_cat_name">
										</div>
										<div class="form-group mb-2">
											<label for="new_cat_slug" class="required">{{ __('Slug') }}</label>
											<input type="text" class="form-control form-control-sm" name="new_cat_slug" id="new_cat_slug">
										</div>										
										<div class="form-group mb-3">
											<label for="new_cat_parent">{{ __('Parent') }}</label>
											<select name="new_cat_parent" id="new_cat_parent" class="form-control form-control-sm">
												<option value="">None</option>
												@foreach (\App\Models\ProductCategory::all() as $category)
													<option value="{{ $category->id }}">{{ $category->name }}</option>
												@endforeach												
											</select>
										</div>
										<button type="button" class="btn btn-sm w-100 btn-primary">{{ __('Add new category') }}</button>
									</div>
								</div>
							</div>							
						</div>

						<div class="card">
							<div class="card-body">
								<div class="form-group mb-0">
									<label for="tags">{{ __('Product Tags') }}</label>
									<input type="text" class="form-control @error('tags') error @enderror" id="tags" name="tags" value="{{ old('tags') }}" data-role="tagsinput">
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
										<input type="file" class="custom-file-input h-100 @error('featured_image') error @enderror" id="featured_image" name="featured_image">
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
										<input type="file" class="custom-file-input h-100 @error('gallery_images') error @enderror" id="gallery_images" name="gallery_images" multiple>
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

@push('css_lib')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
@endpush

@push('js_lib')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
@endpush

@push('footer')
    <script>
        (function($) {
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
					},
                },
            });
        }(jQuery))
    </script>
@endpush