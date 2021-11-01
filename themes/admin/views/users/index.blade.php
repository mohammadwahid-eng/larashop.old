@extends('layouts.app')

@section('title')
    {{ __('All User') }}
@endsection

@push('css_lib')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs4/1.11.3/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-select-bs4/1.3.3/select.bootstrap4.min.css">
@endpush

@section('content')
    <div class="table-responsive">
        <table class="table table-striped" id="table-2">
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
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="align-middle">
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                            </div>
                        </td>
                        <td class="align-middle"><img alt="image" src="{{ asset('themes/admin/img/avatar/avatar-5.png') }}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian"></td>
                        <td class="align-middle"><a href="#">{{ $user->name }}</a></td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-icon btn-sm btn-secondary">{{ __('Details') }}</a>
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