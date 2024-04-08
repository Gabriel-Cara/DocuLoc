<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <!-- Pagination -->
        <nav aria-label="breadcrumb">        
            <h5 class="font-weight-bolder text-white mb-0">Olá! <?=$_COOKIE['user'];?></h5>
        </nav>
        <!-- End Pagination -->

        <!-- Buttons -->
        <div class="d-flex align-items-center gap-5">
            <a href="javascript:;" class="nav-link d-xl-none text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
                </div>
            </a>
            
            <a href="?sair=1" class="btn bg-danger text-white">
                <i class="ph ph-sign-out me-2"></i>
                Sair    
            </a>
        </div>
        <!-- End Buttons -->
    </div>
</nav>
<!-- End Navbar -->