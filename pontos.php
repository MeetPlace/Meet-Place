<?php
       include("conexao.php");
	   require_once("Classes/Usuario.class.php");
	   require_once("Classes/Grupo.class.php");
	   require_once("Classes/Ponto.class.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Meet Place</title>
   <script language="javascript" type="text/javascript"> 
$('#pontos').change(function() {
    var val = $("#pontos option:selected").val();
	document.getElementById('nomeponto').value = val;
  //$.post("excluirpontophp.php", {val:val} , function( data ) {
 // $("#divpontos").append(data);
 //  alert(data);
  // }); 
  });	
   
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

  <div class="row">
    <div class="col-md-4" align="center">

    </div>
    <div class="col-md-4">
      <h2>Selecionar grupos</h2>
	  
           <form role="form" id="dados" name="dados" onsubmit="return valida();" method="POST" action="excluirgrupophp.php">
          <div id="formnomeponto" name="formnomeponto" class="col-md-1">
          
          </div>
          </form>
      
      </br>
     <form role="form" id="dados" name="dados" onsubmit="return valida();" method="POST" action="excluirpontophp.php">
    
    
    <div id="selects" name="selects" class="col-md-2">
	<select name="grupos" id="grupos" class="selectpicker" >
     <center>
      
     <?php
   $email =  $_SESSION['email'];
	   
// Seleciona ID e Nome do usuáio logado na Session
$usuario = new UsuarioCad();
$idusuario = $usuario->buscaUsuario($email);

$buscaGrupo = new Grupo();
$query = $buscaGrupo->retornaGrupoMembro($idusuario);
//$query = mysql_query("SELECT * FROM meetplace.grupo_membro where idmembro='$idusuario'") or die(mysql_error());
$total = mysql_num_rows($query);   

if($total > 0){
	
 while($linha = mysql_fetch_assoc($query)){
 //$idusuario = $linha['idusuarios'];
 $idgrupo = $linha['idgrupo']; 
 $grupo = $buscaGrupo->retornaNomeGrupo($idgrupo);
 //$grupos = mysql_query("SELECT nome FROM meetplace.grupos where idgrupos='$idgrupo';") or die(mysql_error());
/*
  while($linhagrupos = mysql_fetch_assoc($grupos)){
  $grupo = $linhagrupos['nome'];
  }
  */
?>
 <option value="<?=$idgrupo?>"><?=$grupo?></option>
 <?php
 }
 }
 ?>
   <option>_______</option>
   </center>

  </select> 
          </br>

  </br>
         <div name="divpontos" id="divpontos">
        <select class="selectpicker" name="pontos" id="pontos">

        <option>_____________</option>
    
        </select>
       </div>
       
      <div id="botoes" name="selects" class="col-md-2">
  <input type="submit" name="excluir" id="excluir" value="Excluir" class="btn btn-default navbar-btn navbar-right"/>
  <input type="submit" name="editar" id="editar" value="Editar"  class="btn btn-default navbar-btn navbar-right"/>
  </div>

    </form>

        </div>

        </div>
           
        </div>
	  
    </div>
  </div>

<script type ="text/javascript">
$('#grupos').change(function() {
    var val = $("#grupos option:selected").val();
		
         var x = document.getElementById("pontos");
         x.remove();
	
  $.post("preenchepontosphp.php", {val:val} , function( data ) {
  $("#divpontos").append(data);
  });
});

$('#pontos').change(function() {
    var val = $("#pontos option:selected").val();
	alert("hue");
	document.getElementById("nomeponto").value = val;
  //$.post("excluirpontophp.php", {val:val} , function( data ) {
 // $("#divpontos").append(data);
 //  alert(data);
  // }); 
  });	
</script>

<?php
}
?>

</body>

</html>