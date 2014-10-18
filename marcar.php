<!DOCTYPE html>
<html>

<head>

  <title>Meet Place</title>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <script type="text/javascript" src="js/map.js"></script>
       
       
       <script language="javascript" type="text/javascript"> 
function centralizarPonto(){
teste();
}
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
function testandoEnd(){
sValor = document.getElementById("endereco").value;
		for( var i=0; i<= sValor.length; i++) { 
         //aqui você utiliza os caracteres que quiser
          if(((sValor.charAt(i) >= '*') && (sValor.charAt(i) <= '/')) || ((sValor.charAt(i) >= ':') && (sValor.charAt(i) <= '@')) || ((sValor.charAt(i) >= '[') && (sValor.charAt(i) <= '^')) || (sValor.charAt(i) > 'z') || (sValor.charAt(i)=='`')){
            document.getElementById("endereco").disabled = true;
            alert("Campo Nome Endereço pode ter caracteres especiais");
            document.getElementById("endereco").value = "";
            document.getElementById("endereco").disabled = false;
            break;
           }
      }	
}

</script>
       
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
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>

  <div class="row">
    <div class="col-md-2" align="center">

    </div>
    <div class="col-md-6">
      <h2>Marcar Ponto</h2>
 
      <form role="form" id="dados" name="dados" onsubmit="return valida();" method="POST" action="marcarphp.php">
        <a>     <label for="nome">Nome do ponto</label>
               <input type="text" class="form-control" placeholder="Nome do ponto" id="nome" name="nome" onKeyPress="testandoNome()"> <br>
               <input type="text" class="form-control" placeholder="Endereco do ponto" id="endereco" name="endereco" onKeyPress="testandoEnd()">
                <label for="lat">Coordenadas do Google Maps:</label>
    		<label for="lat">Lat:</label>
    		<input type="text" name="lat" id="lat" value="0" /> 
    		<label for="lng">Lng:</label>
    		<input type="text" name="lng" id="lng" value="0" />
                         </a> 
            
      <br>
	        <label for="grupos">Grupos:</label> 
  
    <select name="grupos" id="grupos" class="selectpicker">
     <center>
      
    <?php
   $email =  $_SESSION['email'];
   
    include("conexao.php");
	require_once("Classes/Usuario.class.php");
    require_once("Classes/Grupo.class.php");
	
	$usuarioBusca = new UsuarioCad();
	$grupoBusca = new Grupo();
	// Seleciona ID e Nome do usuáio logado na Session
	$idusuario = $usuarioBusca->buscaUsuario($email);

/*
$query = mysql_query("SELECT * FROM meetplace.usuarios where email = '$email'");
 while($linha = mysql_fetch_assoc($query)){
 $idusuario = $linha['idusuarios'];
 //$usuario = $linha['usuario']; 
 }
 */
 
   $query = $grupoBusca->retornaGrupoMembro($idusuario);
//$query = mysql_query("SELECT * FROM meetplace.grupo_membro where idmembro='$idusuario'") or die(mysql_error());
$total = mysql_num_rows($query);   


if($total > 0){
	
 while($linha = mysql_fetch_assoc($query)){
	 
 //$idusuario = $linha['idusuarios'];
 $idgrupo = $linha['idgrupo']; 
 
 $grupo = $grupoBusca->retornaNomeGrupo($idgrupo);
 /*
 $grupos = mysql_query("SELECT nome FROM meetplace.grupos where idgrupos='$idgrupo';") or die(mysql_error());

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
  
  
<script type ="text/javascript">
$('#grupos').change(function() {
    var val = $("#grupos option:selected").val();
		
         var x = document.getElementById("pontos");
         x.remove();
	
  $.post("preenchepontosphp.php", {val:val} , function( data ) {
  $("#divpontos").append(data);
  });
});
</script>
  
  
  <input type="submit" name="enviar" id="enviar" value="Confirmar"  class="btn btn-default navbar-btn navbar-right"/>
  <input name="cancelar" id="cancelar" value="Cancelar"  class="btn btn-default navbar-btn navbar-right" href="marcar.php" />
  </form>
  
    </div>
    <div class="col-md-2" align="center">
      <h2>Pontos</h2>
	    <span style="padding-left:20px">
        <center>
         <div name="divpontos" id="divpontos">
        <select class="selectpicker" name="pontos" id="pontos">

        <option>Selecione um ponto</option>
    
        </select>
        </div>
  </center>
  </span>

      </div>
    </div>
  </div>
  
<?php
}
?>
<script type ="text/javascript">
function centralizaPonto(){
	//document.getElementById('map-canvas').innerHTML = "";
	//$("#divpontos").append(' <div align="center" id="map-canvas" style="width:100%; height:50%"/> ');
	val = $("#pontos option:selected").val();

	val = val.split("|");
	
selecionaPonto(val[0],val[1]);

createMarker(val[0],val[1]);

//selecionaPonto(37.199706, -3.603516);
}
</script>

    	<div align="center" id="map-canvas" style="width:100%; height:50%"/>

</body>
</html>