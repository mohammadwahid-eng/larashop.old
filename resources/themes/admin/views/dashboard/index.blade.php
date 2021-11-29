@extends('layouts.app')

@section('title')
	{{ __('Dashboard') }}
@endsection

@section('content')
	<table class="table table-striped table-bordered dataTable" style="width:100%">
		<thead>
			<tr>
				<th><input type="checkbox" class="selectAll"><span class="d-none">Checkbox</span></th>
				<th>First Name</th>
				<th>Email</th>
				<th>Created At</th>
				<th>Updated At</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
@endsection

@push('css_lib')
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush

@push('js_lib')
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
@endpush

@push('footer')
	<script>
		$(document).ready(function() {
			let selectAll = $('.selectAll');
			let table = $('.dataTable').DataTable({
				ajax: '{{ route("users") }}',
				serverSide: true,
				processing: true,
				dom: 'Bfrtip',
				buttons: [
					{
						extend:    'colvis',
						text:      '<i class="fas fa-columns"></i>',
						titleAttr: 'Column Visibility'
					},
				],
				columns: [
					{data: 'id', name: 'id' },
					{data: 'first_name', name: 'first_name' },
					{data: 'email', name: 'email' },
					{data: 'created_at', name: 'created_at' },
					{data: 'updated_at', name: 'updated_at' },
				],
				columnDefs: [{
					targets: 0,
					searchable: false,
					orderable: false,
					render: function (data, type, full, meta) {
						return '<input type="checkbox" name="id[]" value="' + data + '">';
					}
				}],
				order: [[1, 'asc']],
				lengthMenu: [ 25, 50, 75, 100 ]
			});

			// Handle click on "Select all" control
			selectAll.on('click', function() {
				// Get all rows with search applied
				var rows = table.rows({ 'search': 'applied' }).nodes();
				// Check/uncheck checkboxes for all rows in the table
				$('input[type="checkbox"]', rows).prop('checked', this.checked);
			});

			// Handle click on checkbox to set state of "Select all" control
			$('.dataTable tbody').on('change', 'input[type="checkbox"]', function(){
				// If checkbox is not checked
				if(!this.checked) {
					var el = selectAll.get(0);
					// If "Select all" control is checked and has 'indeterminate' property
					if(el && el.checked && ('indeterminate' in el)) {
						// Set visual state of "Select all" control
						// as 'indeterminate'
						el.indeterminate = true;
					}
				}
			});

			// Uncheck the select-all if any ajax request made
			table.on('xhr.dt', function () {
				if(selectAll.is(":checked")) {
					selectAll.prop('checked', false);
				}
			});
		})
	</script>
@endpush