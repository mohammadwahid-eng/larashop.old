@extends('layouts.app')

@section('title')
    {{ __('All Shops') }}
@endsection

@section('title_add_new_btn')
    <a href="{{ route('admin.shops.create') }}" class="btn btn-sm btn-primary ml-3">{{ __('Add New') }}</a>
@endsection

@push('css_lib')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.11.3/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-select-bs4/1.3.3/select.bootstrap4.min.css">
@endpush

@section('content')
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
                    <th>{{ __('Products') }}</th>
                    <th>{{ __('Customers') }}</th>
                    <th>{{ __('Orders') }}</th>
                    <th>{{ __('Rating') }}</th>
                    <th>{{ __('Revenue') }}</th>
                    <th>{{ __('Joined') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shops as $shop)
                    <tr>
                        <td class="align-middle">
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $shop->id }}" name="shops[]">
                                <label for="checkbox-{{ $shop->id }}" class="custom-control-label">&nbsp;</label>
                            </div>
                        </td>
                        <td class="align-middle">
                            <img
                                src="{{ asset('themes/admin/img/avatar/avatar-5.png') }}"
                                class="rounded-circle"
                                width="30"
                                alt="{{ $shop->name }}">
                        </td>
                        <td class="align-middle font-weight-bold">{{ $shop->name }}</td>
                        <td class="align-middle"></td>
                        <td class="align-middle">0</td>
                        <td class="align-middle">0</td>
                        <td class="align-middle">0</td>
                        <td class="align-middle">0</td>
                        <td class="align-middle">{{ $shop->created_at }}</td>
                        <td class="align-middle">
                            <a href="{{ route('admin.shops.edit', $shop) }}" class="btn btn-icon btn-sm btn-secondary">{{ __('Details') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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