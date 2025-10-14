<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div class="logo-wrapper">
        <a class="menu-link" href="{{ route('dashboard') }}">
            <img class="img-fluid" src="{{ asset('storage/logos/logo.png') }}" alt="site-logo">
        </a>
        <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a class="menu-link" href="{{ route('dashboard') }}"><img class="img-fluid"
                src="{{ asset('storage/logos/logo-icon.png') }}" alt=""></a></div>
    <nav class="sidebar-main">
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a class="menu-link" href="{{ route('dashboard') }}"><img class="img-fluid"
                            src="{{ asset('storage/logos/logo-icon.png') }}" alt=""></a>
                    <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2"
                            aria-hidden="true"></i></div>
                </li>
                <li class="pin-title sidebar-main-title">
                    <div>
                        <h6>Anclados</h6>
                    </div>
                </li>
                <li class="sidebar-main-title">
                    <div>
                        <h6>Menú Principal</h6>
                    </div>
                </li>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav menu-link"
                        href="{{ route('dashboard') }}">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"> </use>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- @canAny(['certificates.upload', 'certificates.sended']) --}}
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-sample-page') }}"></use>
                            </svg><span class="lan-7-1">Certificados</span></a>
                        <ul class="sidebar-submenu">
                            {{-- @can('certificates.upload') --}}
                                <li><a class="menu-link" href="{{ route('certificates.import') }}">Importar Planilla</a></li>
                            {{-- @endcan --}}
                            {{-- @can('teachers.show') --}}
                                <li><a class="menu-link" href="{{ route('certificates.shipments') }}">Enviados</a></li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                {{-- @endcanAny --}}
                {{-- @can('courses.show') --}}
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav menu-link"
                            href="{{ route('courses.index') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-learning') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-learning') }}"> </use>
                            </svg>
                            <span>Cursos</span>
                        </a>
                    </li>
                {{-- @endcan --}}
                {{-- @canAny(['students.show', 'teacher.show']) --}}
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-social') }}"></use>
                            </svg><span class="lan-7-1">Personas</span></a>
                        <ul class="sidebar-submenu">
                            {{-- @can('students.show') --}}
                                <li><a class="menu-link" href="{{ route('students.index') }}">Estudiantes</a></li>
                            {{-- @endcan --}}
                            {{-- @can('teachers.show') --}}
                                <li><a class="menu-link" href="{{ route('teachers.index') }}">Docentes</a></li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                {{-- @endcanAny --}}
                @canany(['users.show', 'roles.show','permissions.show'])
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                            </svg><span class="lan-7-1">Usuarios</span></a>
                        <ul class="sidebar-submenu">
                            @can('users.show')
                                <li><a class="menu-link" href="{{ route('users.index') }}">Lista de Usuarios</a></li>
                            @endcan
                            @can('roles.show')
                                <li><a class="menu-link" href="{{ route('roles.index') }}">Roles</a></li>
                            @endcan
                            @can('permissions.show')
                                <li><a class="menu-link" href="{{ route('permissions.index') }}">Permisos</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @can('company.show')
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav menu-link"
                            href="{{ route('company.show') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#setting') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-setting') }}"> </use>
                            </svg>
                            <span>Parámetros</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </nav>
</div>
<!-- Page Sidebar Ends-->
