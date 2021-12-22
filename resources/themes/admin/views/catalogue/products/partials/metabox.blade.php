@include('catalogue.products.partials.components.general')
@include('catalogue.products.partials.components.inventory')
@include('catalogue.products.partials.components.shipping')
@include('catalogue.products.partials.components.linked_products')
@include('catalogue.products.partials.components.attributes')
@include('catalogue.products.partials.components.downloadable')
@include('catalogue.products.partials.components.advanced')

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
						<select class="form-control form-control-sm w-auto" name="product_type" v-model="product_type">
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
	
					<product-general></product-general>
	
					<product-inventory></product-inventory>
	
					<product-shipping v-if="!virtual"></product-shipping>
	
					<product-linked-products></product-linked-products>
	
					<product-attributes></product-attributes>
	
					<product-downloadable v-if="downloadable"></product-downloadable>
	
					<product-advanced></product-advanced>
					
				</div>
			</div>
		</div>
	</script>
	<script>
		Vue.component('product-metabox', {
			template: '#product-metabox-template',
			data() {
				return {
					product_type: 'simple',
					virtual: false,
					downloadable: false,
				}
			}
		});
	</script>
@endpush






















@push('footer')
	


	

	

	

	

	






	<script>

		// Shipping
		


		// Inventory
		


		// Attributes
		


		// Advanced
		


		// Downloadable
		
	</script>
@endpush