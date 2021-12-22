@push('footer')
    <script type="text/x-template" id="product-attributes-template">
        <div class="card-widget mt-0">
            <div class="cw-header">
                <span class="name collapsed" data-toggle="collapse" data-target="#product-attribute-collapse">Attributes</span>
            </div>
            <div class="collapse" id="product-attribute-collapse" data-parent=".product-metabox">
                <div class="cw-body">
                    <div class="form-group">
                        <div class="input-group">
                            <select class="custom-select custom-select-sm" v-model="picked_attr">
                                <option :value="attr.id" v-for="attr in all_attrs" :key="attr.id">@{{ attr.name }}</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" v-on:click="create_widget">Add Attribute</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-widget mt-0" v-for="attr in picked_attr_items" :key="attr.id">
                        <div class="cw-header">
                            <span class="name">@{{ attr.name }}</span>
                            <span class="action" v-on:click="remove_widget(attr)">Remove</span>
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
                            <button type="button" class="btn btn-sm btn-light" v-on:click="select_all(attr)">Select All</button>
                            <button type="button" class="btn btn-sm btn-secondary ml-1" v-on:click="select_none(attr)">Select None</button>
                            <button type="button" class="btn btn-sm btn-primary ml-auto" v-on:click="create_value(attr)">Add New</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>
    <script>
        Vue.component('product-attributes', {
            template: '#product-attributes-template',
			data() {
				return {
                    picked_attr: '',
					all_attrs: [],
                    picked_attr_items: [],
				}
			},
            methods: {
                async fetch_attrs() {
					axios.get('/api/catalogue/attributes')
					.then((response) => {
						this.all_attrs = response.data;
					})
					.catch((error) => {
						console.log(error);
					});
				},
                create_widget() {
                    if(!this.picked_attr) {
						alert("Please choose an attribute");
						return false;
					}
					let attribute = this.all_attrs.find(attribute => attribute.id == this.picked_attr);
					this.picked_attr_items.indexOf(attribute) === -1 ? this.picked_attr_items.unshift(attribute) : alert(attribute.name + " already attached");
                },
                remove_widget(attribute) {
                    this.picked_attr_items = this.picked_attr_items.filter((item) => {
						return item.id !== attribute.id;
					});
                },
                select_all(attribute) {
                    alert('select all')
                },
                select_none(attribute) {
                    alert('select none')
                },
                create_value(attribute) {
					if(!prompt("Enter " + attribute.name + " name")) return;
				},
            },
            mounted() {
				this.fetch_attrs();
			}
		});
    </script>
@endpush