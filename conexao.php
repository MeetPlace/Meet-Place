<?php
$conn = mysql_connect("localhost"," "," "," ");
   mysql_select_db(" ",$conn);
  if (mysqli_connect_errno()) {
  echo "Falha na conexao: " . mysqli_connect_error();
}
 mysql_select_db(" ",$conn);
?>
