@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div><i class="bi bi-ban"></i> El formulario contiene errores</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
