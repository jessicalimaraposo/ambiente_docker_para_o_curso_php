<?php
require ('conf/db.php');
$pdo        = Conexao::getInstance();

if(isset($_GET['id']) && $_GET['id'] !='' )
{
  try
  {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0){
        $user = $stmt->fetch(PDO::FETCH_OBJ);
    }
  } catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
  }
}
if( isset($user) )
{
?>

<h4>Detalhes do usuário "<?=$user->user; ?>" ----- <a href='list.php'>Lista de usuários</a></h4>
<ul>
  <li><?=$user->user; ?></li>
  <li><?=$user->name; ?></li>
  <li><?=$user->email; ?></li>
  <li><?=$user->postal_code; ?></li>
  <li>
    <a href="form.php?action=edit&id=<?=$user->id; ?>">Editar</a>
  </li>
  <li>
    <a href="delete.php?action=delete&id=<?=$user->id; ?>">Deletar</a>
  </li>
</ul>

<?php
}else
{
  echo "Erro: Não foi possível encontrar o registro solicitado no do banco de dados";
}
?>