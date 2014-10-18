
     <?php
 session_start();
  // $nome = strtoupper($_POST['nome']);
   $nome = $_POST['nome'];
  // $nome = str_replace(' ', '', $nome);
   //$nome = trim($nome, " ");
 
   $email =  $_SESSION['email'];
   
    include("conexao.php");
	require_once("Classes/Usuario.class.php");
    require_once("Classes/Grupo.class.php");

// Seleciona ID e Nome do usuáio logado na Session
$usuario = new UsuarioCad();
$grupo = new Grupo();

$idusuario = $usuario->buscaUsuario($email);
$idgrupo = $grupo->buscaGrupo($nome);
$grupo->salvaGrupoMembro($idgrupo, $idusuario);
   /*
   $usuario =  strtolower ($usuario);
   $usuario = str_replace(' ', '', $usuario);
   $usuario = trim($usuario, " ");
   */
	
mysql_close($conn);
header('location:marcar.php');

?>
     