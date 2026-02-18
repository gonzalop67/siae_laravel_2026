@if (session("mensaje"))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div><i class="bi bi-check-lg"></i> Mensaje SIAE</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
            <li>{{ session("mensaje") }}</li>
        </ul>
    </div>
@endif
