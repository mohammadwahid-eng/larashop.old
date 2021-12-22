@push('footer')
    <script type="text/x-template" id="product-advanced-template">
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
    </script>
    <script>
        Vue.component('product-advanced', {
            template: '#product-advanced-template',
			data() {
				return {
                    
				}
			}
		});
    </script>
@endpush