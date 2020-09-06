<td>
    <div id="isActive_{{ $id }}{{ $module == 'permissions' ? '_p' : '' }}" class="btn-group"
         style="{{ $status ? '' : 'display:none' }}">

        <a href="#"
           class="statusCurrent label bg-success dropdown-toggle"
           data-toggle="dropdown" aria-expanded="false">Aktiv <span
                class="caret"></span></a>

        <ul class="dropdown-menu dropdown-menu-right">
            <li class="statusToChange">
                <a class="status-link" type="button"
                   data-id="{{ $id }}"
                   data-status="1"
                   data-module="{{ $module }}"><span
                        class="status-mark bg-danger position-left"></span>Deaktiv</a>
            </li>
        </ul>
    </div>
    <div id="isDeactive_{{ $id }}{{ $module == 'permissions' ? '_p' : '' }}" class="btn-group"
         style="{{ $status ? 'display:none' : '' }}">

        <a href="#"
           class="statusCurrent label bg-danger dropdown-toggle"
           data-toggle="dropdown" aria-expanded="false">Deaktiv
            <span class="caret"></span></a>

        <ul class="dropdown-menu dropdown-menu-right">
            <li class="statusToChange">
                <a class="status-link" type="button"
                   data-id="{{ $id }}"
                   data-status="0"
                   data-module="{{ $module }}"><span
                        class="status-mark bg-success position-left"></span>Aktiv</a>
            </li>
        </ul>
    </div>
</td>
