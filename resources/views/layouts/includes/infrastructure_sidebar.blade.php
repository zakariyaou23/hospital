<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            @if (auth()->user()->role_id == 3)
            <ul>
                <li class="menu-title">Main</li>
                <li class="{{ request()->routeIs('home') ? 'active':'' }}">
                    <a href="/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ request()->routeIs('infrastructure.appointment.*') ? 'active':'' }}">
                    <a href="/infrastructure/appointment"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                </li>
            </ul>
            @else
            <ul>
                <li class="menu-title">Main</li>
                <li class="{{ request()->routeIs('home') ? 'active':'' }}">
                    <a href="/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>
                @if (auth()->user()->role_id != 4)
                <li class="{{ request()->routeIs('infrastructure.doctor.*') ? 'active':'' }}">
                    <a href="/infrastructure/doctor"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                </li>
                @endif
                <li class="{{ request()->routeIs('infrastructure.patient.*') ? 'active':'' }}">
                    <a href="/infrastructure/patient"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                </li>
                <li class="{{ request()->routeIs('infrastructure.appointment.*') ? 'active':'' }}">
                    <a href="/infrastructure/appointment"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                </li>
                <li class="{{ request()->routeIs('infrastructure.transfer.*') ? 'active':'' }}">
                    <a href="/infrastructure/transfer"><i class="fa fa-random"></i> <span>Transfers</span></a>
                </li>
                {{-- <li>
                    <a href="schedule.html"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                </li> --}}
                @if (auth()->user()->role_id != 4)
                <li class="{{ request()->routeIs('infrastructure.department.*') ? 'active':'' }}">
                    <a href="/infrastructure/department"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> Human Resource </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ request()->routeIs('infrastructure.staff.*') ? 'active':'' }}" href="/infrastructure/staff">Staff List</a></li>
                        <li><a class="{{ request()->routeIs('infrastructure.leave.*') ? 'active':'' }}" href="/infrastructure/leave">Leaves</a></li>
                        <li><a class="{{ request()->routeIs('infrastructure.attendance.*') ? 'active':'' }}" href="/infrastructure/attendance">Attendance</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ request()->routeIs('infrastructure.invoice.*') ? 'active':'' }}" href="/infrastructure/invoice">Invoices</a></li>
                        <li><a class="{{ request()->routeIs('infrastructure.attendance.*') ? 'active':'' }}" href="/infrastructure/department">Payments</a></li>
                        <li><a class="{{ request()->routeIs('infrastructure.expense.*') ? 'active':'' }}" href="/infrastructure/expense">Expenses</a></li>
                    </ul>
                </li>
                @endif
                {{-- <li class="submenu">
                    <a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="salary.html"> Employee Salary </a></li>
                        <li><a href="salary-view.html"> Payslip </a></li>
                    </ul>
                </li>
                <li>
                    <a href="chat.html"><i class="fa fa-comments"></i> <span>Chat</span> <span class="badge badge-pill bg-primary float-right">5</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-video-camera camera"></i> <span> Calls</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="voice-call.html">Voice Call</a></li>
                        <li><a href="video-call.html">Video Call</a></li>
                        <li><a href="incoming-call.html">Incoming Call</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-envelope"></i> <span> Email</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="compose.html">Compose Mail</a></li>
                        <li><a href="inbox.html">Inbox</a></li>
                        <li><a href="mail-view.html">Mail View</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-commenting-o"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-details.html">Blog View</a></li>
                        <li><a href="add-blog.html">Add Blog</a></li>
                        <li><a href="edit-blog.html">Edit Blog</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/apps/assets.html"><i class="fa fa-cube"></i> <span>/apps/Assets</span></a>
                </li>
                <li>
                    <a href="activities.html"><i class="fa fa-bell-o"></i> <span>Activities</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="expense-reports.html"> Expense Report </a></li>
                        <li><a href="invoice-reports.html"> Invoice Report </a></li>
                    </ul>
                </li> --}}
            </ul>
            @endif
        </div>
    </div>
</div>
