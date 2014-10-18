<?php
Class Grupo{
 
  private $_nome;
  private $_idusuario;
  private $_cidade;
  private $_uf;
  private $_tema; 

  public function setGrupo($nome, $idusuario, $cidade, $uf, $tema){
    $this->_nome = $nome;
	$this->_idusuario = $idusuario;
	$this->_cidade = $cidade;
	$this->_uf = $uf;
    $this->_tema = $tema;
  }
  
   public function criaGrupo(){
   $query = mysql_query("INSERT INTO u209298020_pi.grupos (nome,idusuarios,cidade,uf,tema) VALUES ('$this->_nome', '$this->_idusuario','$this->_cidade','$this->_uf','$this->_tema')") or die(mysql_error());
  }
  
   public function buscaGrupo($nome){
    $query = mysql_query("SELECT * FROM u209298020_pi.grupos where nome = '$nome'");
   while($linha = mysql_fetch_assoc($query)){
   $idgrupo = $linha['idgrupos'];
    }
   return $idgrupo;
  }
  
   public function salvaGrupoMembro($idgrupo, $idusuario){
    $query = mysql_query("INSERT INTO u209298020_pi.grupo_membro (idgrupo,idmembro) VALUES ('$idgrupo','$idusuario')") or die(mysql_error());
  }
  
  public function deletaMembros($idgrupo){
	  $query = mysql_query("DELETE FROM u209298020_pi.grupo_membro where idgrupo='$idgrupo'") or die(mysql_error());
  }
  public function deletaGrupo($idgrupo){
	  $query = mysql_query("DELETE FROM u209298020_pi.grupos where idgrupos='$idgrupo'") or die(mysql_error());
  }
  public function retornaGrupos($idusuario){
	$query = mysql_query("SELECT * FROM u209298020_pi.grupos where idusuarios='$idusuario';") or die(mysql_error());  
	return $query;
  }
   public function retornaGrupoMembro($idusuario){
    $query = mysql_query("SELECT * FROM u209298020_pi.grupo_membro where idmembro='$idusuario'") or die(mysql_error());
	return $query;
  }
  public function retornaNomeGrupo($idgrupo){
    $grupos = mysql_query("SELECT nome FROM u209298020_pi.grupos where idgrupos='$idgrupo';") or die(mysql_error());  
	while($linhagrupos = mysql_fetch_assoc($grupos)){
     $grupo = $linhagrupos['nome'];
   }
   return $grupo;
  }
  
}
?>