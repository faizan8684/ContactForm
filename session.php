<?php
  
   
   $db=mysqli_connect("sql109.epizy.com","epiz_25606789","Ozt81Hjfhkr","epiz_25606789_mescontact");
   if($db==false)
   {die("could not connect".mysqli_connect_error());}
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>