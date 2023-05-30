<div class="vh-100 pb-2" id="mynavbar">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary h-100" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link @if(Route::currentRouteName() == 'admin.dashboard') active @endif" aria-current="page">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                    Home
                </a>
            </li>
            <li>
                <a href="{{route('admin.projects.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.projects.index') active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Projects
                </a>
            </li>
            <li>
                <a href="{{route('profile.edit')}}" class="nav-link @if(Route::currentRouteName() == 'admin.projects.edit') active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Profile
                </a>
            </li>
            <li>
                <a href="{{route('admin.projects.create')}}" class="nav-link @if(Route::currentRouteName() == 'admin.projects.create') active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Create +
                </a>
            </li>
            <li>
                <a href="{{route('admin.skills.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.skills.index') active @endif">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Skill +
                </a>
            </li>
        </ul>
    </div>
</div>