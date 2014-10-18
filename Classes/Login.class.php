<?php
Class Login{
 
  private $_nome;
  private $_email;
  private $_senha;

  public function setLogin($email, $senha){
	$this->_email = $email;
	$this->_senha = $senha;
  }
  public function verSenha($email){
   $query = mysql_query("SELECT * FROM u209298020_pi.usuarios where email = '$this->_email'");
   while($linha = mysql_fetch_assoc($query)){
   $senhabanco = $linha['senha'];
    }
   return $senhabanco;
  }
}
?>