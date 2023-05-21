<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <span class="ms-1 font-weight-bold ">¡Hola {{auth()->user()->name}}!</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ isset($home_page)? 'active' : ''}}" href="{{ route('admin.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-pie-35 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Estadisticas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ isset($user_page) ? 'active' : '' }}" href="{{ route('admin.user-management') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Gestionar Usuarios</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ isset($medical_appointment_page) ? 'active' : '' }}" href="{{ route('admin.medical-appointment') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Solicitudes Recibidas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ isset($medical_page) ? 'active' : '' }}" href="{{ route('admin.date') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Citas</span>
                </a>
            </li>
            
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="{{ asset('img/amatuspies/logo.jpg') }}"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Ama tus pies</h6>
                    <p class="text-xs font-weight-bold mb-0">Panel administrativo</p>
                </div>
            </div>
        </div>

    </div>
</aside>
