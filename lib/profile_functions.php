<?php
    function editUserData($data_save=null)
    {
        if (is_null($data_save) || empty($data_save) || !is_array($data_save)) {
            $error_details = array(
                'code' => 400,
                'message' => 'Erro ao editar usuário. Tente novamente mais tarde.'
            );

            return $error_details;
        } else {
            $select_user = selectUser();

            if ($select_user === false) {
                $error_details = array(
                    'code' => 404,
                    'message' => 'Usuário não encontrado. Tente novamente mais tarde.'
                );
    
                return $error_details;
            } else {
                updateUser($data_save);
                $select_profile = selectProfile();

                if ($select_profile === false) {
                    $insert_profile = insertProfileData($data_save);

                    if ($insert_profile === false) {
                        $error_details = array(
                            'code' => 500,
                            'message' => 'Não foi possível adicionar as informações. Tente novamente mais tarde.'
                        );
            
                        return $error_details;
                    } else {
                        return true;
                    }
                } else {
                    $update_profile = updateProfileData($data_save);

                    if ($update_profile === false) {
                        $error_details = array(
                            'code' => 500,
                            'message' => 'Não foi possível editar as informações. Tente novamente mais tarde.'
                        );
            
                        return $error_details;
                    } else {
                        return true;
                    }
                }
            }
        }
    }

    function selectUser()
    {
        global $pdo;
        global $table_prefix;

        $status = 1;
        $verify_bd = "SELECT * FROM {$table_prefix}users WHERE user_token=? AND user_status=? LIMIT 1";
        $statement = $pdo->prepare($verify_bd);
        $statement->bindValue(1, $_COOKIE['token']);
        $statement->bindValue(2, $status);
        $statement->execute();

        if ($statement->rowCount() < 1) {
            return false;
        } else {
            return true;
        }
    }

    function updateUser($data_save=null)
    {
        global $pdo;
        global $table_prefix;

        if (is_null($data_save) || empty($data_save) || !is_array($data_save)) {
            return false;
        } else {            
            $sql_user = "UPDATE {$table_prefix}users SET user_name=?, user_email=?, user_login=? WHERE user_token=?";
            $statement_user = $pdo->prepare($sql_user);
            $statement_user->bindValue(1, $data_save['profile_name']);
            $statement_user->bindValue(2, $data_save['profile_email']);
            $statement_user->bindValue(3, md5($data_save['profile_email']));
            $statement_user->bindValue(4, $_COOKIE['token']);

            if ($statement_user->execute() === false) {
                return false;                    
            } else {
                return true;
            }
        }
    }

    function selectProfile()
    {
        global $pdo;
        global $table_prefix;

        $status = 1;
        $verify_bd = "SELECT * FROM {$table_prefix}profile WHERE user_token=? AND `status`=? LIMIT 1";
        $statement = $pdo->prepare($verify_bd);
        $statement->bindValue(1, $_COOKIE['token']);
        $statement->bindValue(2, $status);
        $statement->execute();

        if ($statement->rowCount() < 1) {
            return false;
        } else {
            return true;
        }
    }    

    function insertProfileData($data_save=null)
    {
        global $pdo;
        global $table_prefix;

        if (is_null($data_save) || empty($data_save) || !is_array($data_save)) {
            return false;
        } else {            
            $sql_insert = "INSERT INTO {$table_prefix}profile (user_token, profile_surname, profile_photo, profile_address, profile_district, profile_city, profile_state, profile_country, profile_postal_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $statement_insert = $pdo->prepare($sql_insert);
            $statement_insert->bindValue(1, $_COOKIE['token']);
            $statement_insert->bindValue(2, $data_save['profile_surname']);
            $statement_insert->bindValue(3, $data_save['url_profile_image']);
            $statement_insert->bindValue(4, $data_save['profile_address']);
            $statement_insert->bindValue(5, $data_save['profile_district']);
            $statement_insert->bindValue(6, $data_save['profile_city']);
            $statement_insert->bindValue(7, $data_save['profile_state']);
            $statement_insert->bindValue(8, $data_save['profile_country']);
            $statement_insert->bindValue(9, $data_save['profile_postalcode']);

            if ($statement_insert->execute() === false) {
                return false;
            } else {
                return true;
            }
        }
    }

    function updateProfileData($data_save=null)
    {
        global $pdo;
        global $table_prefix;

        if (is_null($data_save) || empty($data_save) || !is_array($data_save)) {
            return false;
        } else {
            $sql_update = "UPDATE {$table_prefix}profile SET profile_surname=?, profile_photo=?, profile_address=?, profile_district=?, profile_city=?, profile_state=?, profile_country=?, profile_postal_code=? WHERE user_token=?";
            $statement_update = $pdo->prepare($sql_update);
            $statement_update->bindValue(1, $data_save['profile_surname']);
            $statement_update->bindValue(2, $data_save['url_profile_image']);
            $statement_update->bindValue(3, $data_save['profile_address']);
            $statement_update->bindValue(4, $data_save['profile_district']);
            $statement_update->bindValue(5, $data_save['profile_city']);
            $statement_update->bindValue(6, $data_save['profile_state']);
            $statement_update->bindValue(7, $data_save['profile_country']);
            $statement_update->bindValue(8, $data_save['profile_postalcode']);
            $statement_update->bindValue(9, $_COOKIE['token']);

            if ($statement_update->execute() === false) {
                return false;                    
            } else {
                return true;
            }
        }
    }

    function dataUserProfile()
    {
        global $pdo;
        global $table_prefix;

        $sql_userprofile = "SELECT us.*, prof.* FROM {$table_prefix}users AS us LEFT JOIN {$table_prefix}profile AS prof ON us.user_token = prof.user_token WHERE us.user_token=? LIMIT 1";

        $statement_userprofile = $pdo->prepare($sql_userprofile);
        $statement_userprofile->bindValue(1, $_COOKIE['token']);
        $statement_userprofile->execute();

        if ($statement_userprofile->rowCount() < 1) {
            return false;
        } else {
            return $statement_userprofile->fetch(PDO::FETCH_ASSOC);
        }
    }

    function editPassword($data_save=null)
    {
        global $pdo;
        global $table_prefix;

        $selected_user = dataUserProfile();

        if ($selected_user !== false) {
            $current_pass = $selected_user['user_password'];

            if ($current_pass != md5($data_save['old_password'])) {
                $error_details = array(
                    'code' => 400,
                    'message' => 'Senha atual digitada não é igual a senha atual real.'
                );
    
                return $error_details;
            } else {
                $sql_updatepass = "UPDATE {$table_prefix}users SET user_password=? WHERE user_token=?";
                $statement_updatepass = $pdo->prepare($sql_updatepass);
                $statement_updatepass->bindValue(1, md5($data_save['new_password']));
                $statement_updatepass->bindValue(2, $_COOKIE['token']);
                
                if ($statement_updatepass->execute() === false) {
                    $error_details = array(
                        'code' => 500,
                        'message' => 'Não foi possível alterar a senha. Tente novamente mais tarde.'
                    );

                    return $error_details;                    
                } else {
                    return true;
                }    
            }
        }
    }
?>
