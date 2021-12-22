@push('footer')
    <script type="text/x-template" id="product-downloadable-template">
        <div class="card-widget mt-0">
            <div class="cw-header">
                <span class="name collapsed" data-toggle="collapse" data-target="#product-downloadable-collapse">Downloadable</span>
            </div>
            <div class="collapse" id="product-downloadable-collapse" data-parent=".product-metabox">
                <div class="cw-body">
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
                </div>
            </div>
        </div>
    </script>
    <script>
        Vue.component('product-downloadable', {
            template: '#product-downloadable-template',
			data() {
				return {
                    files: []
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
            }
		});
    </script>
@endpush