@extends('layout.admin')

@section('content_header')
    <div class="col-sm-12">
        <h3 class="mb-0">Crear Rol</h3>
        <div class="float-end">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-info btn-sm">Volver al listado</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.form-error')
            @include('includes.mensaje')
            <div class="card card-danger card-outline mb-4">
                <form id="form-general" action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-end requerido">Nombre</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $role->name }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                @include('includes.boton-form-editar')
                            </div>
                        </div>
                    </div>
                    <!--end::Footer-->
                </form>
            </div>
        </div>
    </div>
@endsection
