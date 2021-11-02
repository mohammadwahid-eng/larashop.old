@extends('layouts.app')

@section('title')
	{{ __('Categories') }}
@endsection

@push('css_lib')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.11.3/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-select-bs4/1.3.3/select.bootstrap4.min.css">
@endpush

@section('content')
	<div class="section-body">
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header">
						<h4>{{ __('Add New Category') }}</h4>
					</div>
					<div class="card-body pt-0">
						<form action="{{ route('admin.products.categories.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
								@error('name')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
								<input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required>
								@error('slug')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="parent_id">{{ __('Parent') }} <span class="text-danger">*</span></label>
								<select id="parent_id" class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" required>
									<option value="1">{{ __('None') }}</option>
									@foreach ($categories as $category)
										<option value="{{ $category->id }}" @if(old('parent_id') === $category->id) selected @endif>{{ $category->name }}</option>
									@endforeach
								</select>
								@error('parent_id')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="featured">{{ __('Featured') }} <span class="text-danger">*</span></label>
								<select id="featured" class="form-control @error('featured') is-invalid @enderror" name="featured" required>
									<option value="0">{{ __('No') }}</option>
									<option value="1" @if(old('featured') === 'true') selected @endif>{{ __('Yes') }}</option>
								</select>
								@error('featured')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="menu">{{ __('Menu') }} <span class="text-danger">*</span></label>
								<select id="menu" class="form-control @error('menu') is-invalid @enderror" name="menu" required>
									<option value="0">{{ __('No') }}</option>
									<option value="1" @if(old('menu') === 'true') selected @endif>{{ __('Yes') }}</option>
								</select>
								@error('menu')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="description">{{ __('Description') }}</label>
								<textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
								@error('description')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="image">{{ __('Image') }}</label>
								<div class="custom-file">
									<input type="file" id="image" class="custom-file-input h-100 @error('image') is-invalid @enderror" name="image" accept=".jpg, .jpeg, .png, .gif, .svg">
									<label class="custom-file-label" for="image">{{ __('Choose file') }}</label>
									@error('image')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<button type="submit" class="btn btn-primary">{{ __('Add New Category') }}</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="table-responsive">
					<table class="table table-striped" data-toggle="datatable">
						<thead>
							<tr>
								<th class="text-center">
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
									<td class="align-middle text-center">
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