<aside
    class="main-sidebar sidebar-dark-primary elevation-4 {{ Auth::user()->hasRole('admin') ? '' : 'background-verde' }}">
    <!-- Brand Logo -->
    <a class="nav__logo" style="text-decoration: none; padding: 10px; margin: 0 auto;" href="{{ route('mymeds') }}">
        <img src="{{ asset('assets/logo.png') }}" alt="pastilla-logo" style="width: 60px; padding-top:5px;">
        <span class="nav__logo-letra">myMeds</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <hr style="border-color: #fff;">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-regular fa-calendar"></i>
                        <p>
                            Calendario
                        </p>
                    </a>
                    <a href="{{ route('medicamentos') }}"
                        class="nav-link {{ request()->routeIs('medicamentos') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pills"></i>
                        <p>
                            Medicamentos
                        </p>
                    </a>
                    <a href="{{ route('tratamientos.index') }}"
                        class="nav-link {{ request()->routeIs('tratamientos.index') | request()->routeIs('tratamientos.create') | request()->routeIs('tratamientos.edit') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Tratamientos
                        </p>
                    </a>
                    <a href="{{ route('users.edit', Auth::user()->id) }}"
                        class="nav-link {{ request()->routeIs('users.edit') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-regular fa-user"></i>
                        <p>
                            Perfil
                        </p>
                    </a>
                    @if(Auth::user()->hasRole('admin'))
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-regular fa-users"></i>
                        <p>
                            Usuarios
                        </p>
                    </a>
                    @endif
                </li>
                <li>
                    <hr style="border-color: #fff;">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link active" style="background-color: #F36A5C; border:none;">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>Cerrar sesión</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>