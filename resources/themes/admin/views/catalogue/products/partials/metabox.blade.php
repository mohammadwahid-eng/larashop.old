<product-metabox></product-metabox>

@push('footer')
	<script type="text/x-template" id="product-metabox-template">
		<div class="card-widget product-metabox">
			
			<div class="cw-preloader" v-if="preloader">
				<i class="fas fa-circle-notch fa-spin"></i>
			</div>

			<div class="cw-header">
				<span class="name" data-toggle="collapse" data-target="#product-metabox">Product meta</span>
			</div>
			<div class="collapse show" id="product-metabox">
				<div class="cw-body p-0">
					<div class="form-group d-flex gap-3 align-items-center m-0 p-3 border-bottom">
						<label>Product type</label>
						<select class="form-control form-control-sm w-auto selec2" name="type" v-model="product">
							<option value="simple">{{ __('Simple product') }}</option>
							<option value="grouped">{{ __('Grouped product') }}</option>
							<option value="external">{{ __('External product') }}</option>
							<option value="variable">{{ __('Variable product') }}</option>
						</select>
						<label class="custom-switch pl-0">
							<input type="checkbox" name="virtual" id="virtual" class="custom-switch-input" v-model="virtual">
							<span class="custom-switch-indicator"></span>
							<span class="custom-switch-description" data-toggle="tooltip" title="Virtual products are intangible and are not shipped.">Virtual</span>
						</label>
						<label class="custom-switch pl-0">
							<input type="checkbox" name="downloadable" id="downloadable" class="custom-switch-input" v-model="downloadable">
							<span class="custom-switch-indicator"></span>
							<span class="custom-switch-description" data-toggle="tooltip" title="Downloadable products give access to a file upon purchase.">Downloadable</span>
						</label>
					</div>
		
					<div class="card-widget">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-general-collapse">General</span>
						</div>
						<div class="collapse" id="product-general-collapse" data-parent=".product-metabox">
							<div class="cw-body">

								<fieldset>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="product_url">Product URL <i class="fas fa-info-circle" data-toggle="tooltip" title="Enter the external URL to the product."></i></label>
										<div class="col-md-9">
											<input type="text" class="form-control form-control-sm" id="product_url" name="product_url" placeholder="https://">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="product_url">Button text <i class="fas fa-info-circle" data-toggle="tooltip" title="This text will be shown on the button linking to the external product."></i></label>
										<div class="col-md-9">
											<input type="text" class="form-control form-control-sm" id="product_url" name="product_url" placeholder="{{ __('Buy product') }}">
										</div>
									</div>
								</fieldset>
			
								<fieldset>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="regular_price">Regular price</label>
										<div class="col-md-9">
											<input type="number" class="form-control form-control-sm" id="regular_price" name="regular_price">
										</div>									
									</div>
	
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="sale_price">Sale price</label>
										<div class="col-md-9">
											<input type="number" class="form-control form-control-sm" id="sale_price" name="sale_price">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="schedule_sale">Schedule sale</label>
										<div class="col-md-9 d-flex">
											<label class="custom-switch pl-0">
												<input type="checkbox" name="schedule_sale" id="schedule_sale" class="custom-switch-input" v-model="schedule_sale">
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Enable schedule sale of the product</span>
											</label>
										</div>
									</div>

									<fieldset>
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
									</fieldset>
									
								</fieldset>

								<fieldset>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="download_limit">Downloadable files</label>
										<div class="col-md-9">
											<table class="table table-sm table-bordered mb-0">
												<thead>
													<tr class="text-center">
														<th>Name <i class="fas fa-info-circle" data-toggle="tooltip" title="This is the name of the download shown to the customer."></i></th>
														<th>File URL <i class="fas fa-info-circle" data-toggle="tooltip" title="This is the URL or absolute path to the file which customers will get access to. URLs entered here should already be encoded."></i></th>
													</tr>
												</thead>
												<tbody>
													<tr v-for="(file, index) in dlfiles" :key="file.id">
														<td>
															<input type="text" class="form-control form-control-sm" placeholder="File name">
														</td>
														<td>
															<div class="d-flex gap-2">
																<input type="text" class="form-control form-control-sm" placeholder="https://">
																<button type="button" class="btn btn-sm btn-light nowrap" v-on:click="choose_dlfile(file)">Choose File</button>
																<button type="button" class="btn btn-sm btn-link text-danger" v-on:click="remove_dlfile(file)"><i class="fas fa-times-circle"></i></button>
															</div>
														</td>
													</tr>
													<tr>
														<td colspan="2">
															<button type="button" class="btn btn-sm btn-primary" v-on:click="create_dlfile">Add file</button>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="download_limit">Download limit <i class="fas fa-info-circle" data-toggle="tooltip" title="Leave blank for unlimited re-downloads."></i></label>
										<div class="col-md-9">
											<input type="number" class="form-control form-control-sm" id="download_limit" name="download_limit" placeholder="Unlimited">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="download_expiry">Download expiry <i class="fas fa-info-circle" data-toggle="tooltip" title="Enter the number of days before a download link expires, or leave blank."></i></label>
										<div class="col-md-9">
											<input type="number" class="form-control form-control-sm" id="download_expiry" name="download_expiry" placeholder="Never">
										</div>
									</div>
								</fieldset>
				
								<fieldset>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="tax_status">Tax status <i class="fas fa-info-circle" data-toggle="tooltip" title="Define whether or not the entire product is taxable, or just the cost of shipping it."></i></label>
										<div class="col-md-9">
											<select name="tax_status" id="tax_status" class="form-control form-control-sm" v-model="tax_status">
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
								</fieldset>
							</div>
						</div>
					</div>
		
					<div class="card-widget mt-0">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-inventory-collapse">Inventory</span>
						</div>
						<div class="collapse" id="product-inventory-collapse" data-parent=".product-metabox">
							<div class="cw-body">
								<fieldset>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="sku">SKU <i class="fas fa-info-circle" data-toggle="tooltip" title="SKU refers to a Stock-keeping unit, a unique identifier for each distinct product and service that can be purchased."></i></label>
										<div class="col-md-9">
											<input type="text" class="form-control form-control-sm" id="sku" name="sku">
										</div>
									</div>
								</fieldset>

								<fieldset>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="manage_stock">Manage stock?</label>
										<div class="col-md-9 d-flex">
											<label class="custom-switch pl-0">
												<input type="checkbox" name="manage_stock" id="manage_stock" class="custom-switch-input" v-model="manage_stock">
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Enable stock management at product level</span>
											</label>
										</div>
									</div>
								</fieldset>
		
								<fieldset>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="stock_quantity">Stock quantity <i class="fas fa-info-circle" data-toggle="tooltip" title="If this is a variable product this value will be used to control stock for all variations, unless you define stock at variation level."></i></label>
										<div class="col-md-9">
											<input type="number" class="form-control form-control-sm" id="stock_quantity" name="stock_quantity" placeholder="0">
										</div>
									</div>
			
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="allow_backorders">Allow backorders? <i class="fas fa-info-circle" data-toggle="tooltip" title="If managing stock, this controls wheather or not backorders are allowed. If enabled, stock quantity can go below 0."></i></label>
										<div class="col-md-9">
											<select name="allow_backorders" id="allow_backorders" class="form-control form-control-sm">
												<option value="no">Do not allow</option>
												<option value="notify">Allow, but notify customers</option>
												<option value="yes">Allow</option>
											</select>
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="low_stock_amount">Low stock threshold <i class="fas fa-info-circle" data-toggle="tooltip" title="When product stock reaches this amount you will be notified by email. It is possible to define different values for each variation individually."></i></label>
										<div class="col-md-9">
											<input type="number" class="form-control form-control-sm" id="low_stock_amount" name="low_stock_amount" placeholder="Store-wide threshold (2)">
										</div>
									</div>
								</fieldset>
		
								<fieldset>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="stock_status">Stock status <i class="fas fa-info-circle" data-toggle="tooltip" title="Controls wheather or not the product is listed as 'in stock' or 'out of stock' on the frontend."></i></label>
										<div class="col-md-9">
											<select name="stock_status" id="stock_status" class="form-control form-control-sm">
												<option value="instock">In stock</option>
												<option value="outofstock">Out of stock</option>
												<option value="onbackorder">On backorder</option>
											</select>
										</div>
									</div>
								</fieldset>
		
								<fieldset>
									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="sold_individually">Sold individually</label>
										<div class="col-md-9 d-flex">
											<label class="custom-switch pl-0">
												<input type="checkbox" name="sold_individually" id="sold_individually" class="custom-switch-input">
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description">Enable this to only allow one of this item to be bought in a single order</span>
											</label>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
					
					<div class="card-widget mt-0">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-shipping-collapse">Shipping</span>
						</div>
						<div class="collapse" id="product-shipping-collapse" data-parent=".product-metabox">
							<div class="cw-body">
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="weight">Weight</label>
									<div class="col-md-9">
										<input type="text" class="form-control form-control-sm" id="weight" name="weight">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="length">Dimentions <i class="fas fa-info-circle" data-toggle="tooltip" title="Length x Width x Height"></i></label>
									<div class="col-md-9">
										<div class="row">
											<div class="col">
												<input type="text" class="form-control form-control-sm" id="length" name="length" placeholder="Length">
											</div>
											<div class="col">
												<input type="text" class="form-control form-control-sm" id="width" name="width" placeholder="Width">
											</div>
											<div class="col">
												<input type="text" class="form-control form-control-sm" id="height" name="height" placeholder="Height">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="shipping_class">Shipping class <i class="fas fa-info-circle" data-toggle="tooltip" title="Shipping classes are used by certain shipping methods to group similar products."></i></label>
									<div class="col-md-9">
										<select id="shipping_class" name="shipping_class" class="form-control form-control-sm">
											<option value="">No shipping class</option>
										</select>
									</div>
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
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="group_product_ids">Grouped products <i class="fas fa-info-circle" data-toggle="tooltip" title="Cross-sells are products which you promote in the cart, based on the current product."></i></label>
									<div class="col-md-9">
										<input type="text" class="form-control form-control-sm" id="group_product_ids" name="group_product_ids" placeholder="Search for a product…">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="upsell_ids">Upsells <i class="fas fa-info-circle" data-toggle="tooltip" title="Upsells are products which you recommend instead of the currently viewed product, for example, products that are more profitable or better quality or more expensive."></i></label>
									<div class="col-md-9">
										<input type="text" class="form-control form-control-sm" id="upsell_ids" name="upsell_ids" placeholder="Search for a product…">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="cross_sell_ids">Cross-sells <i class="fas fa-info-circle" data-toggle="tooltip" title="Cross-sells are products which you promote in the cart, based on the current product."></i></label>
									<div class="col-md-9">
										<input type="text" class="form-control form-control-sm" id="cross_sell_ids" name="cross_sell_ids" placeholder="Search for a product…">
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="card-widget mt-0">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-attributes-collapse">Attributes</span>
						</div>
						<div class="collapse" id="product-attributes-collapse" data-parent=".product-metabox">
							<div class="cw-body">
								<div class="form-group">
									<div class="input-group">
										<select class="form-control" v-model="picked_attr">
											<option value="">Custom product attribute</option>
											<option :value="attribute.id" v-for="attribute in attributes" :key="attribute.id">@{{ attribute.name }}</option>
										</select>
										<div class="input-group-append">
											<button class="btn btn-light" type="button" v-on:click="pick_attr">Add Attribute</button>
										</div>
									</div>
								</div>

								<div class="card-widget" :class="[ index === 0 ? 'mt-3' : 'mt-0' ]" v-for="(attribute, index) in picked_attr_list" :key="attribute.id">
									<div class="cw-header">
										<span class="name" :class="[ index !== 0 ? 'collapsed' : '' ]" data-toggle="collapse" :data-target="'#product-attribute-'+attribute.id">@{{ attribute.name }}</span>
										<span class="action" v-on:click="remove_attr(attribute)">Remove</span>
									</div>
									<div class="collapse" :class="[ index === 0 ? 'show' : '' ]" :id="'product-attribute-'+attribute.id" data-parent="#product-attributes-collapse">
										<div class="cw-body">
											<div class="form-group">
												<ul class="attr_val_container">
													<li v-for="attr_val in attribute.attr_values" :key="attr_val.id">
														<label class="custom-switch pl-0">
															<input type="checkbox" :name="'attr_value['+attribute.id+'][]'" class="custom-switch-input" :value="attr_val.id">
															<span class="custom-switch-indicator"></span>
															<span class="custom-switch-description">@{{ attr_val.name }}</span>
														</label>
													</li>
												</ul>
											</div>
										</div>
										<div class="cw-footer">
											<button type="button" class="btn btn-sm btn-light" v-on:click="select_all_attr_vals(attribute)">Select All</button>
											<button type="button" class="btn btn-sm btn-secondary ml-1" v-on:click="unselect_all_attr_vals(attribute)">Select None</button>
											<button type="button" class="btn btn-sm btn-primary ml-auto" v-on:click="add_attr_val(attribute)">Add New</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="card-widget mt-0">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-variations-collapse">Variations</span>
						</div>
						<div class="collapse" id="product-variations-collapse" data-parent=".product-metabox">
							<div class="cw-body">
								coming soon
							</div>
						</div>
					</div>
		
					<div class="card-widget mt-0">
						<div class="cw-header">
							<span class="name collapsed" data-toggle="collapse" data-target="#product-advanced-collapse">Advanced</span>
						</div>
						<div class="collapse" id="product-advanced-collapse" data-parent=".product-metabox">
							<div class="cw-body">
								<div class="form-group row">
									<label class="col-md-3 col-form-label" for="reviews_allowed">Allow reviews</label>
									<div class="col-md-9 d-flex">
										<label class="custom-switch pl-0">
											<input type="checkbox" name="reviews_allowed" id="reviews_allowed" class="custom-switch-input">
											<span class="custom-switch-indicator"></span>
											<span class="custom-switch-description">Allow</span>
										</label>
									</div>
								</div>
								<div class="form-group row mb-0">
									<label class="col-md-3 col-form-label" for="purchase_note">Purchase note <i class="fas fa-info-circle" data-toggle="tooltip" title="Enter an optional note to send the customer after purchase."></i></label>
									<div class="col-md-9">
										<textarea class="summernote-simple" id="purchase_note" name="purchase_note"></textarea>
									</div>
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
					preloader: false,
					product: 'simple',
					virtual: false,
					downloadable: false,
					schedule_sale: false,
					tax_status: 'taxable',
					manage_stock: false,
					dlfiles: [],
					attributes: [],
					picked_attr: '',
					picked_attr_list: [],
				}
			},
			methods: {
				create_dlfile() {
					this.dlfiles.push({ id: this.dlfiles.length });
				},
				choose_dlfile(file) {
					alert(file)
				},
				remove_dlfile(file) {
					this.dlfiles = this.dlfiles.filter(item => item.id !== file.id)
				},
				fetch_attributes() {
					this.preloader = true;
					axios.get('/api/catalogue/attributes')
					.then(response => {
						this.attributes = response.data;
					})
					.catch(error => console.log(error))
					.then(() => {
						this.preloader = false;
					});
				},
				create_attr() {
					
				},
				pick_attr() {
					if(!this.picked_attr) {
						this.create_attr();
						return;
					}

					let _attr = this.attributes.find(item => item.id == this.picked_attr);
					this.picked_attr_list.indexOf(_attr) === -1 ? this.picked_attr_list.unshift(_attr) : alert('Attribute already attached');
				},
				remove_attr(attribute) {
					this.picked_attr_list = this.picked_attr_list.filter(item => item.id !== attribute.id);
				},
				select_all_attr_vals(attribute) {
					console.log(attribute.name)
				},
				unselect_all_attr_vals(attribute) {

				},
				add_attr_val(attribute) {
					let name = prompt("Enter a name for the new attribute term:");
					if(name == null) return;
					this.preloader = true;
					axios.post('/api/catalogue/attributes/'+attribute.id+'/values', {
						name: name,
						slug: name,
						description: null,
					})
					.then((response) => {
						let values = this.attributes.find(item => item.id === attribute.id).attr_values;
						let isExist = values.filter(item => item.id === response.data.id);
						isExist.length === 0 ? this.attributes.find(item => item.id === attribute.id).attr_values.push(response.data) : alert(attribute.name + ' already exist');
					})
					.catch(error => console.log(error))
					.then(() => {
						this.preloader = false;
					})
				},
			},
			mounted() {
				this.fetch_attributes();
			}
		});
	</script>
@endpush