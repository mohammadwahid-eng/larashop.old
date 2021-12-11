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
									<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" data-slugify="#slug">
									@error('name')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
									<small class="form-text text-muted">{{ __('The name is how it appears on your site.') }}</small>
								</div>
								<div class="form-group">
									<label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
									<input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
									@error('slug')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
									<small class="form-text text-muted">{{ __('The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.') }}</small>
								</div>
								<div class="form-group mb-0">
									<label for="description">{{ __('Description') }}</label>
									<textarea class="summernote form-control @error('description') is-invalid @enderror" id="description" name="description"></textarea>
									@error('description')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>
						
						<div class="card meta-card">
							<div class="card-body">
								<div class="form-group mb-0">
									<div class="row align-items-center">
										<div class="col-lg-auto">
											<label for="type" class="mb-lg-0">{{ __('Product Type') }}</label>
										</div>
										<div class="col">
											<select class="form-control form-control-sm @error('type') is-invalid @enderror" name="type" id="type">
												<option value="simple">{{ __('Simple Product') }}</option>
												<option value="grouped">{{ __('Grouped Product') }}</option>
												<option value="external">{{ __('External Product') }}</option>
												<option value="variable">{{ __('Variable Product') }}</option>
											</select>
										</div>
										<div class="col-lg-auto">
											<label class="custom-switch py-1 pl-0">
												<input type="checkbox" name="virtual" id="virtual" class="custom-switch-input">
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">{{ __('Virtual') }}</span>
											</label>
											@error('virtual')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
										<div class="col-lg-auto">
											<label class="custom-switch py-1 pl-0">
												<input type="checkbox" name="downloadable" id="downloadable" class="custom-switch-input">
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">{{ __('Downloadable') }}</span>
											</label>
											@error('downloadable')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>
							</div>
							<div class="d-flex">
								<div class="list-group">
									<a class="list-group-item list-group-item-action active" data-toggle="list" href="#list-general"><i class="fas fa-tachometer-alt mr-1"></i> {{ __('General') }}</a>
									<a class="list-group-item list-group-item-action" data-toggle="list" href="#list-inventory"><i class="fas fa-warehouse mr-1"></i> {{ __('Inventory') }}</a>
									<a class="list-group-item list-group-item-action" data-toggle="list" href="#list-shipping"><i class="fas fa-truck-moving mr-1"></i> {{ __('Shipping') }}</a>
									<a class="list-group-item list-group-item-action" data-toggle="list" href="#list-linked_products"><i class="fas fa-link mr-1"></i> {{ __('Linked Products') }}</a>
									<a class="list-group-item list-group-item-action" data-toggle="list" href="#list-attributes"><i class="fas fa-tags mr-1"></i> {{ __('Attributes') }}</a>
									<a class="list-group-item list-group-item-action" data-toggle="list" href="#list-advanced"><i class="fas fa-cog mr-1"></i> {{ __('Advanced') }}</a>
								</div>
								<div class="tab-content px-4 flex-grow-1">
									<div class="tab-pane fade show active" id="list-general">
										<div class="form-group mb-3">
											<label class="mb-0" for="regular_price">{{ __('Regular Price') }}($)</label>
											<input type="text" class="form-control form-control-sm @error('regular_price') is-invalid @enderror" id="regular_price" name="regular_price" value="{{ old('regular_price') }}">
											@error('regular_price')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
										<div class="form-group mb-3">
											<label class="mb-0" for="sale_price">{{ __('Sale Price') }}($)</label>
											<input type="text" class="form-control form-control-sm @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" value="{{ old('sale_price') }}">
											@error('sale_price')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
											<a href="#schedule_price" data-toggle="collapse" class="small text-primary">Schedule</a>
										</div>
										<div class="collapse" id="schedule_price">
											<div class="form-group mb-3">
												<label class="mb-0" for="date_on_sale_from">{{ __('Sale price from') }}</label>
												<input type="date" class="form-control form-control-sm @error('date_on_sale_from') is-invalid @enderror" id="date_on_sale_from" name="date_on_sale_from" value="{{ old('date_on_sale_from') }}">
												@error('date_on_sale_from')
													<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label class="mb-0" for="date_on_sale_to">{{ __('Sale price to') }}</label>
												<input type="date" class="form-control form-control-sm @error('date_on_sale_to') is-invalid @enderror" id="date_on_sale_to" name="date_on_sale_to" value="{{ old('date_on_sale_to') }}">
												@error('date_on_sale_to')
													<div class="invalid-feedback">{{ $message }}</div>
												@enderror

											</div>
										</div>
										<div>
											<div class="form-group mb-3">
												<label class="mb-0" for="downloads">{{ __('Downloadble Files') }}</label>
												<div class="custom-file">
													<input type="file" class="custom-file-input h-100 @error('downloads') is-invalid @enderror" id="downloads" name="downloads">
													<label class="custom-file-label" for="downloads">{{ __('Choose file') }}</label>
													@error('downloads')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
											</div>											
											<div class="form-group mb-3">
												<label class="mb-0" for="download_limit">{{ __('Download Limit') }}</label>
												<input type="text" class="form-control form-control-sm @error('download_limit') is-invalid @enderror" id="download_limit" name="download_limit" value="{{ old('download_limit') }}">
												@error('download_limit')
													<div class="invalid-feedback">{{ $message }}</div>
												@enderror
												<small class="form-text text-muted">{{ __('-1 or Leave blank for unlimited re-downloads.') }}</small>
											</div>
											<div class="form-group mb-3">
												<label class="mb-0" for="download_expiry">{{ __('Download Expiry') }}</label>
												<input type="text" class="form-control form-control-sm @error('download_expiry') is-invalid @enderror" id="download_expiry" name="download_expiry" value="{{ old('download_expiry') }}">
												@error('download_expiry')
													<div class="invalid-feedback">{{ $message }}</div>
												@enderror
												<small class="form-text text-muted">{{ __('Enter the number of days before a download link expires, or leave blank.') }}</small>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="list-inventory">
										<div class="form-group mb-3">
											<label class="mb-0" for="sku">{{ __('SKU') }}</label>
											<input type="text" class="form-control form-control-sm @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku') }}">
											@error('sku')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
										<div class="form-group mb-2">
											<label class="mb-0 w-100" for="manage_stock">{{ __('Manage Stock') }}</label>
											<label class="custom-switch pl-0">
												<input type="checkbox" name="manage_stock" id="manage_stock" class="custom-switch-input" @if (old('manage_stock')) checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">{{ __('Enable stock management at product level') }}</span>
											</label>
											@error('manage_stock')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>

										<div>
											<div class="form-group mb-3">
												<label class="mb-0" for="stock_quantity">{{ __('Stock Quantity') }}</label>
												<input type="number" class="form-control form-control-sm @error('stock_quantity') is-invalid @enderror" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity') }}">
												@error('stock_quantity')
													<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-2">
												<label class="mb-0 w-100" for="backorders">{{ __('Backorders') }}</label>
												<label class="custom-switch pl-0">
													<input type="checkbox" name="backorders" id="backorders" class="custom-switch-input" @if (old('backorders')) checked @endif>
													<span class="custom-switch-indicator"></span>
													<span class="custom-switch-description">{{ __('Allow Backorders') }}</span>
												</label>
												@error('backorders')
													<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
											<div class="form-group mb-3">
												<label class="mb-0" for="low_stock_amount">{{ __('Low Stock Threshold') }}</label>
												<input type="number" class="form-control form-control-sm @error('low_stock_amount') is-invalid @enderror" id="low_stock_amount" name="low_stock_amount" value="{{ old('low_stock_amount') }}">
												@error('low_stock_amount')
													<div class="invalid-feedback">{{ $message }}</div>
												@enderror
											</div>
										</div>

										<div class="form-group mb-3">
											<label class="mb-0" for="stock_status">{{ __('Stock Status') }}</label>
											<select class="form-control form-control-sm @error('stock_status') is-invalid @enderror" id="stock_status" name="stock_status">
												<option value="in_stock">{{ __('In Stock') }}</option>
												<option value="out_of_stock">{{ __('Out Of Stock') }}</option>
												<option value="on_backorder">{{ __('On Backorder') }}</option>
											</select>
											@error('stock_status')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>										
										<div class="form-group mb-2">
											<label class="mb-0 w-100" for="sold_individually">{{ __('Sold Individually') }}</label>
											<label class="custom-switch pl-0">
												<input type="checkbox" name="sold_individually" id="sold_individually" class="custom-switch-input" @if (old('sold_individually')) checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">{{ __('Enable this to only allow one of this item to be bought in a single order') }}</span>
											</label>
											@error('sold_individually')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="tab-pane fade" id="list-shipping">
										<div class="form-group mb-3">
											<label class="mb-0" for="weight">{{ __('Weight') }}(Kg)</label>
											<input type="text" class="form-control form-control-sm @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}">
											@error('weight')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
										<div class="form-group mb-3">
											<label class="mb-0" for="length">{{ __('Dimensions LxWxH') }}(cm)</label>
											<div class="row">
												<div class="col">
													<input type="number" class="form-control form-control-sm @error('length') is-invalid @enderror" id="length" name="length" value="{{ old('length') }}" placeholder="Length">
													@error('length')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
												<div class="col">
													<input type="number" class="form-control form-control-sm @error('width') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}" placeholder="Width">
													@error('width')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
												<div class="col">
													<input type="number" class="form-control form-control-sm @error('height') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}" placeholder="Height">
													@error('height')
														<div class="invalid-feedback">{{ $message }}</div>
													@enderror
												</div>
											</div>
										</div>
										<div class="form-group mb-3">
											<label class="mb-0" for="shipping_class_id">{{ __('Shipping Class') }}</label>
											<select class="form-control form-control-sm @error('shipping_class_id') is-invalid @enderror" id="shipping_class_id" name="shipping_class_id">
												<option value="">{{ __('No Shipping Class') }}</option>
											</select>
											@error('shipping_class_id')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="tab-pane fade" id="list-linked_products">
										<div class="form-group mb-3">
											<label class="mb-0" for="upsell_ids">{{ __('Upsells') }}</label>
											<input type="text" class="form-control form-control-sm @error('upsell_ids') is-invalid @enderror" id="upsell_ids" name="upsell_ids" value="{{ old('upsell_ids') }}">
											@error('upsell_ids')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
										<div class="form-group mb-3">
											<label class="mb-0" for="cross_sell_ids">{{ __('Cross-Sells') }}</label>
											<input type="text" class="form-control form-control-sm @error('cross_sell_ids') is-invalid @enderror" id="cross_sell_ids" name="cross_sell_ids" value="{{ old('cross_sell_ids') }}">
											@error('cross_sell_ids')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="tab-pane fade" id="list-attributes">Attributes</div>
									<div class="tab-pane fade" id="list-advanced">
										<div class="form-group mb-2">
											<label class="mb-0 w-100" for="reviews_allowed">{{ __('Customer Review') }}</label>
											<label class="custom-switch pl-0">
												<input type="checkbox" name="reviews_allowed" id="reviews_allowed" class="custom-switch-input" @if (old('reviews_allowed')) checked @endif>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">{{ __('Allow') }}</span>
											</label>
											@error('reviews_allowed')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
										<div class="form-group mb-3">
											<label class="mb-0" for="purchase_note">{{ __('Purchase note') }}</label>
											<textarea class="summernote-simple form-control @error('purchase_note') is-invalid @enderror" id="purchase_note" name="purchase_note">{{ old('purchase_note') }}</textarea>
											@error('purchase_note')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card">
							<div class="card-body pb-0">
								<div class="form-group mb-0">
									<label for="short_description">{{ __('Short Description') }}</label>
									<textarea class="summernote-simple form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description"></textarea>
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
									<select class="form-control form-control-sm @error('status') is-invalid @enderror" id="status" name="status">
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
									<select class="form-control form-control-sm @error('visibility') is-invalid @enderror" id="visibility" name="visibility">
										<option value="public">{{ __('Public') }}</option>
										<option value="private">{{ __('Private') }}</option>
										<option value="protected">{{ __('Protected') }}</option>
									</select>
									@error('visibility')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
									<div class="form-group mb-0 mt-3 d-none">
										<label for="password">{{ __("Password") }}</label>
										<input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password" name="password" value="{{ old("password") }}">
										@error('password')
											<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>
								</div>

								<div class="form-group mb-3">
									<label for="catalogue_visibility">{{ __('Catalogue Visibility') }}</label>
									<select class="form-control form-control-sm @error('catalogue_visibility') is-invalid @enderror" id="catalogue_visibility" name="catalogue_visibility">
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
											<label for="">{{ __('Name') }} <span class="text-danger">*</span></label>
											<input type="text" class="form-control form-control-sm">
										</div>
										<div class="form-group mb-2">
											<label for="">{{ __('Slug') }} <span class="text-danger">*</span></label>
											<input type="text" class="form-control form-control-sm">
										</div>										
										<div class="form-group mb-3">
											<label for="">{{ __('Parent') }}</label>
											<select name="" id="" class="form-control form-control-sm">
												<option value="">None</option>
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
									<input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags') }}" data-role="tagsinput">
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

@push('css_lib')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
@endpush

@push('js_lib')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
@endpush