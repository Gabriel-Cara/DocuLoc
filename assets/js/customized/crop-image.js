var crop = $('#preview-crop-image').croppie({   
    enableExif: true, // Ativa a leitura de orientação para renderizar corretamente a imagem    
    enableOrientation: true, // Ativa orientação personalizada
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    }, // O recipiente interno do croppie. A parte visível da imagem
    boundary: { 
        width: 250, 
        height: 250
    }, // O recipiente externo do croppie.
});

// Executar a instrução quando o usuário selecionar uma imagem
$('#profile_image').on('change', function() {
    $('#button-modal-croppie').trigger('click');

    // FileReader para ler de forma assíncrona o conteúdo dos arquivos
    var reader = new FileReader();

    // onload - Execute após ler o conteúdo
    reader.onload = function(e) {
        crop.croppie('bind', {
            url: e.target.result
        });
    };

    // O método readAsDataURL é usado para ler o conteúdo do tipo Blob ou File
    reader.readAsDataURL(this.files[0]);
});

// Executar a instrução quando o usuário clicar no botão "definir"
$('#define-croopie').on('click', function() {
    crop.croppie('result', {
        type: 'canvas', // Tipo de arquivo permitido - base64, html, blob
        size: 'viewport', // O tamanho da imagem cortada
    }).then(function (img) {
        // Enviar os dados para um arquivo PHP        
        $.ajax({
            url: "../services/upload_profile_image.php", // Enviar os dados para o arquivo upload_profile_image.php
            type: "POST", // Método utilizado para enviar os dados
            data: { // Dados que devem ser enviados
                "imagem": img
            },
            success: function (data) {
                $('#url_profile_image').val(data);                
            },
        });        
    });

    // Fechar o modal
    $('#close-modal-croopie').trigger('click');
});