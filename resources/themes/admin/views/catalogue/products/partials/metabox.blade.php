<product-metabox></product-metabox>

@push('footer')
	<script type="text/x-template" id="product-metabox-template">
		<div class="card-widget product-metabox">
			<div class="cw-header">
				<span class="name" data-toggle="collapse" data-target="#product-metabox">Product meta</span>
			</div>
			<div class="collapse show" id="product-metabox">
				<div class="cw-body p-0">
					<div class="form-group d-flex gap-3 align-items-center m-0 p-3 border-bottom">
						<label>Product type</label>
						<select class="form-control form-control-sm w-auto" name="type" v-model="type">
							<option value="simple">{{ __('Simple product') }}</option>
							<option value="downloadable">{{ __('Downloadable product') }}</option>
							<option value="virtual">{{ __('Virtual product') }}</option>
						</select>
					</div>
		
					<div class="card-widget">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-general-collapse">General</span>
						</div>
						<div class="collapse" id="product-general-collapse" data-parent=".product-metabox">
							<div class="cw-body">
			
								<div class="form-group row">
									<label for="regular_price" class="col-md-3 col-form-label">Regular price</label>
									<div class="col-md-9">
										<input type="number" class="form-control form-control-sm" id="regular_price" name="regular_price">
									</div>									
								</div>

								<div class="form-group row">
									<label for="sale_price" class="col-md-3 col-form-label">Sale price</label>
									<div class="col-md-9">
										<input type="number" class="form-control form-control-sm" id="sale_price" name="sale_price">
										<a href="#" class="text-reset small">Schedule</a>
									</div>
								</div>
				
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="sale_price_date_from">Sales price date from</label>
									<div class="col-md-9">
										<input type="date" class="form-control form-control-sm" id="sale_price_date_from" name="sale_price_date_from">
									</div>									
								</div>
				
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="sale_price_date_to">Sales price date to</label>
									<div class="col-md-9">
										<input type="date" class="form-control form-control-sm" id="sale_price_date_to" name="sale_price_date_to">
									</div>									
								</div>
				
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="tax_status">Tax status <i class="fas fa-info-circle" data-toggle="tooltip" title="Define whether or not the entire product is taxable, or just the cost of shipping it."></i></label>
									<div class="col-md-9">
										<select name="tax_status" id="tax_status" class="form-control form-control-sm">
											<option value="taxable">Taxable</option>
											<option value="shipping">Shipping only</option>
											<option value="">None</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="tax_class">Tax class <i class="fas fa-info-circle" data-toggle="tooltip" title="Choose a tax class for this product. Tax classes are used to apply different tax rates specific to certain types of product."></i></label>
									<div class="col-md-9">
										<select name="tax_class" id="tax_class" class="form-control form-control-sm">
											<option value="standard">Standard</option>
											<option value="reduced-rate">Reduced rate</option>
											<option value="zero-rate">Zero rate</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
		
					<div class="card-widget mt-0">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-inventory-collapse">Inventory</span>
						</div>
						<div class="collapse" id="product-inventory-collapse" data-parent=".product-metabox">
							<div class="cw-body">
								<div class="form-group">
									<label for="sku">SKU <i class="fas fa-info-circle" data-toggle="tooltip" title="SKU refers to a Stock-keeping unit, a unique identifier for each distinct product and service that can be purchased."></i></label>
									<input type="text" class="form-control" id="sku" name="sku">
								</div>
		
								<div class="form-group">
									<label class="w-100" for="manage_stock">Manage stock?</label>
									<label class="custom-switch pl-0">
										<input type="checkbox" name="manage_stock" id="manage_stock" class="custom-switch-input">
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description">Enable stock management at product level</span>
									</label>
								</div>
		
								<div class="form-group">
									<label for="stock_quantity">Stock quantity <i class="fas fa-info-circle" data-toggle="tooltip" title="If this is a variable product this value will be used to control stock for all variations, unless you define stock at variation level."></i></label>
									<input type="number" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="0">
								</div>
		
								<div class="form-group">
									<label for="allow_backorders">Allow backorders? <i class="fas fa-info-circle" data-toggle="tooltip" title="If managing stock, this controls wheather or not backorders are allowed. If enabled, stock quantity can go below 0."></i></label>
									<select name="allow_backorders" id="allow_backorders" class="form-control">
										<option value="no">Do not allow</option>
										<option value="notify">Allow, but notify customers</option>
										<option value="yes">Allow</option>
									</select>
								</div>
								
								<div class="form-group">
									<label for="low_stock_amount">Low stock threshold <i class="fas fa-info-circle" data-toggle="tooltip" title="When product stock reaches this amount you will be notified by email. It is possible to define different values for each variation individually."></i></label>
									<input type="number" class="form-control" id="low_stock_amount" name="low_stock_amount" placeholder="Store-wide threshold (2)">
								</div>
		
								<div class="form-group">
									<label for="stock_status">Stock status <i class="fas fa-info-circle" data-toggle="tooltip" title="Controls wheather or not the product is listed as 'in stock' or 'out of stock' on the frontend."></i></label>
									<select name="stock_status" id="stock_status" class="form-control">
										<option value="instock">In stock</option>
										<option value="outofstock">Out of stock</option>
										<option value="onbackorder">On backorder</option>
									</select>
								</div>
		
								<div class="form-group">
									<label class="w-100" for="sold_individually">Sold individually</label>
									<label class="custom-switch pl-0">
										<input type="checkbox" name="sold_individually" id="sold_individually" class="custom-switch-input">
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description">Enable this to only allow one of this item to be bought in a single order</span>
									</label>
								</div>
							</div>
						</div>
					</div>
					
					<div class="card-widget mt-0">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-shipping-collapse">Shipping</span>
						</div>
						<div class="collapse" id="product-shipping-collapse" data-parent=".product-metabox">
							<div class="cw-body">
								<div class="form-group">
									<label for="weight">Weight</label>
									<input type="text" class="form-control" id="weight" name="weight">
								</div>
								<div class="form-group">
									<label for="length">Dimentions</label>
									<div class="row">
										<div class="col">
											<input type="text" class="form-control" id="length" name="length" placeholder="Length">
										</div>
										<div class="col">
											<input type="text" class="form-control" id="width" name="width" placeholder="Width">
										</div>
										<div class="col">
											<input type="text" class="form-control" id="height" name="height" placeholder="Height">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="shipping_class">Shipping class <i class="fas fa-info-circle" data-toggle="tooltip" title="Shipping classes are used by certain shipping methods to group similar products."></i></label>
									<select class="form-control" id="shipping_class" name="shipping_class">
										<option value="">No shipping class</option>
									</select>
								</div>
							</div>
						</div>
					</div>
		
					<div class="card-widget mt-0">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-linked-products-collapse">Linked Products</span>
						</div>
						<div class="collapse" id="product-linked-products-collapse" data-parent=".product-metabox">
							<div class="cw-body">
								<div class="form-group">
									<label for="upsell_ids">Upsells <i class="fas fa-info-circle" data-toggle="tooltip" title="Upsells are products which you recommend instead of the currently viewed product, for example, products that are more profitable or better quality or more expensive."></i></label>
									<input type="text" class="form-control" id="upsell_ids" name="upsell_ids" placeholder="Search for a product…">
								</div>
								<div class="form-group">
									<label for="cross_sell_ids">Cross-sells <i class="fas fa-info-circle" data-toggle="tooltip" title="Cross-sells are products which you promote in the cart, based on the current product."></i></label>
									<input type="text" class="form-control" id="cross_sell_ids" name="cross_sell_ids" placeholder="Search for a product…">
								</div>
							</div>
						</div>
					</div>
					
					<div class="card-widget mt-0">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-attribute-collapse">Attributes</span>
						</div>
						<div class="collapse" id="product-attribute-collapse" data-parent=".product-metabox">
							<div class="cw-body">
								<div class="form-group">
									<div class="input-group">
										<select class="custom-select custom-select-sm">
											<option :value="attr.id" v-for="attr in all_attrs" :key="attr.id">@{{ attr.name }}</option>
										</select>
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">Add Attribute</button>
										</div>
									</div>
								</div>
			
								<div class="card-widget mt-0" v-for="attr in picked_attr_items" :key="attr.id">
									<div class="cw-header">
										<span class="name">@{{ attr.name }}</span>
										<span class="action">Remove</span>
									</div>
									<div class="cw-body">
										<div class="form-group">
											<ul class="attr_val_container">
												<li v-for="value in attr.attr_values" :key="value.id">
													<label class="custom-switch pl-0">
														<input type="checkbox" :name="'attr['+attr.id+'][]'" class="custom-switch-input" :value="value.id">
														<span class="custom-switch-indicator"></span>
														<span class="custom-switch-description">@{{ value.name }}</span>
													</label>
												</li>
											</ul>
										</div>
									</div>
									<div class="cw-footer">
										<button type="button" class="btn btn-sm btn-light">Select All</button>
										<button type="button" class="btn btn-sm btn-secondary ml-1">Select None</button>
										<button type="button" class="btn btn-sm btn-primary ml-auto">Add New</button>
									</div>
								</div>
							</div>
						</div>
					</div>
		
					<div class="card-widget mt-0">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-downloadable-collapse">Downloadable</span>
						</div>
						<div class="collapse" id="product-downloadable-collapse" data-parent=".product-metabox">
							<div class="cw-body">
								<div class="form-group">
									<label for="download_limit">Downloadable files</label>
									<table class="table table-sm table-bordered mb-0">
										<thead>
											<tr class="text-center">
												<th>Name <i class="fas fa-info-circle" data-toggle="tooltip" title="This is the name of the download shown to the customer."></i></th>
												<th>File URL <i class="fas fa-info-circle" data-toggle="tooltip" title="This is the URL or absolute path to the file which customers will get access to. URLs entered here should already be encoded."></i></th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="(file, index) in files" :key="file.id">
												<td>
													<input type="text" class="form-control form-control-sm" placeholder="File name">
												</td>
												<td>
													<div class="d-flex gap-2">
														<input type="text" class="form-control form-control-sm" placeholder="https://">
														<button type="button" class="btn btn-sm btn-light nowrap">Choose File</button>
														<button type="button" class="btn btn-sm btn-link text-danger"><i class="fas fa-times-circle"></i></button>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<button type="button" class="btn btn-sm btn-primary">Add file</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="form-group">
									<label for="download_limit">Download limit <i class="fas fa-info-circle" data-toggle="tooltip" title="Leave blank for unlimited re-downloads."></i></label>
									<input type="number" class="form-control" id="download_limit" name="download_limit" placeholder="Unlimited">
								</div>
								<div class="form-group">
									<label for="download_expiry">Download expiry <i class="fas fa-info-circle" data-toggle="tooltip" title="Enter the number of days before a download link expires, or leave blank."></i></label>
									<input type="number" class="form-control" id="download_expiry" name="download_expiry" placeholder="Never">
								</div>
							</div>
						</div>
					</div>
		
					<div class="card-widget mt-0">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-advanced-collapse">Advanced</span>
						</div>
						<div class="collapse" id="product-advanced-collapse" data-parent=".product-metabox">
							<div class="cw-body">
								<div class="form-group">
									<label class="w-100" for="reviews_allowed">Allow reviews</label>
									<label class="custom-switch pl-0">
										<input type="checkbox" name="reviews_allowed" id="reviews_allowed" class="custom-switch-input">
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description">Allow</span>
									</label>
								</div>
								<div class="form-group mb-0">
									<label for="purchase_note">Purchase note <i class="fas fa-info-circle" data-toggle="tooltip" title="Enter an optional note to send the customer after purchase."></i></label>
									<textarea class="summernote-simple" id="purchase_note" name="purchase_note"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</script>
@endpush

@push('footer')
	<script>
		Vue.component('product-metabox', {
			template: '#product-metabox-template',
			data() {
				return {
					type: 'simple',
				}
			}
		});
	</script>
@endpush