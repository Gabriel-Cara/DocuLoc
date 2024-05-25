<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3 d-flex justify-content-between">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                <?php if (is_null($view_datas['profile_photo']) || empty($view_datas['profile_photo']) || $view_datas['profile_photo'] == '') { ?>
                    <img src="../assets/img/logos/logomarca.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                <?php } else { ?>
                    <img src="<?=$view_datas['profile_photo'];?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                <?php } ?>
                </div>
            </div>

            <div class="col-auto my-auto">
                <div class="h-100">
                <h5 class="mb-1">
                    <?=$view_datas['user_name'];?>&nbsp;<?=$view_datas['profile_surname'];?>
                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                    Cargo aqui
                </p>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-warning text-white mb-0 px-2 py-2 d-flex align-items-center justify-content-center"  data-bs-toggle="modal" data-bs-target="#changePassword">
                <i class="ph ph-key"></i> &nbsp;&nbsp;Alterar senha
            </button>

            <!-- Modal -->
            <div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changePasswordLabel">Alterar senha</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="old_password" class="form-label">Senha atual</label>
                                    <input type="password" class="form-control" name="old_password" id="old_password" required>
                                </div>
    
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">Nova senha</label>
                                    <input type="password" class="form-control" name="new_password" id="new_password" required>
                                </div>
                            </div>
    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <input type="submit" class="btn btn-success" name="alterar_senha" value="Alterar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>