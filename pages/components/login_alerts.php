<?php if (isset($erro) && $erro == 1){ ?>
    <div class="alert alert-warning alert-dismissible fade show text-light" role="alert">
    <span class="alert-icon"><i class="ph ph-warning-diamond"></i></span>
    <span class="alert-text"><strong>Ops!</strong> <?=$msg_error;?></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
<?php } ?>