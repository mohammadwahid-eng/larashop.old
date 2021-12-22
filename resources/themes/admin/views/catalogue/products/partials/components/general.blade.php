@push('footer')
    <script type="text/x-template" id="product-general-template">
        <div class="card-widget">
            <div class="cw-header">
                <span class="name collapsed" data-toggle="collapse" data-target="#product-general-collapse">General</span>
            </div>
            <div class="collapse" id="product-general-collapse" data-parent=".product-metabox">
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
    
                    <div class="form-group" v-if="schedule_sale">
                        <label for="sale_price_date_from">Sales price date from</label>
                        <input type="date" class="form-control" id="sale_price_date_from" name="sale_price_date_from">
                    </div>
    
                    <div class="form-group" v-if="schedule_sale">
                        <label for="sale_price_date_to">Sales price date to</label>
                        <input type="date" class="form-control" id="sale_price_date_to" name="sale_price_date_to">
                    </div>
    
                    <div class="form-group">
                        <label for="tax_status">Tax status <i class="fas fa-info-circle" data-toggle="tooltip" title="Define whether or not the entire product is taxable, or just the cost of shipping it."></i></label>
                        <select name="tax_status" id="tax_status" class="form-control" v-model="tax_status">
                            <option value="taxable">Taxable</option>
                            <option value="shipping">Shipping only</option>
                            <option value="">None</option>
                        </select>
                    </div>
                    <div class="form-group" v-if="tax_status">
                        <label for="tax_class">Tax class <i class="fas fa-info-circle" data-toggle="tooltip" title="Choose a tax class for this product. Tax classes are used to apply different tax rates specific to certain types of product."></i></label>
                        <select name="tax_class" id="tax_class" class="form-control">
                            <option value="standard">Standard</option>
                            <option value="reduced-rate">Reduced rate</option>
                            <option value="zero-rate">Zero rate</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </script>
    <script>
        Vue.component('product-general', {
            template: '#product-general-template',
            data() {
                return {
                    schedule_sale: false,
                    tax_status: 'taxable',
                }
            }
        });
    </script>
@endpush