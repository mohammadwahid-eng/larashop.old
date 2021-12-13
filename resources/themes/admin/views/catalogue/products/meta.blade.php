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
                <input type="text" class="form-control @error('regular_price') is-invalid @enderror" id="regular_price" name="regular_price" value="{{ old('regular_price') }}">
                @error('regular_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-0" for="sale_price">{{ __('Sale Price') }}($)</label>
                <input type="text" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" value="{{ old('sale_price') }}">
                @error('sale_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-0" for="date_on_sale_from">{{ __('Sale price from') }}</label>
                <input type="date" class="form-control @error('date_on_sale_from') is-invalid @enderror" id="date_on_sale_from" name="date_on_sale_from" value="{{ old('date_on_sale_from') }}">
                @error('date_on_sale_from')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-0" for="date_on_sale_to">{{ __('Sale price to') }}</label>
                <input type="date" class="form-control @error('date_on_sale_to') is-invalid @enderror" id="date_on_sale_to" name="date_on_sale_to" value="{{ old('date_on_sale_to') }}">
                @error('date_on_sale_to')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
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
                <input type="text" class="form-control @error('download_limit') is-invalid @enderror" id="download_limit" name="download_limit" value="{{ old('download_limit') }}">
                @error('download_limit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">{{ __('Leave blank for unlimited re-downloads.') }}</small>
            </div>
            <div class="form-group mb-3">
                <label class="mb-0" for="download_expiry">{{ __('Download Expiry') }}</label>
                <input type="text" class="form-control @error('download_expiry') is-invalid @enderror" id="download_expiry" name="download_expiry" value="{{ old('download_expiry') }}">
                @error('download_expiry')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">{{ __('Enter the number of days before a download link expires, or leave blank.') }}</small>
            </div>
        </div>
        <div class="tab-pane fade" id="list-inventory">
            <div class="form-group mb-3">
                <label class="mb-0" for="sku">{{ __('SKU') }}</label>
                <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku') }}">
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
            <div class="form-group mb-3">
                <label class="mb-0" for="stock_quantity">{{ __('Stock Quantity') }}</label>
                <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity') }}">
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
                <input type="number" class="form-control @error('low_stock_amount') is-invalid @enderror" id="low_stock_amount" name="low_stock_amount" value="{{ old('low_stock_amount') }}">
                @error('low_stock_amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-0" for="stock_status">{{ __('Stock Status') }}</label>
                <select class="form-control @error('stock_status') is-invalid @enderror" id="stock_status" name="stock_status">
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
                <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}">
                @error('weight')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-0" for="length">{{ __('Dimensions LxWxH') }}(cm)</label>
                <div class="row">
                    <div class="col">
                        <input type="number" class="form-control @error('length') is-invalid @enderror" id="length" name="length" value="{{ old('length') }}" placeholder="Length">
                        @error('length')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="number" class="form-control @error('width') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}" placeholder="Width">
                        @error('width')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="number" class="form-control @error('height') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}" placeholder="Height">
                        @error('height')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label class="mb-0" for="shipping_class_id">{{ __('Shipping Class') }}</label>
                <select class="form-control @error('shipping_class_id') is-invalid @enderror" id="shipping_class_id" name="shipping_class_id">
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
                <input type="text" class="form-control @error('upsell_ids') is-invalid @enderror" id="upsell_ids" name="upsell_ids" value="{{ old('upsell_ids') }}">
                @error('upsell_ids')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="mb-0" for="cross_sell_ids">{{ __('Cross-Sells') }}</label>
                <input type="text" class="form-control @error('cross_sell_ids') is-invalid @enderror" id="cross_sell_ids" name="cross_sell_ids" value="{{ old('cross_sell_ids') }}">
                @error('cross_sell_ids')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="tab-pane fade" id="list-attributes">
            <div class="form-group mb-3">
                <label class="mb-0" for="attributes">{{ __('Attributes') }}</label>
                <div class="input-group">
                    <select class="custom-select custom-select-sm @error('attributes') is-invalid @enderror" id="attributes" name="attributes">
                        <option value="custom">{{ __('Custom product attribute') }}</option>
                        @foreach (\App\Models\ProductAttribute::all() as $attribute)
                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                        @endforeach
                    </select>
                    @error('attributes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary add_attr">{{ __('Add') }}</button>
                    </div>
                </div>
            </div>
            <div>
                <div class="card card-primary mb-3">
                    <div class="card-header p-0">
                        <h4><a href="#attr_collapse_1" data-toggle="collapse" class="collapsed">Color</a></h4>
                        <div class="card-header-action">
                            <a href="#" class="text-danger small">{{ __('Remove') }}</a>
                        </div>
                    </div>
                    <div class="collapse" id="attr_collapse_1">
                        <div class="card-body pb-3 pr-3 pl-3 pt-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-0">
                                        <label for="attr_name" class="mb-0">{{ __('Name') }}</label>
                                        <input type="text" class="form-control form-control-sm" id="attr_name" name="attr_name">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-0">
                                        <label for="attr_value" class="mb-0">{{ __('Value(s)') }}</label>
                                        <textarea class="form-control" id="attr_value" name="attr_value" placeholder="{{ __('Enter some text, or some attributes by "|" separating values.') }}"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary">{{ __('Save Attributes') }}</button>
            </div>
        </div>
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