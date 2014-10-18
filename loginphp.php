<?php
 session_start();
 
   $email = strtolower($_POST['email']);
   $email = str_replace(' ', '', $email);
   $email = trim($email, " ");
   $senha = $_POST['senha'];
 
   include("conexao.php");
   require_once("Classes/Login.class.php");
   
   $login = new Login();
   $login->setLogin($email,$senha);
   $senhabanco = $login->verSenha($email);
 
 if(  ($senhabanco == $senha)  ){
	 $_SESSION['email'] = $email;
	 $_SESSION['acesso'] = true;
	 header('location:marcar.php');
 }else{
	 $_SESSION['email'] = null;
	 $_SESSION['acesso'] = false;
	 session_destroy();
	 header('location:index.html');
 }
	
?>