<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
     <?php
 session_start();
  // $nome = strtoupper($_POST['nome']);
   $nome =  $_POST['nome'];
   $cidade = $_POST['cidades'];
   $tema = $_POST['temas'];
   $uf = $_POST['uf'];
  // $nome =  strtolower ($_POST['nome']);
   //$nome = str_replace(' ', '', $nome);
   //$nome = trim($nome, " ");
 
   $email =  $_SESSION['email'];
   
     include("conexao.php");
	 require_once("Classes/Usuario.class.php");
	 require_once("Classes/Grupo.class.php");

// Seleciona ID e Nome do usuáio logado na Session

$usuario = new UsuarioCad();
$idusuario = $usuario->buscaUsuario($email);

$grupo = new Grupo();

//Informa valores para a Classe Grupo
$grupo->setGrupo($nome, $idusuario, $cidade, $uf, $tema);

//Cria grupo no BD
$grupo->criaGrupo();

//Busca ID do grupo
$idgrupo = $grupo->buscaGrupo($nome);
echo $idgrupo;
// Cria Relacionamento Grupo_Usuario Na Tabela grupo_membro do banco
$grupo->salvaGrupoMembro($idgrupo, $idusuario);
	
mysql_close($conn);
header('location:marcar.php');


?>
     
</body>
</html>