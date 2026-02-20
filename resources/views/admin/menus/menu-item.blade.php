@if ($item['submenu'] == [])
    <li class="dd-item dd3-item" data-id="{{ $item['id'] }}">
        <div class="dd-handle dd3-handle"></div>
        <div class="dd3-content {{ $item['url'] == '#' ? 'font-weight-bold' : '' }} menu_link">
            <a href="{{ route('admin.menus.edit', ['id' => $item['id']]) }}" title="Editar este menú">{{ $item['nombre'] . ' | Url->' . $item['url'] }}
                Icono -> <i style="font-size:20px;" class="bi {{ isset($item['icono']) ? $item['icono'] : '' }}"></i>
            </a>
            <div class="float-end">
                <a href="{{ route('admin.menus.destroy', ['id' => $item['id']]) }}"
                    class="eliminar-menu tooltipsC pull-right" title="Eliminar este menú"><i
                        class="text-danger bi bi-trash3-fill"></i></a>
            </div>
        </div>
    </li>
@else
    <li class="dd-item dd3-item" data-id="{{ $item['id'] }}">
        <div class="dd-handle dd3-handle"></div>
        <div class="dd3-content {{ $item['url'] == '#' ? 'font-weight-bold' : '' }} menu_link">
            <a href="{{ route('admin.menus.edit', ['id' => $item['id']]) }}" title="Editar este menú">{{ $item['nombre'] . ' | Url->' . $item['url'] }}
                Icono -> <i style="font-size:20px;"
                    class="bi {{ isset($item['icono']) ? $item['icono'] : '' }}"></i></a>
            <div class="float-end">
                <a href="{{ route('admin.menus.destroy', ['id' => $item['id']]) }}"
                    class="eliminar-menu tooltipsC pull-right" title="Eliminar este menú"><i
                        class="text-danger bi bi-trash3-fill"></i></a>
            </div>
        </div>
        <ol class="dd-list">
            @foreach ($item['submenu'] as $submenu)
                @include('admin.menus.menu-item', ['item' => $submenu])
            @endforeach
        </ol>
    </li>
@endif
