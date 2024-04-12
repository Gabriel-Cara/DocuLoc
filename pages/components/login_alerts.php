<?php if (isset($erro) && $erro == 1){ ?>
    <?php if ($msg_error != "") { ?>
        <div class="alert alert-warning alert-dismissible fade show text-light" role="alert">
            <span class="alert-icon"><i class="ph ph-warning-diamond"></i></span>
            <span class="alert-text"><strong>Ops!</strong> <?=$msg_error;?></span>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } else { ?>
        <?php foreach ($recuperar_conta as $erros) { ?>
            <div class="alert alert-warning alert-dismissible fade show text-light" role="alert">
                <span class="alert-icon"><i class="ph ph-warning-diamond"></i></span>
                <span class="alert-text"><strong>Ops!</strong> <?=$erros['message'];?></span>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
    <?php } ?>
<?php } ?>

<?php if (isset($sucesso) && $sucesso == 1){ ?>
    <div class="alert alert-success alert-dismissible fade show text-light" role="alert">
        <span class="alert-icon"><i class="ph ph-check-circle"></i></span>
        <span class="alert-text"><strong>Sucesso!</strong> <?=$msg_sucesso;?></span>
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>