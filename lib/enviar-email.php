<?php
    #error_reporting(E_ALL); // Caso queira debugar eventuais erros
    error_reporting(E_ALL & E_STRICT); // Caso queira debugar eventuais erros
    date_default_timezone_set('America/Sao_Paulo');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/Exception.php';

    function disparaEmail($dados_email = null) {
        $error_details = array();

        if (is_null($dados_email)) {
            $error_details[] = array(
                "error" => 1,
                "message" => "dados_null"
            );

            return $error_details;
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
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.titan.email';                     //Set the SMTP server to send through
                $mail->Port       = 587;                                    //TCP port to connect to;
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $email_disparo;                         //SMTP username
                $mail->Password   = $senha_disparo;                         //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
                $mail->SMTPOptions = array(
                    'ssl' => array(
                       'verify_peer' => false,
                       'verify_peer_name' => false,
                       'allow_self_signed' => true
                    )
                );

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

                if ($mail->send()) {
                    $mail_sent = true;
                } else {                    
                    $error_details = array(
                        "error" => 1,
                        "message" => 'Erro ao enviar o email: ' . $mail->ErrorInfo
                    );

                    return $error_details;
                }

                // Append the sent email to the IMAP server's "Sent" folder
                // Enable the IMAP extension from your php.ini file
                $imap_stream = imap_open("{imap.titan.email:993/ssl/novalidate-cert}", $email_disparo, $senha_disparo);

                if ($imap_stream) {
                    imap_append($imap_stream, "{imap.titan.email:993/ssl/novalidate-cert}Sent", $mail->getSentMIMEMessage());
                    imap_close($imap_stream);

                    $imap_append = true;
                } else {                    
                    $error_details = array(
                        "error" => 1,
                        "message" => 'Erro ao anexar um e-mail à pasta "Enviados".'
                    );

                    return $error_details;
                }

                if ($mail_sent === true && $imap_append === true) {
                    return true;
                } else {
                    $error_details = array(
                        "error" => 1,
                        "message" => 'Erro ao recuperar conta.'
                    );

                    return $error_details;
                }
            } catch (Exception $e) {                
                $error_details = array(
                    "error" => 1,
                    "message" => 'Error sending email: ' . $e->getMessage()
                );

                return $error_details;
            }
        }
    }
?>