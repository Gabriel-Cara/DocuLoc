<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

    function disparaEmail($dados_email = null) {
        if (is_null($dados_email)) {
            $erro_msg = 'dados_null';
            return $erro_msg;
        } else {
            $email_disparo = $dados_email['sender_email'];
            $nome_disparo = $dados_email['sender_name'];
            $senha_disparo = $dados_email['sender_pass'];
            $email_destino = $dados_email['to_email'];
            $nome_destino = $dados_email['to_name'];
            $assunto = $dados_email['subject'];
            $mensagem = $dados_email['message'];

            if ($dados_email['cc_email'] !== null && $dados_email['cc_name'] !== null) {
                $email_copia = $dados_email['cc_email'];
                $nome_copia = $dados_email['cc_name'];
                $existe_copia = true;
            } else {
                $existe_copia = false;
            }

            if ($dados_email['attachment'] !== null && $dados_email['attachment_name']) {
                $anexo = $dados_email['attachment'];
                $anexo_nome = $dados_email['attachment_name'];
                $existe_anexo = true;
            } else {
                $existe_anexo = false;
            }

            // Inicia a classe PHPMailer 
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.titan.email';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $email_disparo;                         //SMTP username
                $mail->Password   = $senha_disparo;                         //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`;

                $mail->CharSet = PHPMailer::CHARSET_UTF8;

                //Recipients
                $mail->setFrom($email_disparo, $nome_disparo);
                $mail->addAddress($email_destino, $nome_destino);     //Add a recipient

                if ($existe_copia === true) {
                    $mail->addCC($email_copia, $nome_copia);
                }

                //Attachments
                if ($existe_anexo === true) {
                    $mail->addAttachment($anexo, $anexo_nome);         //Add attachments
                }

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $assunto;
                $mail->Body    = $mensagem;

                $mail->send();
                return true;
            } catch (Exception $e) {
                return false;
            }
        }
    }
?>