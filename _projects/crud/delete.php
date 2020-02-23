<?php
require ('conf/db.php');
$pdo = Conexao::getInstance();

if(
    isset($_GET['action']) && $_GET['action'] == 'delete'  &&
    isset($_GET['id']) && $_GET['id'] !='' 
  )
{

    $stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
    $stmt->bindParam(':id', $_GET['id']); 
    try {
        $stmt->execute();
        if($stmt->rowCount() > 0 )
        {
            echo "<meta http-equiv='refresh' content='0; url=list.php'>";
            echo "Registro deletado com sucesso!";
        }else
            echo "Registro não encontrado!";
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