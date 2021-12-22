@push('footer')
    <script type="text/x-template" id="product-shipping-template">
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
    </script>
    <script>
        Vue.component('product-shipping', {
            template: '#product-shipping-template',
			data() {
				return {
                    
				}
			}
		});
    </script>
@endpush