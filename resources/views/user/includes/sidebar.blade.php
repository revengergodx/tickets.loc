   <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('user.main.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-house-user"></i>
                        <p>Головна</p>
                    </a>
                <li class="nav-item">
                    <a href="{{ route('user.ticket.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-regular fa-clipboard"></i>
                        <p>Tickets</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>
