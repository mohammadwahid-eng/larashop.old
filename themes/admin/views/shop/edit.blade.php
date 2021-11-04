@extends('layouts.app')

@section('title')
    {{ __('Edit Shop') }}
@endsection

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Shop\'s Information') }}</h4>
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('admin.shops.update', $shop) }}" method="POST" enctype="multipart/form-data">
                            @method("PUT")
                            <div class="form-group">
								<label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $shop->name }}" required>
								@error('name')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group">
								<label for="description">{{ __('Description') }}</label>
                                <textarea class="summernote-simple">{{ $shop->description }}</textarea>
								@error('description')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group">
								<label for="admin_id">{{ __('Owner') }} <span class="text-danger">*</span></label>
                                <select name="admin_id" id="admin_id" class="form-control Select2" required>
                                    @foreach (\App\Models\Admin::all() as $admin)
                                        <option value="{{ $admin->id }}" @if($admin->id === $shop->admin->id) selected @endif>{{ $admin->fullname() }}</option>
                                    @endforeach
                                </select>
								@error('admin_id')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <button type="submit" class="btn btn-primary">{{ __("Save") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css_lib')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
@endpush

@push('js_lib')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@push('footer')
    <script>
        $(document).ready(function() {
            $('.Select2').select2();
        });
    </script>
@endpush