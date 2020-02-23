<?php
require ('conf/db.php');
$pdo        = Conexao::getInstance();

try
{
  $stmt = $pdo->query("SELECT * FROM users");
  $stmt->execute();

  if ($stmt->rowCount() > 0){
    $users = $stmt->fetchAll(PDO::FETCH_OBJ);
  }
} catch (PDOException $erro) {
  echo "Erro: ".$erro->getMessage();
}
if( isset($users) )
{
  $users_count = count($users);

  echo "<h4>Usuários Total: {$users_count} ----- <a href='form.php'>Cadastrar</a></h4>";
  echo "<ol>";
  foreach ($users as $user)
  {
    echo "<li>[{$user->id}] 
    <a href='details.php?id={$user->id}'>{$user->user} {$user->name}</a>|
    {$user->email} | <a href='form.php?action=edit&id={$user->id}'>Editar</a> | 
    <a href='delete.php?action=delete&id={$user->id}'>Deletar</a>
    </li>";
  }
  echo "</ol>";

}else
{
  $users = false;
  echo "Erro: Não foi possível encontrar registros no do banco de dados";
}