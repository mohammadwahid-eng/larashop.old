@extends('layouts.app')

@section('title')
	{{ __('Product Categories') }}
@endsection

@section('title_add_new_btn')
    <a href="{{ route('admin.products.categories.create') }}" class="btn btn-sm btn-primary ml-3">{{ __('Add New') }}</a>
@endsection

@push('css_lib')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.11.3/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-select-bs4/1.3.3/select.bootstrap4.min.css">
@endpush

@section('content')
	<div class="section-body">
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-striped w-100" data-toggle="dataTable">
						<thead>
							<tr>
								<th>
									<div class="custom-checkbox custom-control">
										<input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
										<label for="checkbox-all" class="custom-control-label">&nbsp;</label>
									</div>
								</th>
								<th><i class="fas fa-image"></i></th>
								<th>{{ __('Name') }}</th>
								<th>{{ __('Slug') }}</th>
								<th>{{ __('Parent') }}</th>
								<th>{{ __('Featured') }}</th>
								<th>{{ __('Menu') }}</th>
								<th>{{ __('Products') }}</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<form method="POST" class="deleteForm d-none">
		@csrf
		@method('DELETE')
	</form>
@endsection

@push('js_lib')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.11.3/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-select-bs4/1.3.3/select.bootstrap4.min.js"></script>
@endpush

@push('footer')
	<script src="{{ asset('themes/admin/js/page/modules-datatables.js') }}"></script>
	<script>
		$(function () {		  
			$('[data-toggle=dataTable]').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ route('admin.products.categories.index') }}",
				columns: [
					{ data: 'id', name: 'id', orderable: false, searchable: false },
					{ data: 'image', name: 'image', orderable: false, searchable: false },
					{ data: 'name', name: 'name' },
					{ data: 'slug', name: 'slug' },
					{ data: 'parent_id', name: 'parent_id' },
					{ data: 'is_featured', name: 'is_featured' },
					{ data: 'in_menu', name: 'in_menu' },
					{ data: 'products', name: 'products' },
				],
				columnDefs: [
					{ width: 28, targets: 0 },
					{ width: 30, targets: 1 },
				],
				order: [[2, 'asc']]
			});


			$(document).on('click','.delete',function(e){
				e.preventDefault();
				if(!confirm("Are you sure?")) return;

				let elem = $(this),
					id = elem.data('id'),
					action = elem.attr('href'),
					form = $('.deleteForm');

				form.attr("action", action);
				form.submit();
			})
		});
	  </script>
@endpush