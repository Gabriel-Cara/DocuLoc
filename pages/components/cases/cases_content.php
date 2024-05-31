<div class="container-fluid py-4">
    <div class="row">
        <div class="card">
            <!-- Header -->
            <div class="row">
                <div class="card bg-default py-2 border-radius-bottom-start-0 border-radius-bottom-end-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="text-white font-weight-bolder mt-1 mx-2">Tabela de Casos</h4>
                        
                        <a class="btn d-flex align-items-center btn-success mx-2 my-2" data-bs-toggle="modal" data-bs-target="#newCase">
                            <i class="ph ph-plus-circle" style="font-size: 18px" style="font-size: 18px;"></i>
                            &nbsp;<span class="d-none d-md-block">Criar</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Body -->
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7">
                                Responsável
                            </th>

                            <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">
                                Locador
                            </th>

                            <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">
                                Locatário
                            </th>

                            <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">
                                Progresso
                            </th>

                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">
                                Ações
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($cases_table as $case) { ?>
                            <?php
                                $user_data = getUser($case['creator']);
                                $profile_data = getProfile($case['creator']);
                                $level_data = getLevel($user_data[0]['type_of_user']);
                            ?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="<?=$profile_data[0]['profile_photo'];?>" class="avatar avatar-sm me-3"/>
                                        </div>
    
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs"><?=$user_data[0]['user_name']." ".$profile_data[0]['profile_surname'];?></h6>
    
                                            <p class="text-xs text-secondary mb-0"><?=$user_data[0]['user_email'];?></p>
                                            <p class="text-xs text-sencodary mb-0 font-weight-bold"><?=$level_data[0]['type_name'];?></p>
                                        </div>
                                    </div>
                                </td>

                                <td><h6 class="mb-0 text-xs"><?=$case['locador'];?></h6></td>
                                
                                <td class="align-middle text-sm">
                                    <span class="text-secondary text-xs font-weight-bolder"><?=$case['locatario'];?></span>
                                </td>

                                <td class="align-middle">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="progress-percentage">
                                                <?php if ($case['status'] == 'initial') { ?>
                                                    <?php if ($case['status' == 'waiting_verify']) { ?>
                                                        <span class="text-sm font-weight-bold">40%</span>
                                                    <?php } else if($case['status'] == 'verified') { ?>
                                                        <span class="text-sm font-weight-bold">60%</span>
                                                    <?php } else if($case['status'] == 'aproved') { ?>
                                                        <span class="text-sm font-weight-bold">80%</span>
                                                    <?php } else if($case['status'] == 'closed') { ?>
                                                        <span class="text-sm font-weight-bold">100%</span>
                                                    <?php } else { ?>
                                                        <span class="text-sm font-weight-bold">20%</span>
                                                    <?php } ?>
                                                <?php } ?>
                                                
                                                <?php if ($case['status'] == 'waiting_attach') { ?>
                                                    <?php if ($case['status' == 'attached']) { ?>
                                                        <span class="text-sm font-weight-bold">30%</span>
                                                    <?php } else if($case['status'] == 'waiting_verify') { ?>
                                                        <span class="text-sm font-weight-bold">45%</span>
                                                    <?php } else if($case['status'] == 'verified') { ?>
                                                        <span class="text-sm font-weight-bold">60%</span>
                                                    <?php } else if($case['status'] == 'aproved') { ?>
                                                        <span class="text-sm font-weight-bold">80%</span>
                                                    <?php } else if($case['status'] == 'closed') { ?>
                                                        <span class="text-sm font-weight-bold">100%</span>
                                                    <?php } else { ?>
                                                        <span class="text-sm font-weight-bold">15%</span>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
        
                                        <div class="progress">
                                            <!-- 
                                                Progresso 0 ~ 25% = bg-gradient-danger
                                                Progresso 26 ~ 50% = bg-gradient-warning
                                                Progresso 51 ~ 75% = bg-gradient-info
                                                Progresso 76 ~ 100% = bg-gradient-success
                                            -->
                                            <?php if ($case['status'] == 'initial') { ?>
                                                <?php if ($case['status' == 'waiting_verify']) { ?>
                                                    <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="40" style="width: 40%"></div>
                                                <?php } else if($case['status'] == 'verified') { ?>
                                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="60" style="width: 60%"></div>
                                                <?php } else if($case['status'] == 'aproved') { ?>
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="80" aria-valuemin="80" aria-valuemax="80" style="width: 80%"></div>
                                                <?php } else if($case['status'] == 'closed') { ?>
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width: 100%"></div>
                                                <?php } else { ?>
                                                    <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="20" aria-valuemin="20" aria-valuemax="20" style="width: 20%"></div>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                            <?php if ($case['status'] == 'waiting_attach') { ?>
                                                <?php if ($case['status' == 'attached']) { ?>
                                                    <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="30" aria-valuemax="30" style="width: 30%"></div>
                                                <?php } else if($case['status'] == 'waiting_verify') { ?>
                                                    <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="45" aria-valuemin="45" aria-valuemax="45" style="width: 45%"></div>
                                                <?php } else if($case['status'] == 'verified') { ?>
                                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="60" aria-valuemax="60" style="width: 60%"></div>
                                                <?php } else if($case['status'] == 'aproved') { ?>
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="80" aria-valuemin="80" aria-valuemax="80" style="width: 80%"></div>
                                                <?php } else if($case['status'] == 'closed') { ?>
                                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width: 100%"></div>
                                                <?php } else { ?>
                                                    <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="15" aria-valuemin="15" aria-valuemax="15" style="width: 15%"></div>
                                                <?php } ?>
                                            <?php } ?>                                            
                                        </div>
                                    </div>
                                </td>
        
                                <td class="d-flex px-2 py-2 gap-3 justify-content-center">
                                    <a class="btn btn-dark my-2" data-bs-toggle="modal" data-bs-target="#downloadModal<?=$case['id'];?>">
                                        <i class="ph-bold ph-cloud-arrow-down" style="font-size: 18px;"></i>
                                    </a>
        
                                    <!-- <a class="btn btn-info my-2" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                        <i class="ph-bold ph-file-arrow-up" style="font-size: 18px;"></i>
                                    </a> -->
        
                                    <!-- <a class="btn btn-info my-2" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="ph ph-pencil" style="font-size: 18px;"></i>
                                    </a> -->
        
                                    <a class="btn btn-danger my-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?=$case['id'];?>">
                                        <i class="ph ph-trash" style="font-size: 18px;"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal Download Case -->
                            <div class="modal fade" id="downloadModal<?=$case['id'];?>" tabindex="-1" role="dialog" aria-labelledby="downloadModal<?=$case['id'];?>Label" aria-hidden="true">
                                <div class="modal-dialog" style="max-width: 50%;" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex align-items-start justify-content-between">
                                            <div>                                
                                                <h5 class="modal-title text-dark" id="downloadModal<?=$case['id'];?>Label">Download do caso</h5>
                                                <small class="text-dark font-weight-normal">Selecione o modelo de contrato abaixo.</small>
                                            </div>

                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    <i class="ph-bold ph-x"></i>
                                                </span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action=".<?=PATHURL;?>pages/cases.php" id="form" method="POST">
                                                <div class="form-group col-12 col-sm-6 text-start">
                                                    <label for="modelo_contrato">Modelos</label>
                                                    <select class="form-control" id="modelo_contrato" name="modelo_contrato">
                                                        <option value="">Selecione</option>
                                                        <option value="basico">Básico</option>
                                                    </select>
                                                </div>

                                                <!-- Footer -->
                                                <div class="button-row d-flex mt-4">
                                                    <input type="hidden" name="token_case" value="<?=$case['token_case'];?>">
                                                    <input type="submit" name="download_case" value="Baixar" class="btn bg-gradient-success ms-auto mb-0">
                                                </div>
                                            </form>
                                        </div>
                                            
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Delete Case -->
                            <div class="modal fade" id="deleteModal<?=$case['id'];?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?=$case['id'];?>Label" aria-hidden="true">
                                <div class="modal-dialog" style="max-width: 50%;" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex align-items-start justify-content-between">
                                            <div>                                
                                                <h5 class="modal-title text-dark" id="deleteModal<?=$case['id'];?>Label">Deletar caso</h5>
                                                <small class="text-dark font-weight-normal">Ao deletar não será mais possível recuperar estes dados.</small>
                                            </div>

                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    <i class="ph-bold ph-x"></i>
                                                </span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action=".<?=PATHURL;?>services/cases.php" id="form" method="POST">
                                                <!-- Footer -->
                                                <div class="button-row d-flex flex-column mt-4 justify-content-center align-items-center">
                                                    <label><h4>Confirma deletar este caso?</h4></label>
                                                    <input type="hidden" name="token_case" value="<?=$case['token_case'];?>">
                                                    <input type="submit" name="delete_case" value="Confirmar o delete" class="btn bg-gradient-warning mb-0">
                                                </div>
                                            </form>
                                        </div>
                                            
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal New Case -->
            <div class="modal fade" id="newCase" tabindex="-1" role="dialog" aria-labelledby="newCaseLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 50%;" role="document">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-start justify-content-between">
                            <div>                                
                                <h5 class="modal-title text-dark" id="newCaseLabel">Cadastro de Novo Caso</h5>
                                <small class="text-dark font-weight-normal">Essas informações nos ajudaram a desenvolver todo o procedimento.</small>
                            </div>

                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="ph-bold ph-x"></i>
                                </span>
                            </button>
                        </div>

                        <div class="modal-body">                                                            
                            <div class="multisteps-form">
                                <?php require_once('.'.PATHURL.'pages/components/cases/multistep-form/nav.php'); ?>

                                <form action=".<?=PATHURL;?>services/cases.php" id="form" class="multisteps-form__form" method="POST">
                                    <?php require_once('.'.PATHURL.'pages/components/cases/multistep-form/content.php'); ?>
                                </form>
                            </div>
                        </div>
                            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>