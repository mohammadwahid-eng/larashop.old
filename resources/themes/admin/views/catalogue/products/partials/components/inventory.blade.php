@push('footer')
    <script type="text/x-template" id="product-inventory-template">
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
                            <input type="checkbox" name="manage_stock" id="manage_stock" class="custom-switch-input" v-model="manage_stock">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Enable stock management at product level</span>
                        </label>
                    </div>

                    <div class="form-group" v-if="manage_stock">
                        <label for="stock_quantity">Stock quantity <i class="fas fa-info-circle" data-toggle="tooltip" title="If this is a variable product this value will be used to control stock for all variations, unless you define stock at variation level."></i></label>
                        <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="0">
                    </div>

                    <div class="form-group" v-if="manage_stock">
                        <label for="allow_backorders">Allow backorders? <i class="fas fa-info-circle" data-toggle="tooltip" title="If managing stock, this controls wheather or not backorders are allowed. If enabled, stock quantity can go below 0."></i></label>
                        <select name="allow_backorders" id="allow_backorders" class="form-control">
                            <option value="no">Do not allow</option>
                            <option value="notify">Allow, but notify customers</option>
                            <option value="yes">Allow</option>
                        </select>
                    </div>
                    
                    <div class="form-group" v-if="manage_stock">
                        <label for="low_stock_amount">Low stock threshold <i class="fas fa-info-circle" data-toggle="tooltip" title="When product stock reaches this amount you will be notified by email. It is possible to define different values for each variation individually."></i></label>
                        <input type="number" class="form-control" id="low_stock_amount" name="low_stock_amount" placeholder="Store-wide threshold (2)">
                    </div>

                    <div class="form-group" v-if="!manage_stock">
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
    </script>
    <script>
        Vue.component('product-inventory', {
            template: '#product-inventory-template',
			data() {
				return {
                    manage_stock: false,
				}
			}
		});
    </script>
@endpush