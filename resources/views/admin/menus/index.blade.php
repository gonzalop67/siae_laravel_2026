@extends('layout.admin')

@section('titulo')
    Menús
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/js/jquery-nestable/jquery.nestable.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery-nestable/jquery.nestable.js') }}"></script>
    <script src="{{ asset('assets/js/pages/admin/menus/index.js') }}"></script>
@endsection

@section('content_header')
    <div class="col-sm-12">
        <h3 class="mb-0">Listado de Menús</h3>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.mensaje')
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <a class="btn btn-success btn-sm" href="{{ route('admin.menus.create') }}" role="button"><i
                            class="bi bi-plus-circle"></i> Crear Menú</a>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach ($menus as $key => $item)
                                @if ($item['menu_id'] != 0)
                                    @break
                                @endif
                                @include('admin.menus.menu-item', ['item' => $item])
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
