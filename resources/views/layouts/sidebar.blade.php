<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">Sparepart</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->segment(1) == 'items') ? 'active' : '' }}">
        <a class="nav-link" href="/items">
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
            <span>Master Item</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->segment(1) == 'orders') ? 'active' : '' }}">
        <a class="nav-link" href="/orders">
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
            <span>Penjulan</span></a>
    </li>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->segment(1) == 'reports') ? 'active' : '' }}">
        <a class="nav-link" href="/reports">
            <i class="fa fa-file" aria-hidden="true"></i>
            <span>Report Penjualan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->