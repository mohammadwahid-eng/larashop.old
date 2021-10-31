@section('title')
    {{ __('All Products') }}
@endsection

<x-app-layout>
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
                    <th>{{ __('SKU') }}</th>
                    <th>{{ __('Stock') }}</th>
                    <th>{{ __('Price') }}</th>
                    <th>{{ __('Categories') }}</th>
                    <th>{{ __('Tags') }}</th>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="align-middle">
                        <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                    </td>
                    <td class="align-middle"><img alt="image" src="{{ asset('themes/admin/img/avatar/avatar-5.png') }}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian"></td>
                    <td class="align-middle"><a href="#">Create a mobile app</a></td>
                    <td class="align-middle">BP063-0001</td>
                    <td class="align-middle"><div class="badge badge-success">In Stock</div></td>
                    <td class="align-middle">$100</td>
                    <td class="align-middle"><a href="#">Men</a></td>
                    <td class="align-middle"><a href="#">Shirts</a>, <a href="#">Pants</a></td>
                    <td class="align-middle">2018-01-20</td>
                    <td class="align-middle">
                        <a href="#" class="btn btn-icon btn-sm btn-secondary">{{ __('Details') }}</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>