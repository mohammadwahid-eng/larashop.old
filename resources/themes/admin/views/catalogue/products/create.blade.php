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
						<div class="form-group">
							<label for="description">{{ __('Description') }}</label>
							<textarea class="summernote @error('description') error @enderror" id="description" name="description"></textarea>
							@error('description')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="short_description">{{ __('Short Description') }}</label>
							<textarea class="summernote-simple @error('short_description') error @enderror" id="short_description" name="short_description"></textarea>
							@error('short_description')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
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
						<div class="form-group">
							<label for="regular_price" class="required">{{ __('Regular Price') }}</label>
							<input type="number" class="form-control @error('regular_price') error @enderror" id="regular_price" name="regular_price" value="{{ old('regular_price') }}">
							@error('regular_price')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="sale_price">{{ __('Sale Price') }}</label>
							<input type="number" class="form-control @error('sale_price') error @enderror" id="sale_price" name="sale_price" value="{{ old('sale_price') }}">
							@error('sale_price')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="sku">{{ __('SKU') }}</label>
							<input type="text" class="form-control @error('sku') error @enderror" id="sku" name="sku" value="{{ old('sku') }}">
							@error('sku')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label class="w-100" for="in_stock">{{ __('Availability') }}</label>
							<label class="custom-switch pl-0">
								<input type="checkbox" name="in_stock" id="in_stock" class="custom-switch-input" @if (old('in_stock')) checked @endif>
								<span class="custom-switch-indicator"></span>
								<span class="custom-switch-description">{{ __('In Stock') }}</span>
							</label>
							@error('in_stock')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="weight">{{ __('Weight') }}</label>
							<input type="text" class="form-control @error('weight') error @enderror" id="weight" name="weight" value="{{ old('weight') }}">
							@error('weight')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="length">{{ __('Length') }}</label>
							<input type="text" class="form-control @error('length') error @enderror" id="length" name="length" value="{{ old('length') }}">
							@error('length')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="width">{{ __('Width') }}</label>
							<input type="text" class="form-control @error('width') error @enderror" id="width" name="width" value="{{ old('width') }}">
							@error('width')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="height">{{ __('Height') }}</label>
							<input type="text" class="form-control @error('height') error @enderror" id="height" name="height" value="{{ old('height') }}">
							@error('height')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
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
						<div class="form-group">
							<label for="gallery_images">{{ __('Gallery Images') }}</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input h-100 @error('gallery_images') is-invalid @enderror" id="gallery_images" name="gallery_images" multiple>
								<label class="custom-file-label" for="gallery_images">{{ __('Choose file') }}</label>
								@error('gallery_images')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="form-group">
							<label for="categories">{{ __('Categories') }}</label>
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
						<div class="form-group">
							<label for="tags">{{ __('Tags') }}</label>
							<input type="text" class="form-control @error('tags') error @enderror" id="tags" name="tags" value="{{ old('tags') }}" data-role="tagsinput">
							@error('tags')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
							<small class="form-text text-muted">{{ __('Separate tags with commas') }}</small>
						</div>
						<div class="form-group">
							<label for="attributes">{{ __('Attributes') }}</label>
							<div class="input-group">
								<select class="custom-select custom-select-sm">
									<option value="0">{{ __('Custom attribute') }}</option>
									@foreach (\App\Models\ProductAttribute::all() as $attribute)
										<option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
									@endforeach
								</select>
								<div class="input-group-append">
									<button class="btn btn-sm btn-info add-attr" type="button">{{ __('Add Attribute') }}</button>
								</div>
							</div>
							<fieldset class="attribute_list">								
								<div class="repeatable"></div>
							</fieldset>
						</div>
						<div class="form-group">
							<label for="upsell_ids">{{ __('Upsell Products') }}</label>
							<input type="text" class="form-control @error('upsell_ids') error @enderror" id="upsell_ids" name="upsell_ids" value="{{ old('upsell_ids') }}">
							@error('upsell_ids')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>						
						<div class="form-group">
							<label for="cross_sell_ids">{{ __('Cross Sell Products') }}</label>
							<input type="text" class="form-control @error('cross_sell_ids') error @enderror" id="cross_sell_ids" name="cross_sell_ids" value="{{ old('cross_sell_ids') }}">
							@error('cross_sell_ids')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label class="w-100" for="reviews_allowed">{{ __('Allow Reviews') }}</label>
							<label class="custom-switch pl-0">
								<input type="checkbox" name="reviews_allowed" id="reviews_allowed" class="custom-switch-input" @if (old('reviews_allowed')) checked @endif>
								<span class="custom-switch-indicator"></span>
								<span class="custom-switch-description">{{ __('Allow') }}</span>
							</label>
							@error('reviews_allowed')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>						
						<div class="form-group">
							<label for="purchase_note">{{ __('Purchase Note') }}</label>							
							<textarea class="summernote-simple @error('purchase_note') error @enderror" id="purchase_note" name="purchase_note">{{ old('purchase_note') }}</textarea>
							@error('purchase_note')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label class="w-100" for="tax_status">{{ __('Tax Status') }}</label>
							<label class="custom-switch pl-0">
								<input type="checkbox" name="tax_status" id="tax_status" class="custom-switch-input" @if (old('tax_status')) checked @endif>
								<span class="custom-switch-indicator"></span>
								<span class="custom-switch-description">{{ __('Taxable') }}</span>
							</label>
							@error('tax_status')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<label for="tax_class_id">{{ __('Tax Class') }}</label>
							<select class="form-control @error('tax_class_id') error @enderror" id="tax_class_id" name="tax_class_id">
								<option value="">{{ __('None') }}</option>
							</select>
							@error('tax_class_id')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>						
						<div class="form-group">
							<label for="shipping_class_id">{{ __('Shipping Class') }}</label>
							<select class="form-control @error('shipping_class_id') error @enderror" id="shipping_class_id" name="shipping_class_id">
								<option value="">{{ __('None') }}</option>
							</select>
							@error('shipping_class_id')
								<div class="invalid-feedback">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-primary" type="submit">{{ __('Publish') }}</button>
						<button class="btn btn-light btn-draft" type="button">{{ __('Save as Draft') }}</button>
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
	<script src="{{ asset('themes/admin/js/jquery.repeatable.js') }}"></script>
@endpush

@push('footer')
	<script type="text/template" id="attribute_template">
		<div class="attr_template_item">
			<div class="attr_template_item_head bg-white border d-flex justify-content-between align-items-center">
				<span></span>
				<a href="#" class="delete-attr small text-danger">{{ __('Remove') }}</a>
			</div>
			<div class="attr_template_item_body">
				<div class="row">
					<div class="col-md-3 form-group mb-0">
						<label for="attr_name_{?}">{{ __('Name') }}</label>
						<input type="text" class="form-control name-attr" name="attr_name_{?}" id="attr_name_{?}">
						
					</div>
					<div class="col-md-9 form-group mb-0">
						<label for="attr_values_{?}">{{ __('Value(s)') }}</label>
						<textarea class="form-control" placeholder="{{ __('Enter some text, or some attributes by "|" separating values.') }}"></textarea>
						<button type="button" class="btn btn-primary mt-2">{{ __('Create & Attach') }}</button>
					</div>
				</div>
			</div>
		</div>
	</script>

	
	<script type="text/template" id="attribute_template_1">
		<div class="attr_template_item">
			<div class="attr_template_item_head bg-white border d-flex justify-content-between align-items-center">
				<span>Name</span>
				<a href="#" class="delete-attr small text-danger">{{ __('Remove') }}</a>
			</div>
			<div class="attr_template_item_body">
				<div class="row">
					<div class="col-md-3 form-group mb-0">
						<label for="attr_name_{?}">{{ __('Name') }}</label>
						<strong class="d-flex">Color</strong>
						<input type="hidden" class="form-control" name="attr_name_{?}" id="attr_name_{?}" value="color">
					</div>
					<div class="col-md-9 form-group mb-0">
						<label for="attr_values_{?}">{{ __('Value(s)') }}</label>
						<select class="form-control select2" multiple></select>
						<div class="mt-2 d-flex justify-content-between">
							<div class="d-flex gap-2">
								<button type="button" class="btn btn-sm btn-dark">{{ __('Select All') }}</button>
								<button type="button" class="btn btn-sm btn-light">{{ __('Select None') }}</button>
							</div>
							<button type="button" class="btn btn-sm btn-primary">{{ __('Add New') }}</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</script>

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
					},
					regular_price: {
						required: true,
					}
                },
            });

			// Repeat Attribute Fields
			$(".attribute_list .repeatable").repeatable({
				addTrigger: ".add-attr",
				deleteTrigger: ".delete-attr",
				template: "#attribute_template",
				itemContainer:".attr_template_item",
				afterAdd:function () {
					$('.select2').select2();
				},
			});


			$(document).on('click', '.attr_template_item_head', function() {
				$(this).toggleClass('active');
			});

			$(document).on('keyup', '.name-attr', function() {
				$(this).closest('.attr_template_item').find('.attr_template_item_head span').text($(this).val());
			});
        }(jQuery))
    </script>
@endpush