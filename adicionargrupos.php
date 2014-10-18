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
function testandoNome(){
sValor = document.getElementById("nome").value;
		for( var i=0; i<= sValor.length; i++) { 
         //aqui você utiliza os caracteres que quiser
          if(((sValor.charAt(i) >= ' ') && (sValor.charAt(i) <= '/')) || ((sValor.charAt(i) >= ':') && (sValor.charAt(i) <= '@')) || ((sValor.charAt(i) >= '[') && (sValor.charAt(i) <= '^')) || (sValor.charAt(i) > 'z') || (sValor.charAt(i)=='`')){
            document.getElementById("nome").disabled = true;
            alert("Campo Nome não pode ter caracteres especiais");
            document.getElementById("nome").value = "";
            document.getElementById("nome").disabled = false;
            break;
           }
      }	
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

    <div class="col-md-1">
<div class="navbar">
    <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
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
</div>

  <div class="row">

    <div class="col-md-4">
      <h2>Adicionar Grupos</h2>
      <br>
      <form role="form" id="dados" name="dados" onsubmit="return valida();" method="POST" action="adicionargruposphp.php">
        <a>
          <label for="nome">Nome do grupo</label>
          <input type="text" class="form-control" placeholder="Nome do Grupo" id="nome" name="nome" Onkeypress="testandoNome()">
        </a>
        <br>
        <input type="submit" name="enviar" id="enviar" value="Confirmar" class="btn btn-default navbar-btn navbar-right" >
        <input name="cancelar" id="cancelar" value="Cancelar" class="btn btn-default navbar-btn navbar-right">

      </form>
</div>
<?php
}
?>

</body>

</html>