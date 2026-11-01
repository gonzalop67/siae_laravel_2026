{{-- Barra lateral principal (Sidebar Container) --}}
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

    {{-- Marca / Logo del Sistema --}}
    <div class="sidebar-brand">
        {{-- Usamos la variable $setting que viene desde tu BD si está compartida en la vista --}}
        <a href="{{ url('/admin') }}" class="brand-link text-decoration-none">
            <span class="brand-text fw-light"><b>S. I. A. E.</b></span>
        </a>
    </div>

    {{-- Contenedor del Menú con OverlayScrollbars --}}
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                {{-- Opción General para Todos los Autenticados --}}
                <li class="nav-item">
                    <a href="{{ url('/admin') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Inicio / Dashboard</p>
                    </a>
                </li>

                {{-- RESTRICCIÓN POR ROLES: Ejemplo para Rol 'Administrador' o ID correspondiente --}}
                {{-- Validamos usando la sesión que creaste en tu controlador o la relación directa del usuario --}}
                @if(Auth::user()->roles->contains('name', 'Administrador'))

                    <li class="nav-header">MÓDULO ADMINISTRATIVO</li>

                    {{-- Gestión de Personal / Usuarios --}}
                    <li class="nav-item {{ Request::is('admin/usuarios*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ Request::is('admin/usuarios*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>
                                Personal / Usuarios
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/usuarios') }}" class="nav-link {{ Request::is('admin/usuarios') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Lista de Usuarios</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/usuarios/create') }}" class="nav-link {{ Request::is('admin/usuarios/create') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Crear Usuario</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Configuración del Sistema --}}
                    <li class="nav-item">
                        <a href="{{ url('admin/configuracion') }}" class="nav-link {{ Request::is('admin/configuracion') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-gear-fill"></i>
                            <p>Configuración General</p>
                        </a>
                    </li>
                @endif

                {{-- EJEMPLO: Sección para otro Rol (Ej: 'Docente', 'Usuario', etc.) --}}
                @if(Auth::user()->roles->contains('name', 'Docente'))
                    <li class="nav-header">MÓDULO ACADÉMICO</li>
                    <li class="nav-item">
                        <a href="{{ url('admin/calificaciones') }}" class="nav-link {{ Request::is('admin/calificaciones*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-journal-bookmark-fill"></i>
                            <p>Calificaciones</p>
                        </a>
                    </li>
                @endif

                {{-- Botón de Cerrar Sesión (Apunta a la ruta 'logout' de tu AuthController) --}}
                <li class="nav-item mt-4">
                    <a href="#" class="nav-link link-danger"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Cerrar Sesión</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>
