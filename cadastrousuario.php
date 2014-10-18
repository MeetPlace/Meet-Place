<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Meet Place</title>
  <script language="javascript" type="text/javascript">
    function valida(){
    if(document.dados.usuario.value=="" || document.dados.usuario.value.length < 8)
    {
    alert( "Preencha campo Usuario ID corretamente!" );
    document.dados.usuario.focus();
    return false;
    }
    if( document.dados.email.value=="" || document.dados.email.value.indexOf('@')==-1 || document.dados.email.value.indexOf('.')==-1 )
    {
    alert( "Preencha campo E-MAIL corretamente!" );
    document.dados.email.focus();
    return false;
    }
    if (document.dados.senha1.value=="" || document.dados.senha1.value1.length < 6) {
    alert("Preencha a senha corretamente.");
    document.dados.senha1.focus();
    return false;
    }
    if (document.dados.senha2.value=="" || document.dados.senha2.value1.length < 6) {
    alert("Preencha a senha corretamente.");
    document.dados.senha2.focus();
    return false;
    }
	 if ( (document.dados.senha2.value) != (document.dados.senha1.value) ) {
    alert("Senhas não correspondem");
    document.dados.senha1.focus();
    return false;
    }
    return true;
    }
	function testandoUsuario(){
sValor = document.getElementById("usuario").value;
		for( var i=0; i<= sValor.length; i++) { 
         //aqui você utiliza os caracteres que quiser
          if(((sValor.charAt(i) >= ' ') && (sValor.charAt(i) <= '/')) || ((sValor.charAt(i) >= ':') && (sValor.charAt(i) <= '@')) || ((sValor.charAt(i) >= '[') && (sValor.charAt(i) <= '^')) || (sValor.charAt(i) > 'z') || (sValor.charAt(i)=='`')){
            document.getElementById("usuario").disabled = true;
            alert("Campo Usuário não pode ter caracteres especiais");
            document.getElementById("usuario").value = "";
            document.getElementById("usuario").disabled = false;
            break;
           }
      }	
}
	function testandoEmail(){
sValor = document.getElementById("email").value;
		for( var i=0; i<= sValor.length; i++) { 
         //aqui você utiliza os caracteres que quiser
          if((sValor.charAt(i) == ' ') || (sValor.charAt(i) == '*') || ((sValor.charAt(i) == '"') && (sValor.charAt(i) == "'")) || ((sValor.charAt(i) == '[') && (sValor.charAt(i) == '^')) || (sValor.charAt(i) == '(') || (sValor.charAt(i)=='`') || (sValor.charAt(i) == ')') || (sValor.charAt(i) == '~') || (sValor.charAt(i) == ']') || (sValor.charAt(i) =='´')){
            document.getElementById("email").disabled = true;
            alert("Campo Email não pode ter caracteres especiais ou espaços");
            document.getElementById("email").value = "";
            document.getElementById("email").disabled = false;
            break;
           }
      }	
}
	function testandoSenha1(){
sValor = document.getElementById("senha1").value;
		for( var i=0; i<= sValor.length; i++) { 
         //aqui você utiliza os caracteres que quiser
                    if((sValor.charAt(i) == ' ') || (sValor.charAt(i) == '*') || ((sValor.charAt(i) == '"') && (sValor.charAt(i) == "'")) || ((sValor.charAt(i) == '[') && (sValor.charAt(i) == '^')) || (sValor.charAt(i) == '(') || (sValor.charAt(i)=='`') || (sValor.charAt(i) == ')') || (sValor.charAt(i) == '~') || (sValor.charAt(i) == ']') || (sValor.charAt(i) =='´')){
            document.getElementById("senha1").disabled = true;
            alert("Campo Senha não pode ter caracteres especiais");
            document.getElementById("senha2").value = "";
		    document.getElementById("senha1").value = "";
            document.getElementById("senha1").disabled = false;
            break;
           }
      }	
}

   function testandoSenha2(){	  
sValor = document.getElementById("senha2").value;
		for( var i=0; i<= sValor.length; i++) { 
         //aqui você utiliza os caracteres que quiser
                    if((sValor.charAt(i) == ' ') || (sValor.charAt(i) == '*') || ((sValor.charAt(i) == '"') && (sValor.charAt(i) == "'")) || ((sValor.charAt(i) == '[') && (sValor.charAt(i) == '^')) || (sValor.charAt(i) == '(') || (sValor.charAt(i)=='`') || (sValor.charAt(i) == ')') || (sValor.charAt(i) == '~') || (sValor.charAt(i) == ']') || (sValor.charAt(i) =='´')){
            document.getElementById("senha2").disabled = true;
            alert("Campo Senha não pode ter caracteres especiais");
            document.getElementById("senha2").value = "";
		    document.getElementById("senha1").value = "";
            document.getElementById("senha2").disabled = false;
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

<body>
  <div class="navbar navbar-default navbar-inverse navbar-static-top">
    <style>
      .body{padding-top:70px;}
    </style>
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand">Meet Place</a>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse navbar-ex1-collapse">

        <form>
          <a type="button" class="btn btn-default navbar-btn navbar-right" href="index.html">Entrar</a>
        </form>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="1000">
          <div class="carousel-inner">
            <div class="item active">
              <img src="usando o tablet.jpg" class="img-responsive img-thumbnail">
              <div class="carousel-caption">
                <h1 class="text-center">Bem Vindo!</h1>
                <p class="">Conheça o Meet Place</p>
              </div>
            </div>
          </div>


        </div>
      </div>
      <div class="col-md-6 text-left">
        <form role="form" id="dados" name="dados" onsubmit="return valida();" method="POST" action="cadastrousuariophp.php">
          <div class="form-group">
            <div class="form-group">
              <label for="usuario">Usuario ID</label>
              <input class="form-control" id="usuario" placeholder="Usuario" type="text" name="usuario" onKeypress="testandoUsuario()">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" id="email" placeholder="Enter email" type="email" name="email" onKeypress="testandoEmail()">
            </div>
            <div class="form-group">
              <label for="senha1">Senha</label>
              <input class="form-control" id="senha1" placeholder="Senha" type="password" name="senha1" onKeypress="testandoSenha1()">
            </div>
            <div class="form-group">
              <label for="senha2">Senha Novamente</label>
              <input class="form-control" id="senha2" placeholder="Senha Novamente" type="password" name="senha2" onKeypress="testandoSenha2()">
            </div>
            <input type="submit" name="enviar" id="enviar" value="Cadastrar" class="btn btn-default navbar-btn navbar-right">
          </div>
        </form>

      </div>
      <div class="row">
        <div class="col-md-12">

        </div>
      </div>
       <div class="row">
        <div class="col-md-4">
          <h2>O que é?</h2>
          <img src="foto1.jpg" class="img-responsive img-thumbnail">
          <p>O Meet Place é uma ferramente para auxiliar o compartilhamente de pontos
            e locais entre pessoas de um determinado grupo.</p>
        </div>
        <div class="col-md-4">
          <h2 draggable="true">Para que serve?</h2>
          <img src="foto2.jpg" class="img-responsive img-thumbnail">
          <p>O Meet Place tem como objetivo facilitar a logistica, tornando mais eficaz
            a comunicação entre membros de uma mesma equipe trabalho ou ou até mesmo
            de um grupo de amigos.</p>
        </div>
        <div class="col-md-4">
          <h2>Por que usar?</h2>
          <img src="foto3.jpg" class="img-responsive img-thumbnail">
          <p>O Meet Place pode ser usado como uma ferramente de fins socias ou até
            mesmo uma ferramente de trabalho. Por exemplo, uma floricultura pode utilizar
            o "Meet Place" para facilitar a entrega de pedidos compartilhando pontos
            e locais.</p>
        </div>
      </div>
        </div>
      </div>
    </div>
























































  </div>


</body>

</html>