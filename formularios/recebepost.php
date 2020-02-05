<?php


if( isset($_POST) )
{
//  var_dump($_POST);
echo "O nome dela é: ". $_POST["nome"] . " ".$_POST["sobrenome"];
}