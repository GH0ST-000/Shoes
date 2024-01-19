



<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard-pro/pages/dashboards/analytics.html " target="_blank">
            <img src="{{asset('assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Admin Panel</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <hr class="horizontal light mt-0">
            <li class="nav-item">
                <a  href="{{url('admin/dashboard')}}" class="nav-link text-white " aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">dashboard</i>
                    <span class="nav-link-text ms-2 ps-1">Dashboards</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/products')}}" class="nav-link text-white "  role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">web</i>
                    <span class="nav-link-text ms-2 ps-1">Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/stocks')}}" class="nav-link text-white "  role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">content_paste</i>
                    <span class="nav-link-text ms-2 ps-1">Stock Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('admin/orders')}}" class="nav-link text-white " aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">money</i>
                    <span class="nav-link-text ms-2 ps-1">Order</span>
                </a>
            </li>


        </ul>
    </div>
</aside>
