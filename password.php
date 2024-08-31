<?php 
$pass="123456";  
$str_pass=password_hash($pass,PASSWORD_BCRYPT); 
echo $str_pass;     
 
 $pass_check=password_verify($pass,$str_pass);  
 
 
?>