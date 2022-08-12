<?php
$mail=$_POST['mail'];
$pass=$_POST['password'];
$emp="19000140@emu.edu.tr";
$passe="deniz";

if($mail==$emp){
    if($pass==$passe){
        header("Location: /molehiya/admin/profile.html");
        exit();
}
  }
  else
   header("Location: /molehiya/admin/wronguser.html");
   exit();

?>