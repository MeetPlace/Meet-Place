<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro</title>
</head>

<body>
     <?php
 session_start();
 
   $email = strtolower($_POST['email']);
   $email = str_replace(' ', '', $email);
   $email = trim($email, " ");
   $senha = $_POST['senha1'];
  // $usuario = strtoupper($_POST['usuario']);
  
	$usuario = strtolower($_POST['usuario']);
    $usuario = str_replace(' ', '', $usuario);
    $usuario = trim($usuario, " ");
 
    include("conexao.php");
    require_once("Classes/Usuario.class.php");
	
//consulta sql – inserção – Inserindo os dados na tabela cadastro, nos campos, id(autoincrement), nome e email
    $usuarioCad = new UsuarioCad();
	$usuarioCad->setUsuario($usuario, $email, $senha);
	$usuarioCad->cadastraUsuario();
//fecha a conexão com o banco

mysql_close($conn);
	 $_SESSION['email'] = $email;
	 $_SESSION['acesso'] = true;
header('location:marcar.php');
?>
     
</body>
</html>