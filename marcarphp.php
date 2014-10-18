
     <?php
 session_start();
  // $nome = strtoupper($_POST['nome']);
   $nome =  strtolower ($_POST['nome']);
   $nome = str_replace(' ', '', $nome);
   $nome = trim($nome, " ");
   $endereco = $_POST['endereco'];
   $x = $_POST['lat'];
   $y = $_POST['lng'];
   //$grupo = $_POST['grupos'];
   $idgrupo = $_POST['grupos'];
   $email =  $_SESSION['email'];
   
  include("conexao.php");
  require_once("Classes/Usuario.class.php");
  require_once("Classes/Ponto.class.php");
  
  $user = new UsuarioCad();
  $idusuario = $user->buscaUsuario($email);

// Seleciona ID e Nome do usuáio logado na Session

/*
$query = mysql_query("SELECT * FROM meetplace.usuarios where email = '$email'");
 while($linha = mysql_fetch_assoc($query)){
 $idusuario = $linha['idusuarios'];
 $usuario = $linha['usuario']; 
 }
 */
 /*
$query = mysql_query("SELECT * FROM meetplace.grupos where nome='$grupo'") or die(mysql_error()); 
 while($linha = mysql_fetch_assoc($query)){
 $idgrupo = $linha['idgrupos'];
 }
 */
// Inseri o ID do usuario na tabela de membros do grupo criado 
$ponto = new Ponto();
$ponto->marcaPonto($x, $y, $idusuario, $idgrupo, $nome, $endereco);
//$query = mysql_query("INSERT INTO meetplace.pontos (x,y,idusuarios,idgrupos,nome,endereco) VALUES ('$x','$y','$idusuario','$idgrupo','$nome','$endereco')") or die(mysql_error());
?>
<script language="javascript">
alert("Ponto <?=$nome?> marcado com sucesso");
</script>
<?php
mysql_close($conn);
header('location:marcar.php');
?>
     