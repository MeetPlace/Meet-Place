   <div name="divpontos" id="divpontos">
       <select class="selectpicker" name="pontos" id="pontos" onchange="centralizaPonto()">   
    <?php
   $email =  $_SESSION['email'];
   $idgrupo = $_POST['val'];
   
    include("conexao.php");
	require_once("Classes/Ponto.class.php");
	
	$ponto = new Ponto();
	$query = $ponto->retornaPontos($idgrupo);
	
//$query = mysql_query("SELECT * FROM meetplace.pontos where idgrupos = '$idgrupo'");

$total = mysql_num_rows($query);   

if($total > 0){
	
 while($linha = mysql_fetch_assoc($query)){
 //$idusuario = $linha['idusuarios'];
 $idponto = $linha['idpontos']; 
 $nomeponto = $linha['nome'];
 $x = $linha['x'];
 $y = $linha['y'];
 $cord = $x.'|'.$y;
?>
 	<option value="<?=$cord?>"><?=$nomeponto?></option>
 <?php
 }
 }
 ?>
   <option selected="selected">Selecione um ponto</option>
   </select>
  </div>