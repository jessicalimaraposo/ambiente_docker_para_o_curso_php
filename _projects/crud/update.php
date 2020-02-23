<?php
require ('conf/db.php');
$pdo = Conexao::getInstance();

if(
    isset($_POST['id']) &&
    isset($_POST['user']) &&
    isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['pass'])
)
{

    $stmt = $pdo->prepare('
        UPDATE users 
        SET
        user = :user, 
        name = :name, 
        email = :email, 
        pass = :pass, 
        postal_code = :postal_code 
        WHERE id = :id
    ');

    try {
        $stmt->execute(
            [
                ':id'               => $_POST['id'],
                ':user'             => $_POST['user'],
                ':name'             => $_POST['name'],
                ':email'            => $_POST['email'],
                ':pass'             => $_POST['pass'],
                ':postal_code'      => (isset($_POST['postal_code']))  ? $_POST['postal_code'] : null,
            ]
        );

        echo "<meta http-equiv='refresh' content='0; url=list.php'>";
        echo "Registro atualizado com sucesso! Id:{$_POST['id']}";
    } catch(PDOException $e) {
        echo "<hr>";
        /**
         * $e->errorInfo:
         * array (size=3)
         * 0 => string '23000' (length=5)
         * 1 => int 1062
         * 2 => string 'Duplicate entry '1' for key 'PRIMARY''
         */
        $error_list = [
            '23000'     =>  'Entrada duplicada. Valor informado já existe.',
            'default'   =>  'Erro ao salvar dados',
        ];

        if(array_key_exists($e->errorInfo[0], $error_list))
        {
            echo $error_list[$e->errorInfo[0]].' <br> '.$e->errorInfo[2];
        }else
        {
            echo $error_list['default'].' <br> '.$e->errorInfo[2] . "<br>";
            echo "Error code: " . $e->errorInfo[0] . "<br>";
            echo 'Error: ' . $e->getMessage();
        }
        echo "<hr>";
    }
}else
{
     echo "<meta http-equiv='refresh' content='0; url=list.php'>";
     echo "Dados incorretos";
}