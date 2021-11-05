@extends('layouts.app')

@section('title')
	{{ __('Categories') }}
@endsection

@section('content')
	<div class="section-body">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4>{{ __('Edit Category') }}</h4>
					</div>
					<div class="card-body pt-0">
						<form action="{{ route('admin.products.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
							@csrf
                            @method('PUT')
							<div class="form-group">
								<label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" required>
								@error('name')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="parent_id">{{ __('Parent') }} <span class="text-danger">*</span></label>
								<select id="parent_id" class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" required>
									<option value="1">{{ __('None') }}</option>
									@foreach (\App\Models\Category::all() as $cat)
										<option value="{{ $cat->id }}" @if($category->parent_id === $cat->id) selected @endif>{{ $cat->name }}</option>
									@endforeach
								</select>
								@error('parent_id')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="description">{{ __('Description') }}</label>
								<textarea id="description" class="summernote-simple @error('description') is-invalid @enderror" name="description">{{ $category->description }}</textarea>
								@error('description')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="featured">{{ __('Featured') }} <span class="text-danger">*</span></label>
								<select id="featured" class="form-control @error('featured') is-invalid @enderror" name="featured" required>
									<option value="0">{{ __('No') }}</option>
									<option value="1" @if($category->featured) selected @endif>{{ __('Yes') }}</option>
								</select>
								@error('featured')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="menu">{{ __('Menu') }} <span class="text-danger">*</span></label>
								<select id="menu" class="form-control @error('menu') is-invalid @enderror" name="menu" required>
									<option value="0">{{ __('No') }}</option>
									<option value="1" @if($category->menu) selected @endif>{{ __('Yes') }}</option>
								</select>
								@error('menu')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="image">{{ __('Image') }}</label>
                                <div class="d-flex" style="gap: 5px">
                                    <div class="custom-file">
                                        <input type="file" id="image" class="custom-file-input h-100 @error('image') is-invalid @enderror" name="image" accept=".jpg, .jpeg, .png, .gif, .svg">
                                        <label class="custom-file-label" for="image">{{ __('Choose File') }}</label>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="upload-preview" class="rounded" style="background-image: url({{ $category->image ? asset('storage/uploads/'.$category->image.'') : asset('themes/admin/img/photo.svg') }})"></div>
                                </div>
							</div>
							<button type="submit" class="btn btn-primary">{{ __('Update Category') }}</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('css_lib')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
@endpush

@push('js_lib')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('themes/admin/js/jquery.uploadPreview.min.js') }}"></script>
@endpush


@push('head')
    <style>
        #upload-preview {
            background: white;
            width: auto;
            display: inline-block;
            padding: 21px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
        }
    </style>
@endpush

@push('footer')
    <script>
        (function($) {
            $.uploadPreview({
                input_field: "#image",
                preview_box: "#upload-preview",
                no_label: true
            });
        }(jQuery));
    </script>
@endpush