<?php
Class Temas{
 
  private $_tema;
 
   public function retornaTemas(){
    $query = mysql_query("SELECT * FROM u209298020_pi.temas");
    return $query;
  } 
}
?>