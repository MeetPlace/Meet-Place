
     <?php
 session_start();
  // $nome = strtoupper($_POST['nome']);
   //$nome =  strtolower ($_POST['nome']);
   //$nome = str_replace(' ', '', $nome);
   //$nome = trim($nome, " ");
  // $endereco = $_POST['endereco'];
   //$grupo = $_POST['grupos'];
   $idgrupo = $_POST['grupos'];
   
    include("conexao.php");
	require_once("Classes/Grupo.class.php");
	
	$grupo = new Grupo();
	
	$grupo->deletaMembros($idgrupo);
    $grupo->deletaGrupo($idgrupo);

header('location:marcar.php');

?>
     