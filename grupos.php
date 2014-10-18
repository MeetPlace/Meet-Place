<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Meet Place</title>
   <script language="javascript" type="text/javascript"> 
function valida(){
if( document.dados.nome.value=="" || document.dados.nome.value.lenght < 6)
{
alert( "Preencha campo Nome corretamente!" );
document.dados.nome.focus();
return false;
}else
alert( "Ponto " + document.dados.nome.value + " adicionado com sucesso!" );
return true;
}
</script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>

<body class="">

  <div class="navbar navbar-default navbar-inverse navbar-static-top">
    <style>
      .body{padding-top:70px}
    </style>
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="marcar.php">Meet Place</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <p class="navbar-text navbar-right">
        <?php
 session_start();
 
if ( (!isset($_SESSION['email']) ) && (!isset($_SESSION['acesso']) ) ){
        ?>
  Você não está conectado</p>
        <?php
}else{
?>
<?=$_SESSION['email']?> está conectado</p>
<?php
}
?>
      </div>
    </div>
</div>

<center>
<?php
 
if ( (!isset($_SESSION['email']) ) && (!isset($_SESSION['acesso']) ) )
{
	echo "Realize o login para acessar esta página.";
	session_destroy();
}else{	
?>
</center>

<div class="navbar">
    <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		Menu
    </button>
    <div class="navbar-inner">
        <div class="nav-collapse collapse">
                <ul class="nav">
                  <li class="active"><a href="marcar.php">Home</a></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerenciar<b class="caret"></b></a>
                    	<ul class="dropdown-menu">
                        <li><a href="criargrupo.php">Criar Grupo</a></li>
                        <li><a href="adicionargrupos.php">Adicionar Grupo</a></li>
						<li><a href="grupos.php">Gerenciar Grupos</a></li>
                        <li><a href="pontos.php">Gerenciar Pontos</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

  <div class="row">
    <div class="col-md-2" align="center">
      <h2>Grupo</h2>
      <div class="btn-group">
        <br>
        <br>
        <a href="criargrupo.php" class="btn btn-default">Criar novo grupo</a>
      </div>

    </div>
    <div class="col-md-8">
      <h2>Selecionar grupos</h2>
      </br>
	  </br>
     <form role="form" id="dados" name="dados" onsubmit="return valida();" method="POST" action="excluirgrupophp.php">
	<select name="grupos" id="grupos" class="selectpicker" >
     <center>
      
    <?php
   $email =  $_SESSION['email'];
   
      include("conexao.php");
	  require_once("Classes/Usuario.class.php");
	  require_once("Classes/Grupo.class.php");
	  
	  $usuario = new UsuarioCad();
	  $idusuario = $usuario->buscaUsuario($email);
// Seleciona ID e Nome do usuáio logado na Session
/*
$query = mysql_query("SELECT * FROM meetplace.usuarios where email = '$email'");
 while($linha = mysql_fetch_assoc($query)){
 //$idusuario = $linha['idusuarios'];
 $idusuario= $linha['idusuarios'];
 //$usuario = $linha['usuario']; 
 }
 */
 $grupo = new Grupo();
 $query = $grupo->retornaGrupos($idusuario);
  
//$query = mysql_query("SELECT * FROM meetplace.grupos where idusuarios='$idusuario';") or die(mysql_error());
$total = mysql_num_rows($query);   
if($total > 0){
	
 while($linha = mysql_fetch_assoc($query)){
 //$idusuario = $linha['idusuarios'];
 $idgrupo = $linha['idgrupos'];
 $grupo = $linha['nome']; 
?>
 	<option value="<?=$idgrupo?>"><?=$grupo?></option>
 <?php
 }
 }
 ?>   <option>Selecione um grupo</option>
   </center>
  </select> 

	 </br>
     
        <input type="submit" name="excluir" id="excluir" value="Excluir"  class="btn btn-default navbar-btn navbar-right"/>
       </form>
	  
    </div>
  </div>

<?php
}
?>

</body>

</html>