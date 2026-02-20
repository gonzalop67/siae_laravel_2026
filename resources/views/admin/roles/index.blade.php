@extends('layout.admin')

@section('titulo')
    Roles
@endsection

@section('styles')
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages/admin/roles/index.js') }}"></script>
@endsection

@section('content_header')
    <div class="col-sm-12">
        <h3 class="mb-0">Listado de Roles</h3>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.mensaje')
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <a class="btn btn-success btn-sm" href="{{ route('admin.roles.create') }}" role="button"><i
                            class="bi bi-plus-circle"></i> Crear Rol</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" role="table">
                        <thead>
                            <tr>
                                <th style="width: 10px" scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <div class="d-inline-flex">
                                            <a href="{{ url('/admin/roles/' . $role->id . '/edit') }}"
                                                class="btn btn-success btn-sm"><i class="bi bi-pencil"> Editar</i></a>

                                            &nbsp;

                                            <form action="{{ url('/admin/roles/' . $role->id) }}" method="POST"
                                                id="miFormulario{{ $role->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="preguntar{{ $role->id }}(event)"><i
                                                        class="bi bi-trash"></i> Eliminar</button>
                                            </form>
                                        </div>

                                        <script>
                                            function preguntar{{ $role->id }}(event) {
                                                event.preventDefault();

                                                Swal.fire({
                                                    title: "¿Está seguro?",
                                                    text: "No se podrá revertir este proceso!",
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#d33",
                                                    cancelButtonColor: "#3085d6",
                                                    confirmButtonText: "Sí, ¡elimínelo!"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('miFormulario{{ $role->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
