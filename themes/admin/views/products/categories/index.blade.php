@extends('layouts.app')

@section('title')
	{{ __('Categories') }}
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
					<table class="table table-striped" data-toggle="datatable">
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
								<th class="text-center">{{ __('Products') }}</th>
								<th class="text-center">{{ __('Action') }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $category)
								<tr>
									<td class="align-middle">
										<div class="custom-checkbox custom-control">
											<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $category->id }}" name="cats[]">
											<label for="checkbox-{{ $category->id }}" class="custom-control-label">&nbsp;</label>
										</div>
									</td>
									<td class="align-middle">
										<img
											@if ($category->image)
												src="{{ asset('storage/uploads/'.$category->image.'') }}"
											@else
												src="{{ asset('themes/admin/img/photo.svg') }}"
											@endif
											width="25"
											height="20"
											alt="{{ $category->name }}">
									</td>
									<td class="align-middle"><a href="{{ route('admin.products.categories.edit', $category) }}">{{ $category->name }}</a></td>
									<td class="align-middle">{{ $category->slug }}</td>
									<td class="align-middle text-center">0</td>
									<td class="align-middle text-center">
										<a href="{{ route('admin.products.categories.edit', $category) }}" class="btn btn-icon btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
										<form action="{{ route('admin.products.categories.destroy', $category) }}" method="POST" class="d-inline-block">
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