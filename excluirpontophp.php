
     <?php

 session_start();
    include("conexao.php");
	require_once("Classes/Ponto.class.php");
 
  // $nome = strtoupper($_POST['nome']);
   //$nome =  strtolower ($_POST['nome']);
   //$nome = str_replace(' ', '', $nome);
   //$nome = trim($nome, " ");
 //  $endereco = $_POST['endereco'];
   //$grupo = $_POST['grupos'];
   $idponto = $_POST['pontos'];
   
$valor = $idponto;
$tam = strlen ($valor);
$pos = strripos($valor, '|');

	$x = substr($valor, 0,$pos);
	$y = substr($valor, $pos+1,$tam);
   
   $ponto = new Ponto();
   
   $idponto = $ponto->retornaPontoPorCord($x,$y);
   	
	$ponto->deletaPonto($idponto);
	
  echo "Ponto Deletado com Sucesso!";

  header('location:marcar.php');


?>
     