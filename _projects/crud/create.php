<?php
require ('conf/db.php');
$pdo = Conexao::getInstance();

if(
    isset($_POST['user']) &&
    isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['pass'])
)
{

    $stmt = $pdo->prepare('
    INSERT INTO users 
    (user, name, email, pass, postal_code )
    VALUES 
    ( :user, :name, :email, :pass, :postal_code )
    ');
    try {
        $stmt->execute(
            [
                ':user'             => $_POST['user'],
                ':name'             => $_POST['name'],
                ':email'            => $_POST['email'],
                ':pass'             => $_POST['pass'],
                ':postal_code'      => (isset($_POST['postal_code']))  ? $_POST['postal_code'] : null,
            ]
        );

        echo "<meta http-equiv='refresh' content='0; url=list.php'>";
        echo "Registro inserido com sucesso! Id:{$pdo->lastInsertId()}";
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
}