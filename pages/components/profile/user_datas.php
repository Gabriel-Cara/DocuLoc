<div class="col-md-12">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <p class="mb-0">Editar Perfil</p>
                <button class="btn btn-primary btn-sm ms-auto">Configurações</button>
            </div>
        </div>

        <div class="card-body">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                <p class="text-uppercase text-sm">Informações do usuário</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="profile_user" class="form-control-label">Usuário</label>
                            <input class="form-control" type="text" name="profile_user" id="profile_user" value="<?=$view_datas['user_email'];?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="profile_email" class="form-control-label">E-mail</label>
                            <input class="form-control" type="email" name="profile_email" id="profile_email" value="<?=$view_datas['user_email'];?>">
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="profile_name" class="form-control-label">Nome</label>
                            <input class="form-control" type="text" name="profile_name" id="profile_name" value="<?=$view_datas['user_name'];?>">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="profile_surname" class="form-control-label">Sobrenome</label>
                            <input class="form-control" type="text" name="profile_surname" id="profile_surname" value="<?=$view_datas['profile_surname'];?>">
                        </div>
                    </div>
            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="profile_image" class="form-control-label">Foto de perfil</label>
                            <input class="form-control" type="file" name="profile_image" id="profile_image">
                            <input type="hidden" name="url_profile_image" id="url_profile_image" value="<?=$view_datas['profile_photo'];?>">
                        </div>
                    </div>                
                </div>
            
                <hr class="horizontal dark">            
                <p class="text-uppercase text-sm">Informaçoes de Residência</p>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="profile_address" class="form-control-label">Endereço</label>
                            <input class="form-control" type="text" name="profile_address" id="profile_address" value="<?=$view_datas['profile_address'];?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="profile_postalcode" class="form-control-label">CEP</label>
                            <input class="form-control" type="text" name="profile_postalcode" id="profile_postalcode" value="<?=$view_datas['profile_postal_code'];?>">
                        </div>
                    </div>
            
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="profile_district" class="form-control-label">Bairro</label>
                            <input class="form-control" type="text" name="profile_district" id="profile_district" value="<?=$view_datas['profile_district'];?>">
                        </div>
                    </div>
            
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="profile_city" class="form-control-label">Cidade</label>
                            <input class="form-control" type="text" name="profile_city" id="profile_city" value="<?=$view_datas['profile_city'];?>">
                        </div>
                    </div>
            
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="profile_state" class="form-control-label">Estado</label>
                            <input class="form-control" type="text" name="profile_state" id="profile_state" value="<?=$view_datas['profile_state'];?>">
                        </div>
                    </div>
            
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="profile_country" class="form-control-label">País</label>
                            <input class="form-control" type="text" name="profile_country" id="profile_country" value="<?=$view_datas['profile_country'];?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="form-group">
                            <input type="submit" value="Editar" name="editar" id="editar" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </form>

            <button type="button" id="button-modal-croppie" class="btn btn-block btn-default mb-3" style="display: none;" data-bs-toggle="modal" data-bs-target="#croppie-modal">Open Croopie Modal</button>
            <div class="modal fade" id="croppie-modal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-center">
                                    <h3 class="font-weight-bolder text-info text-gradient">Ajustar imagem</h3>
                                    <p class="mb-0">Defina abaixo sua imagem de perfil</p>
                                </div>

                                <div class="card-body">
                                    <div id="preview-crop-image"></div>
                                </div>

                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-modal-croopie" style="display: none;">Close</button>
                                    <button class="btn btn-info md-3" id="define-croopie">Definir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>