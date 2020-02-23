<?php
require ('conf/db.php');
$pdo        = Conexao::getInstance();
$action     = 'create.php';

if(isset($_GET['action']) && $_GET['action'] == 'edit' )
{
  if(isset($_GET['id']) && $_GET['id'] !='' )
  {
    try
    {
      $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
      $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
      $stmt->execute();
      if ($stmt->rowCount() > 0){
          $user = $stmt->fetch(PDO::FETCH_OBJ);
          $action     = 'update.php';
      } else {
        $user = false;
        echo "Erro: Não foi possível encontrar o registro solicitado no do banco de dados";
      }
    } catch (PDOException $erro) {
      echo "Erro: ".$erro->getMessage();
    }
  }
}

$to_edit = isset($_GET['action']) && $_GET['action'] == 'edit';

if(!isset($_GET['action']) || $to_edit && $user )
{
?>

<form action="<?=$action ?>" method="post">

<?php if($to_edit): ?>
    <input value="<?= (isset($user->id))? $user->id : ''; ?>" name="id" placeholder="id" type="hidden" required /> <br>
<?php endif ?>

    <input value="<?= (isset($user->user))? $user->user : ''; ?>" name="user" placeholder="user" required /> <br>

    <input value="<?= (isset($user->name))? $user->name : ''; ?>" name="name" placeholder="name" required /> <br>

    <input value="<?= (isset($user->email))? $user->email : ''; ?>" name="email" placeholder="email" required /> <br>

    <input value="<?= (isset($user->pass))? $user->pass : ''; ?>" name="pass" placeholder="pass" required /> <br>

    <input value="<?= (isset($user->postal_code))? $user->postal_code : ''; ?>" name="postal_code" placeholder="postal_code" /> <br>

    <button type="submit">
        Enviar
    </button>
</form>
<?php
}
?>