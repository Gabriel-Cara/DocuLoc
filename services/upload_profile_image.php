<?php
    $imagem = filter_input(INPUT_POST, 'imagem', FILTER_DEFAULT);

    http_response_code(200);
    echo $imagem;