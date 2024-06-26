<!-- Sidebar -->
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main" style="z-index: 900;">
    <!-- Header Sidebar -->
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?=PATHURL;?>home.php">
        <img src=".<?=PATHURL;?>assets/img/logos/logotipo.png" class="navbar-brand-img h-100" alt="main_logo">
      </a>
    </div>
    <!-- End Header Sidebar -->

    <hr class="horizontal dark mt-0">

    <!-- Body Sidebar -->
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- First Step -->
            <li class="nav-item">
                <a class="nav-link <?php if($name_page == 'Home'){ echo 'active'; } ?>" href="<?=PATHURL;?>home.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ph ph-house text-primary text-lg opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Home</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if($name_page == 'Casos'){ echo 'active'; } ?>" href="<?=PATHURL;?>casos.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ph ph-folder-open text-warning text-lg opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Casos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if($name_page == 'Funcionarios'){ echo 'active'; } ?>" href="<?=PATHURL;?>funcionarios.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ph ph-users-three text-info text-lg opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Funcionários</span>
                </a>
            </li>
            <!-- End First Step -->

            <!-- Second Step -->
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Páginas da Conta</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if($name_page == 'Perfil'){ echo 'active'; } ?>" href="<?=PATHURL;?>perfil.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ph ph-user-circle text-dark text-lg opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Perfil</span>
                </a>
            </li>

            <!-- <li class="nav-item">
            <a class="nav-link <?php if($name_page == 'Financeiro'){ echo 'active'; } ?>" href="<?=PATHURL;?>financeiro.php">
                <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ph ph-credit-card text-success text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Financeiro</span>
            </a>
            </li> -->
            <!-- End Second Step -->
        </ul>
    </div>
    <!-- End Body Sidebar -->
</aside>
<!-- End Sidebar -->