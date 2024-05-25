<div style="position: absolute; right: 15px; bottom: 15px; z-index: 99;">
    <div class="alert <?php if ($code == 200 || $code == 201) { ?>alert-success<?php } else { ?>alert-danger<?php } ?> alert-dismissible fade show text-light" role="alert">
        <?php if ($code == 200 || $code == 201) { ?>
            <span class="alert-icon"><i class="ph-bold ph-check-circle"></i></span>
            <span class="alert-text"><strong>Legal!</strong> <?=$message;?></span>
        <?php } else { ?>
            <span class="alert-icon"><i class="ph-bold ph-warning-diamond"></i></span>
            <span class="alert-text"><strong>Ops!</strong> <?=$message;?></span>
        <?php } ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>