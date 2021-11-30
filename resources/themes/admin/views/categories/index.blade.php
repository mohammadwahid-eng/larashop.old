@extends('layouts.app')

@section('title')
	{{ __('All Categories') }}
@endsection

@section('breadcrumbs')
	{{ Breadcrumbs::render('admin.categories.index') }}
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-bordered dataTable w-100">
            <thead>
                <tr>
                    <th><input type="checkbox" class="selectAll"><span class="d-none">Checkbox</span></th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Slug') }}</th>
                    <th>{{ __('Products') }}</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
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
                ajax: '{{ route("admin.categories.index") }}',
                serverSide: true,
                processing: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: '<i class="fas fa-trash-alt"></i>',
                        className: "bulk_delete d-none",
                        action: function ( e, dt, node, config ) {
                            if(!confirm("Are you sure?")) return;
                            let list = [];
                            table.$('input[type="checkbox"]:checked').each(function() {
                                list.push(this.value);
                            });
                            $.ajax({
                                type: "DELETE",
                                url: "{{ route('admin.categories.destroy.bulk') }}",

                                success: function (data) {
                                    console.log(data);
                                },
                                error: function (data) {
                                    console.log('Error: ', data);
                                }
                            });
                        }
                    },
                    {
                        text: 'Add New',
                        action: function ( e, dt, node, config ) {
                            window.location = "{{ route('admin.categories.create') }}";
                        }
                    },
                    {
                        extend: 'colvis',
                        text: 'Columns Visibility'
                    }
                ],
                columns: [
                    { data: 'id', name: 'id', searchable: false, orderable: false, },
                    { data: 'image', name: 'image', searchable: false, orderable: false, },
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'slug', name: 'slug' },
                    { data: 'products', name: 'products' },
                ],
                columnDefs: [{
                    targets: 0,
                    className: 'dt-center',
                    render: function (data, type, full, meta) {
                        return '<input type="checkbox" name="id[]" value="' + data + '">';
                    }
                }],
                autoWidth: true,
                order: [[2, 'desc']],
                lengthMenu: [ 25, 50, 75, 100 ]
            });

            // Handle click on "Select all" control
            selectAll.on('click', function() {
                // Get all rows with search applied
                var rows = table.rows({ 'search': 'applied' }).nodes();
                // Check/uncheck checkboxes for all rows in the table
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
            });

            // Toggle Bulk Delete Button
            $('.dataTable').on('change', 'input[type="checkbox"]', function() {
                // If any checkbox checked
                if($('.dataTable').find("input[type='checkbox']:checked").length) {
                    $('.bulk_delete').removeClass('d-none');
                } else {
                    $('.bulk_delete').addClass('d-none');
                }
            });

            // Handle click on checkbox to set state of "Select all" control
            $('.dataTable tbody').on('change', 'input[type="checkbox"]', function() {
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
                $('.bulk_delete').addClass('d-none');
                if(selectAll.is(":checked")) {
                    selectAll.prop('checked', false);
                }
            });


            // Delete Category
            $(document).on('click','.btn-delete',function(e) {
                e.preventDefault();
                if(!confirm("Are you sure?")) return;
                let el = $(this);
                $.ajax({
                    type: "DELETE",
                    dataType: 'JSON',
                    url: $(this).attr('href'),
                    data: { _method: 'delete', _token: '{{ csrf_token() }}' },
                    success: function (data) {
                        if (data.status) {
                            table.row(el.parents('tr')).remove().draw();
                            toastr.success(data.status);
                        }
                    },
                    error: function(data) {
                        if (data.error) {
                            toastr.danger(data.error);
                        }
                    }
                });
            });
        });
    </script>
@endpush