<div class="card-widget product-metabox">
	<div class="cw-header">
		<span class="name">Product meta</span>
	</div>
	<div class="cw-body p-0">
		<div class="form-group d-flex gap-3 align-items-center m-0 p-3 border-bottom">
			<label>Product type</label>
			<select class="form-control form-control-sm w-auto" name="product_type">
				<option value="simple">{{ __('Simple product') }}</option>
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

		<div class="card-widget active">
			<div class="cw-header">
				<span class="name">General</span>
			</div>
			<div class="cw-body">

				<div class="form-group">
					<label for="regular_price">Regular price</label>
					<input type="number" class="form-control" id="regular_price" name="regular_price">
				</div>
				<div class="form-group">
					<label for="sale_price">Sale price</label>
					<div class="input-group">
						<input type="number" class="form-control" id="sale_price" name="sale_price">
						<div class="input-group-append">
							<div class="input-group-text d-flex align-items-center cursor-pointer fas fa-clock" data-toggle="tooltip" title="Schedule" v-on:click="schedule_sale = !schedule_sale"></div>
						</div>
					</div>
				</div>				
				<fieldset v-show="schedule_sale">
					<div class="form-group">
						<label for="sale_price_date_from">Sales price date from</label>
						<input type="date" class="form-control" id="sale_price_date_from" name="sale_price_date_from">
					</div>
					<div class="form-group">
						<label for="sale_price_date_to">Sales price date to</label>
						<input type="date" class="form-control" id="sale_price_date_to" name="sale_price_date_to">
					</div>
				</fieldset>
				
				<fieldset v-show="downloadable">
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
											<button type="button" class="btn btn-sm btn-link text-danger" v-on:click="remove_file(file)"><i class="fas fa-times-circle"></i></button>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<button type="button" class="btn btn-sm btn-primary" v-on:click="add_file">Add file</button>
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
				</fieldset>

				<div class="form-group">
					<label for="tax_status">Tax status <i class="fas fa-info-circle" data-toggle="tooltip" title="Define whether or not the entire product is taxable, or just the cost of shipping it."></i></label>
					<select name="tax_status" id="tax_status" class="form-control" v-model="tax_status">
						<option value="taxable">Taxable</option>
						<option value="shipping">Shipping only</option>
						<option value="">None</option>
					</select>
				</div>
				<div class="form-group" v-show="tax_status">
					<label for="tax_class">Tax class <i class="fas fa-info-circle" data-toggle="tooltip" title="Choose a tax class for this product. Tax classes are used to apply different tax rates specific to certain types of product."></i></label>
					<select name="tax_class" id="tax_class" class="form-control">
						<option value="standard">Standard</option>
						<option value="reduced-rate">Reduced rate</option>
						<option value="zero-rate">Zero rate</option>
					</select>
				</div>
			</div>
		</div>
		<div class="card-widget show_if_simple mt-0 active">
			<div class="cw-header">
				<span class="name">Inventory</span>
			</div>
			<div class="cw-body">
				<div class="form-group">
					<label for="sku">SKU <i class="fas fa-info-circle" data-toggle="tooltip" title="SKU refers to a Stock-keeping unit, a unique identifier for each distinct product and service that can be purchased."></i></label>
					<input type="text" class="form-control" id="sku" name="sku">
				</div>

				<div class="form-group">
					<label class="w-100" for="manage_stock">Manage stock?</label>
					<label class="custom-switch pl-0">
						<input type="checkbox" name="manage_stock" id="manage_stock" class="custom-switch-input" v-model="manage_stock">
						<span class="custom-switch-indicator"></span>
						<span class="custom-switch-description">Enable stock management at product level</span>
					</label>
				</div>

				<fieldset v-show="manage_stock">						
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
				</fieldset>

				<div class="form-group" v-show="!manage_stock">
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
		<div class="card-widget mt-0 active" v-show="!virtual">
			<div class="cw-header">
				<span class="name">Shipping</span>
			</div>
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
		<div class="card-widget mt-0 active">
			<div class="cw-header">
				<span class="name">Linked Products</span>
			</div>
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
		<div class="card-widget mt-0 active">
			<div class="cw-header">
				<span class="name">Attributes</span>
			</div>
			<div class="cw-body">
				<div class="form-group">
					<div class="input-group">
						<select class="custom-select custom-select-sm" v-model="attr_picked">
							<option :value="attribute.id" v-for="attribute in attr_list" :key="attribute.id">@{{ attribute.name }}</option>
						</select>
						<div class="input-group-append">
							<button class="btn btn-primary" type="button" v-on:click="create_widget">Add Attribute</button>
						</div>
					</div>
				</div>

				<div class="card-widget mt-0" v-for="attribute in widget_list" :key="attribute.id">
					<div class="cw-header">
						<span class="name">@{{ attribute.name }}</span>
						<span class="action" v-on:click="remove_widget(attribute)">Remove</span>
					</div>
					<div class="cw-body">
						<div class="form-group">
							<label class="w-100">Name</label>
							<label class="text-primary">@{{ attribute.name }}</label>
						</div>
						<div class="form-group">
							<label>Value(s)</label>
							<select class="form-control select2">
								<option :value="value.id" v-for="value in attribute.attr_values" :key="value.id">@{{ value.name }}</option>
							</select>
							<div class="d-flex mt-1">
								<button type="button" class="btn btn-sm btn-light">Select All</button>
								<button type="button" class="btn btn-sm btn-secondary ml-1">Select None</button>
								<button type="button" class="btn btn-sm btn-primary ml-auto" v-on:click="create_value(attribute)">Add New</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-widget mt-0 active">
			<div class="cw-header">
				<span class="name">Advanced</span>
			</div>
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

@push('css_lib')
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('js_lib')
	<script src="https://unpkg.com/vue@next"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@push('footer')
	<script>
		axios.defaults.baseURL = 'https://larashop.devs';
		Vue.createApp({
			data() {
				return {
					virtual: false,
					downloadable: false,
					schedule_sale: false,
					files: [],
					tax_status: 'taxable',
					manage_stock: false,
					attr_picked: '',
					attr_list: [],
					widget_list: [],
				}
			},
			methods: {
				add_file() {
					this.files.push({ id: this.files.length });
				},
				remove_file(file) {
					this.files = this.files.filter((item) => {
						return item.id != file.id;
					});
				},
				async fetch_attrs() {
					axios.get('/api/catalogue/attributes')
					.then((response) => {
						this.attr_list = response.data;
					})
					.catch((error) => {
						console.log(error);
					});
				},
				create_widget() {
					if(!this.attr_picked) {
						alert("Please choose an attribute");
						return false;
					}
					let attribute = this.attr_list.find(item => item.id == this.attr_picked);
					this.widget_list.indexOf(attribute) === -1 ? this.widget_list.unshift(attribute) : alert(attribute.name + " already attached");
				},
				remove_widget(attribute) {
					this.widget_list = this.widget_list.filter((item) => {
						return item.id !== attribute.id;
					});
				},
				create_value(attribute) {
					let value = prompt("Enter " + attribute.name + " name");
					if(!value) return;
				}
			},
			mounted() {
				this.fetch_attrs();
			}
		}).mount(".product-metabox");
	</script>
@endpush