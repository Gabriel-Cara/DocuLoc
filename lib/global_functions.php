<?php
    function desconectar() {
        setcookie('user', '', time() - 3600, '/');
        setcookie('token', '', time() - 3600, '/');
        setcookie('access', '', time() - 3600, '/');

        session_start();
        session_destroy();

        header('location: .'.PATHURL.'login.php');
        exit();
    }

    function validate() {
        if ($_COOKIE['token'] == '' || empty($_COOKIE['token']) || !isset($_COOKIE['token'])) {
            header('location: .'.PATHURL.'login.php');
            exit();
        }
    }

    function saveOnDB($datas = array(), $table_name=null) 
    {
        global $pdo;
        global $table_prefix;

        $columns = '';
        $values_bind = '';
        $count_values = 1;
        $values_unbinded = array();
        $last_key = array_key_last($datas);
        foreach ($datas as $colum => $data) {
            if ($last_key != $colum) {
                $columns .= "{$colum},";
                $values_bind .= '?,';
            } else {
                $columns .= "{$colum}";
                $values_bind .= '?';
            }

            $values_unbinded[$count_values] = $data;
            $count_values += 1;
        }

        $sql = "INSERT INTO {$table_prefix}{$table_name} ({$columns}) VALUES ({$values_bind})";
        $statement = $pdo->prepare($sql);
        foreach ($values_unbinded as $position => $value) {
            $statement->bindValue($position, $value);
        }

        if ($statement->execute() === false) {
            $return_data = array(
                'code' => 500,
                'message' => 'Erro ao checar os dados, tente mais tarde.'
            );
        } else {
            $return_data = array(
                'code' => 201,
                'message' => "Caso criado com sucesso! Código do caso é {$datas['token_case']}"
            );
        }

        return $return_data;
    }

    function deleteOnDB($token_case=null, $table_name=null)
    {
        global $pdo;
        global $table_prefix;

        $sql = "DELETE FROM {$table_prefix}{$table_name} WHERE token_case=?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $token_case);

        if ($statement->execute() === false) {
            $return_data = array(
                'code' => 500,
                'message' => 'Erro ao deletar caso, tente mais tarde.'
            );
        } else {
            $return_data = array(
                'code' => 200,
                'message' => "Caso deletado com sucesso!"
            );
        }

        return $return_data;
    }

    function getCases($type_of_user=null, $team_tokens=null)
    {
        global $pdo;
        global $table_prefix;

        if ($type_of_user == 1) {
            $sql = "SELECT * FROM {$table_prefix}cases";
            $statement = $pdo->prepare($sql);
        } else if ($type_of_user == 2) {
            $sql = "SELECT * FROM {$table_prefix}cases WHERE creator IN (?)";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $team_tokens);
        } else {
            $sql = "SELECT * FROM {$table_prefix}cases WHERE creator=?";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $_COOKIE['token']);
        }

        // Executa a query
        if ($statement->execute() === false) {
            $return_data = array(
                'code' => 500,
                'message' => 'Erro ao buscar casos, tente mais tarde.'
            );
        } else {
            $return_data = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $return_data;
    }
    
    function getCaseByTokenCase($token_case=null)
    {
        global $pdo;
        global $table_prefix;
                
        $sql = "SELECT * FROM {$table_prefix}cases WHERE token_case=?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $token_case);

        // Executa a query
        if ($statement->execute() === false) {
            $return_data = array(
                'code' => 500,
                'message' => 'Erro ao buscar caso, tente mais tarde.'
            );
        } else {
            $return_data = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $return_data;
    }

    function getUser($user_token=null)
    {
        global $pdo;
        global $table_prefix;

        $sql = "SELECT * FROM {$table_prefix}users WHERE user_token=?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $user_token);

        if ($statement->execute() === false) {
            $return_data = array(
                'code' => 500,
                'message' => 'Erro ao buscar usuário, tente mais tarde.'
            );
        } else {
            $return_data = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $return_data;
    }

    function getProfile($user_token=null)
    {
        global $pdo;
        global $table_prefix;

        $sql = "SELECT * FROM {$table_prefix}profile WHERE user_token=?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $user_token);

        if ($statement->execute() === false) {
            $return_data = array(
                'code' => 500,
                'message' => 'Erro ao buscar perfil, tente mais tarde.'
            );
        } else {
            $return_data = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $return_data;
    }

    function getLevel($type_of_user=null)
    {
        global $pdo;
        global $table_prefix;

        $sql = "SELECT * FROM {$table_prefix}users_types WHERE id=?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $type_of_user);

        if ($statement->execute() === false) {
            $return_data = array(
                'code' => 500,
                'message' => 'Erro ao buscar cargo, tente mais tarde.'
            );
        } else {
            $return_data = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $return_data;
    }
?>
