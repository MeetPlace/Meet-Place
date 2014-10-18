<?php
Class EstadosUF{
 
  private $_uf;

  public function setEstadosUF($uf){
    $this->_uf = $uf;
  }
 
   public function retornaEstadosUF(){
    $query = mysql_query("SELECT * FROM u209298020_pi.tb_estados");
    return $query;
  } 
}
?>