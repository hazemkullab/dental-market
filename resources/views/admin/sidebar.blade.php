<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('website.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-tooth"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> Dental Market </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="true"
            aria-controls="collapseCategories">
            <i class="fas fa-fw fa-tag"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Categories:</h6>
                <a class="collapse-item" href="{{ route('admin.categories.index') }}">All Categories</a>
                <a class="collapse-item" href="{{ route('admin.categories.create') }}">Add New</a>
                <a class="collapse-item" href="{{ route('admin.categories.trash') }}">Trash</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDealers" aria-expanded="true"
                aria-controls="collapseDealers">
                <i class="fas fa-fw fa-store"></i>
                <span>Dealers</span>
            </a>
            <div id="collapseDealers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Dealers:</h6>
                    <a class="collapse-item" href="{{ route('admin.dealers.index') }}">All Dealers</a>
                    <a class="collapse-item" href="{{ route('admin.dealers.create') }}">Add New</a>
                    <a class="collapse-item" href="{{ route('admin.dealers.trash') }}">Trash</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true"
                    aria-controls="collapseProducts">
                    <i class="fas fa-fw fa-arrow-right"></i>
                    <span>Products</span>
                </a>
                <div id="collapseProducts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Products:</h6>
                        <a class="collapse-item" href="{{ route('admin.products.index') }}">All Products</a>
                        <a class="collapse-item" href="{{ route('admin.products.create') }}">Add New</a>
                        <a class="collapse-item" href="{{ route('admin.products.trash') }}">Trash</a>
                    </div>
                </div>
            </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
