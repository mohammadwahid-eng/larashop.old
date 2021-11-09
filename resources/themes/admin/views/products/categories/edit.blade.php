@extends('layouts.app')

@section('title')
	{{ __('Update Category') }}
@endsection

@section('content')
	<div class="section-body">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body pt-4">
						<form action="{{ route('admin.products.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" autofocus required data-slugify-source>
								@error('name')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
								<input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $category->slug }}" data-slugify-target>
								@error('slug')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="parent_id">{{ __('Parent') }} <span class="text-danger">*</span></label>
								<select id="parent_id" class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" required>
									<option value="null">{{ __('None') }}</option>
									@foreach (\App\Models\Category::all() as $cat)
										@if ($cat->id === $category->id)
											@continue
										@endif
										<option value="{{ $cat->id }}" @if($category->parent_id === $cat->id) selected @endif>{{ ucwords($cat->name) }}</option>
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
								<label for="is_featured">{{ __('Featured') }} <span class="text-danger">*</span></label>
								<select id="is_featured" class="form-control @error('is_featured') is-invalid @enderror" name="is_featured" required>
									<option value="0">{{ __('No') }}</option>
									<option value="1" @if($category->is_featured) selected @endif>{{ __('Yes') }}</option>
								</select>
								@error('is_featured')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="in_menu">{{ __('Menu') }} <span class="text-danger">*</span></label>
								<select id="in_menu" class="form-control @error('in_menu') is-invalid @enderror" name="in_menu" required>
									<option value="0">{{ __('No') }}</option>
									<option value="1" @if($category->in_menu) selected @endif>{{ __('Yes') }}</option>
								</select>
								@error('in_menu')
									<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>
                            <div class="form-group">
								<label for="image">{{ __('Image') }}</label>
                                <div class="d-flex" style="gap: 5px">
									<div class="custom-file w-25">
                                        <input type="file" id="image" class="custom-file-input h-100 @error('image') is-invalid @enderror" name="image" accept=".jpg, .jpeg, .png, .gif, .svg">
                                        <label class="custom-file-label" for="image">{{ __('Choose File') }}</label>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
									<div class="upload-preview rounded" style="background-image: url({{ $category->image ? asset('storage/uploads/'.$category->image.'') : asset('themes/admin/img/placeholder.png') }})"></div>
									<button class="btn btn-link text-danger px-2 invisible remove-preview" type="button"><i class="fas fa-times"></i></button>
                                </div>
							</div>
							<div class="d-flex justify-content-between">
								<div>
									<button type="submit" class="btn btn-primary">{{ __('Update Category') }}</button>
									<a href="{{ route('admin.products.categories.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
								</div>
								<a href="{{ route('admin.products.categories.destroy', $category) }}" class="btn btn-danger delete" data-id="{{ $category->id }}">{{ __('Delete') }}</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<form method="POST" class="deleteForm d-none">
		@csrf
		@method('DELETE')
	</form>
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
        .upload-preview {
            background: white;
            width: auto;
            display: inline-block;
            padding: 20px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
			border: 1px solid #e4e6fc;
        }
    </style>
@endpush

@push('footer')
    <script>
        (function($) {
			//UploadPreview
            $.uploadPreview({
                input_field: "#image",
                preview_box: ".upload-preview",
                label_field: ".custom-file-label",
				success_callback: function() {
					$('.remove-preview').removeClass('invisible');
				}
            });

			// Remove image
			$('.remove-preview').click(function(e) {
				e.preventDefault();
				$(this).addClass('invisible');
				$("#image").val("");
				$('.upload-preview').css({
					backgroundImage: "url({{ asset('themes/admin/img/placeholder.png') }})",
				});
			});

			//Slugify
			$('[data-slugify-source]').keyup(function() {
				$('[data-slugify-target]').val($(this).val().trim().toLowerCase().replace(/[^a-zA-Z0-9]+/g,'-'));
			});

			//Delete Category
			$(document).on('click','.delete',function(e){
				e.preventDefault();
				if(!confirm("Are you sure?")) return;

				let elem = $(this),
					id = elem.data('id'),
					action = elem.attr('href'),
					form = $('.deleteForm');

				form.attr("action", action);
				form.submit();
			});
        }(jQuery));
    </script>
@endpush