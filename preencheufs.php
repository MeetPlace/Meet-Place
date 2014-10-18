   <div name="divuf" id="divuf">
       <select name="uf" id="uf">   
    <?php
	
   $var = $_POST['val'];
    include("conexao.php");
	require_once("Classes/EstadosUF.class.php");
// Seleciona ID e Nome do usuáio logado na Session
//$query = mysql_query("SELECT * FROM meetplace.tb_estados");
  
    $estadosUF = new EstadosUF();
	$query = $estadosUF->retornaEstadosUF();

$total = mysql_num_rows($query);   

if($total > 0){
	
 while($linha = mysql_fetch_assoc($query)){
 //$idusuario = $linha['idusuarios']; 
 $uf = $linha['uf'];
 $iduf = $linha['id'];
?>
 	<option value="<?=$iduf?>"><?=$uf?></option>
 <?php
 }
 }
 ?>
   </select>
  </div>