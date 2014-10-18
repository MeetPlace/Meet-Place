<?php
Class UsuarioCad{
 
  private $_nome;
  private $_email;
  private $_senha;

  public function setUsuario($nome, $email, $senha){
    $this->_nome = $nome;
	$this->_email = $email;
	$this->_senha = $senha;
  }
  public function cadastraUsuario(){
  $query = mysql_query("INSERT INTO u209298020_pi.usuarios (usuario,email,senha) VALUES ('$this->_nome', '$this->_email', '$this->_senha')") or die(mysql_error());
  }
  public function buscaUsuario($email){
  $query = mysql_query("SELECT * FROM u209298020_pi.usuarios where email = '$email'");
  while($linha = mysql_fetch_assoc($query)){
    $idusuario = $linha['idusuarios'];
    }
   return $idusuario;
  }
}
?>