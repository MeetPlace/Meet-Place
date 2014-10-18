   <div name="divcidades" id="divcidades">
       <select name="cidades" id="cidades">   
    <?php
	
   $uf = $_POST['val'];
   
     include("conexao.php");
	 require_once("Classes/Cidades.class.php");

	$cidades = new Cidades();
	$query =  $cidades->retornaCidadesUF($uf);
	
$total = mysql_num_rows($query);   

if($total > 0){
	
 while($linha = mysql_fetch_assoc($query)){
 //$idusuario = $linha['idusuarios']; 
 $cidade = $linha['nome'];
 $idcidade = $linha['id'];
?>
 	<option value="<?=$idcidade?>"><?=$cidade?></option>
 <?php
 }
 }
 ?>
   </select>
  </div>