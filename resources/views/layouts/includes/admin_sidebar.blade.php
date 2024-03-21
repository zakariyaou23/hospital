<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/apps/assets/img/logo-dark.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">MEDICIO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/adminlte/dist/img/{{ auth()->user()->gender }}.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->first_name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/home" class="nav-link {{ request()->routeIs('home') ? 'active':'' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->routeIs('admin.role.*') ? 'menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.role.*') ? 'active':'' }}">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            Roles
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/role/create" class="nav-link {{ request()->routeIs('admin.role.create') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/role" class="nav-link {{ request()->routeIs('admin.role.index') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->routeIs('admin.appointment.*') ? 'menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.appointment.*') ? 'active':'' }}">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>
                            Appointments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/appointment/create" class="nav-link {{ request()->routeIs('admin.appointment.create') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Appointment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/appointment" class="nav-link {{ request()->routeIs('admin.appointment.index') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Appointment List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->routeIs('staff.*') ? 'menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('staff.*') ? 'active':'' }}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Billings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/staff/create" class="nav-link {{ request()->routeIs('staff.create') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoices</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/staff" class="nav-link {{ request()->routeIs('staff.index') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Expenses</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/infrastructure" class="nav-link {{ request()->routeIs('admin.infrastructure.*') ? 'active':'' }}">
                        <i class="fas fa-school nav-icon"></i>
                        <p>Infrastructures</p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->routeIs('admin.patient.*') ? 'menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.patient.*') ? 'active':'' }}">
                        <i class="nav-icon fas fa-user-injured"></i>
                        <p>
                            Patients
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/patient" class="nav-link {{ request()->routeIs('admin.patient.index') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/staff" class="nav-link {{ request()->routeIs('staff.index') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Records</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/staff" class="nav-link {{ request()->routeIs('staff.index') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transfers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/staff" class="nav-link {{ request()->routeIs('staff.index') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Diagnosis</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->routeIs('admin.staff.*') || request()->routeIs('admin.department.*') || request()->routeIs('admin.leave_request.*') ? 'menu-open':'' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.staff.*') || request()->routeIs('admin.department.*') || request()->routeIs('admin.leave_request.*') ? 'active':'' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Human Resources
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/department" class="nav-link {{ request()->routeIs('admin.department.*') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Departments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/staff" class="nav-link {{ request()->routeIs('admin.staff.*') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Staffs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/leave_request" class="nav-link {{ request()->routeIs('admin.leave_request.*') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leave Request</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/admin/leave_request" class="nav-link {{ request()->routeIs('staff.index') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Attendance</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
