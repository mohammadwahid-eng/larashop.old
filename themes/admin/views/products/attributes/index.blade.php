@extends('layouts.app')

@section('title')
	{{ __('All Attributes') }}
@endsection

@section('title_add_new_btn')
    <a href="{{ route('admin.products.attributes.create') }}" class="btn btn-sm btn-primary ml-3">{{ __('Add New') }}</a>
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
					<table class="table table-striped" data-toggle="datatable">
						<thead>
							<tr>
								<th>
									<div class="custom-checkbox custom-control">
										<input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
										<label for="checkbox-all" class="custom-control-label">&nbsp;</label>
									</div>
								</th>
								<th>{{ __('Code') }}</th>
								<th>{{ __('Name') }}</th>
								<th>{{ __('Values') }}</th>
								<th class="text-center">{{ __('Frontend Type') }}</th>
								<th class="text-center">{{ __('Filterable') }}</th>
								<th class="text-center">{{ __('Required') }}</th>
								<th class="text-center">{{ __('Action') }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($attributes as $attribute)
								<tr>
									<td class="align-middle">
										<div class="custom-checkbox custom-control">
											<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $attribute->id }}" name="attributes[]">
											<label for="checkbox-{{ $attribute->id }}" class="custom-control-label">&nbsp;</label>
										</div>
									</td>
									<td class="align-middle">{{ $attribute->code }}</td>
									<td class="align-middle"><a href="{{ route('admin.products.attributes.edit', $attribute) }}">{{ $attribute->name }}</a></td>
									<td class="align-middle">
                                        @foreach ($attribute->values as $item)
                                            {{ $item->value }}
                                            {{ $loop->last ? '' : ', ' }}
                                        @endforeach
                                    </td>
                                    <td class="align-middle text-center">{{ $attribute->frontend_type }}</td>
									<td class="align-middle text-center">
                                        @if ($attribute->is_filterable)
                                            <span class="badge badge-success">{{ __('Yes') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ __('No') }}</span>
                                        @endif
                                    </td>
									<td class="align-middle text-center">
                                        @if ($attribute->is_required)
                                            <span class="badge badge-success">{{ __('Yes') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ __('No') }}</span>
                                        @endif
                                    </td>
									<td class="align-middle text-center">
										<a href="{{ route('admin.products.attributes.edit', $attribute) }}" class="btn btn-icon btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
										<form action="{{ route('admin.products.attributes.destroy', $attribute) }}" method="POST" class="d-inline-block">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-times"></i></button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('js_lib')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.11.3/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-select-bs4/1.3.3/select.bootstrap4.min.js"></script>
@endpush

@push('footer')
	<script src="{{ asset('themes/admin/js/page/modules-datatables.js') }}"></script>
@endpush