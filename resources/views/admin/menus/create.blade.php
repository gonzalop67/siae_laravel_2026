@extends('layout.admin')

@section('scripts')
<script src="{{ asset('assets/js/pages/admin/menus/crear.js') }}"></script>
@endsection

@section('content_header')
    <div class="col-sm-12">
        <h3 class="mb-0">Crear Menú</h3>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.form-error')
            @include('includes.mensaje')
            <div class="card card-primary card-outline mb-4">
                <form id="form-general" action="{{ route('admin.menus.store') }}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="nombre" class="col-md-2 col-form-label text-end requerido">Nombre</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="url" class="col-md-2 col-form-label text-end requerido">Url</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="icono" class="col-md-2 col-form-label text-end">Icono</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="icono" id="icono" value="{{ old('icono') }}">
                            </div>
                            <div class="col-md-1">
                                <span id="mostrar-icono" class="bi {{ old('icono') }}"></span>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                @include('includes.boton-form-crear')
                            </div>
                        </div>
                    </div>
                    <!--end::Footer-->
                </form>
            </div>
        </div>
    </div>
@endsection

