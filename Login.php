<?php
$mail=$_POST['mail'];
$pass=$_POST['password'];
$adminm="admin@admin.com";
$adminp="molehiya";
$emp="19000140@emu.edu.tr";
$passe="deniz";

if($mail==$adminm){
    if($pass==$adminp){
        header("Location: /molehiya/admin/employees-list.php");
        exit();
      
}
else
   header("Location: /molehiya/Login Page/wronguser.html");
   exit();
}

if($mail==$emp){
  if($pass==$passe){
    header("Location: /molehiya/admin/profile.html");
    exit();
  }
  else
  header("Location: /molehiya/Login Page/wronguser.html");
  exit();
}
  else
   header("Location: /molehiya/Login Page/wronguser.html");
   exit();

?>