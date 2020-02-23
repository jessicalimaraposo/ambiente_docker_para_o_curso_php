<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
/*
Definindo funções
date: 03/01/2020
*/

/*
Formas aceitáveis por convenção


Variável --> $nome_da_variavel 
Constantes --> define('CONSTANTES', "valor")
Classes --> NomeDaClasse
Méotodos/funções nomeDaFuncao()
*/

/*
function adicionarJuros( $preco, $juros = 10 )
{
    return ($preco / 100 * $juros) + $preco;
}
*/
  

/*
function adicionarJuros( &$x, $juros = 10 )
{
  $x = ($x / 100 * $juros) + $x;
}

$pproduto = 100;
echo $pproduto."<br>";//100
 
 adicionarJuros($pproduto)."<br>";
 echo $pproduto."<br>";//100
*/

$img1 = "300.jpg";
$img2 = "300.jpg";

$path = "200";
$site = "https://picsum.photos";
define('SITE_URL', 'https://jessica.com');

echo SITE_URL."/${path}/${img1}";
?>
<a href="<?php echo SITE_URL ?>">Go to HOME</a>
<?php ?>

<?php 
echo"OI"
 ?>

<h3>Hello World</h3>


