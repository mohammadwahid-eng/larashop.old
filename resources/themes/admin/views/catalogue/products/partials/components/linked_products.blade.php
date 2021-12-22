@push('footer')
    <script type="text/x-template" id="product-linked-products-template">
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
    </script>
    <script>
        Vue.component('product-linked-products', {
            template: '#product-linked-products-template',
			data() {
				return {
                    
				}
			}
		});
    </script>
@endpush