   <div name="divtemas" id="divtemas">
       <select name="temas" id="temas">   
    <?php
	
   $var = $_POST['val'];
   
   include("conexao.php");
   require_once("Classes/Temas.class.php");

     $temas = new Temas();
     $query = $temas->retornaTemas();
	 
//$query = mysql_query("SELECT * FROM meetplace.temas");
$total = mysql_num_rows($query);   

if($total > 0){
	
 while($linha = mysql_fetch_assoc($query)){
 //$idusuario = $linha['idusuarios']; 
 $tema = $linha['nome'];
 $idtema = $linha['idtemas'];
?>
 	<option value="<?=$idtema?>"><?=$tema?></option>
 <?php
 }
 }
 ?>
   </select>
  </div>