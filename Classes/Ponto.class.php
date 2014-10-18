<?php
Class Ponto{
 
  private $_nome;
  private $_idusuario;
  private $_idgrupo;
  private $_endereco;
  private $_x;
  private $_y;
  

  public function setPonto($nome, $idusuario, $idgrupo, $endereco, $x, $y){
    $this->_nome = $nome;
	$this->_idusuario = $idusuario;
	$this->_idgrupo = $idgrupo;
	$this->_endereco = $endereco;
	$this->_x = $x;
	$this->_y = $y;
  }
  
  public function marcaPonto(){
      $query = mysql_query("INSERT INTO u209298020_pi.pontos (x,y,idusuarios,idgrupos,nome,endereco) VALUES ('$this->_x','$this->_y','$this->_idusuario', '$this->_idgrupo','$this->_nome','$this->_endereco')") or die(mysql_error());
  }
  
  public function deletaPonto($idponto){
	  $query = mysql_query("DELETE FROM u209298020_pi.pontos where idpontos='$idponto'") or die(mysql_error());
  }
  
  public function retornaPontos($idgrupo){
	$query = mysql_query("SELECT * FROM u209298020_pi.pontos where idgrupos = '$idgrupo'");  
	return $query;
  }
  
  public function retornaPontoPorCord($x,$y){
	$query = mysql_query("SELECT * FROM u209298020_pi.pontos where x='$x' and y='$y'");  
	while($linha = mysql_fetch_assoc($query)){
	  $idponto = $linha['idpontos'];	
	}
	return $idponto;
   }
}
?>