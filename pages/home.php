<?php
    include($_SERVER['DOCUMENT_ROOT'].'/lib/config.php');
    include($_SERVER['DOCUMENT_ROOT'].'/lib/conn.php');

    $name_page = ucfirst("home");

    if ($_REQUEST['sair'] == 1) {
        desconectar();
    }
?>

<?php require_once('.'.PATHURL.'lib/include/head-pages.php'); ?>
    <body class="g-sidenav-show bg-gray-100">
        <div class="min-height-300 bg-primary position-absolute w-100"></div>

        <?php require_once('.'.PATHURL.'pages/components/sidebar.php'); ?>

        <main class="main-content position-relative border-radius-lg">
            <?php require_once('.'.PATHURL.'pages/components/navbar.php'); ?>

            <!-- Content -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="card d-flex align-items-center justify-content-center" style="height: 100vh;">
                        <h2>Dashboard</h2>
                        <p>Essa tela será um <mark>DASHBOARD</mark>!</p>
                    </div>
                </div>

                <?php require_once('.'.PATHURL.'pages/components/footer.php'); ?>
            </div>
            <!-- End Content -->
        </main>
    
        <?php require_once('.'.PATHURL.'lib/include/footer_scripts-pages.php'); ?>
    </body>
</html>