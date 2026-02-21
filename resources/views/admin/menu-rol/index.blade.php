@extends('layout.admin')

@section('titulo')
    Menús - Roles
@endsection

@section('styles')
@endsection

@section('scripts')
    <script>
        const base_url = "{{ env('APP_URL') }}";
    </script>
    <script src="{{ asset('assets/js/pages/admin/menu-rol/index.js') }}"></script>
@endsection

@section('content_header')
    <div class="col-sm-12">
        <h3 class="mb-0">Menús - Roles</h3>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.mensaje')
            <div class="card card-primary card-outline mb-4">
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" style="font-size: 9pt;" id="tabla-data"
                        role="table">
                        <thead>
                            <tr>
                                <th>Menú</th>
                                @foreach ($roles as $id => $name)
                                    <th style="text-align: center">{{ $name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $key => $menu)
                                @if ($menu['menu_id'] != 0)
                                    @break
                                @endif
                                <tr>
                                    <td class="font-weight-bold"><i class="bi bi-arrows-fullscreen"></i>
                                        {{ $menu['nombre'] }}</td>
                                    @foreach ($roles as $id => $nombre)
                                        <td class="text-center">
                                            <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                                data-menuid={{ $menu['id'] }} value="{{ $id }}"
                                                {{ in_array($id, array_column($menusRoles[$menu['id']], 'id')) ? 'checked' : '' }}>
                                        </td>
                                    @endforeach
                                </tr>
                                @foreach ($menu['submenu'] as $key => $hijo)
                                    <tr>
                                        <td style="padding-left:20px"><i class="bi bi-arrow-right"></i>
                                            {{ $hijo['nombre'] }}</td>
                                        @foreach ($roles as $id => $nombre)
                                            <td class="text-center">
                                                <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                                    data-menuid={{ $hijo['id'] }} value="{{ $id }}"
                                                    {{ in_array($id, array_column($menusRoles[$hijo['id']], 'id')) ? 'checked' : '' }}>
                                            </td>
                                        @endforeach
                                    </tr>
                                    @foreach ($hijo['submenu'] as $key => $hijo2)
                                        <tr>
                                            <td style="padding-left:30px"><i class="bi bi-arrow-right"></i>
                                                {{ $hijo2['nombre'] }}
                                            </td>
                                            @foreach ($rols as $id => $nombre)
                                                <td class="text-center">
                                                    <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                                        data-menuid={{ $hijo2['id'] }} value="{{ $id }}"
                                                        {{ in_array($id, array_column($menusRoles[$hijo2['id']], 'id')) ? 'checked' : '' }}>
                                                </td>
                                            @endforeach
                                        </tr>
                                        @foreach ($hijo2['submenu'] as $key => $hijo3)
                                            <tr>
                                                <td style="padding-left:40px"><i class="bi bi-arrow-right"></i>
                                                    {{ $hijo3['nombre'] }}
                                                </td>
                                                @foreach ($rols as $id => $nombre)
                                                    <td class="text-center">
                                                        <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                                            data-menuid={{ $hijo3['id'] }} value="{{ $id }}"
                                                            {{ in_array($id, array_column($menusRoles[$hijo3['id']], 'id')) ? 'checked' : '' }}>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
