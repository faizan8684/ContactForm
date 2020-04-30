<?php
$db=mysqli_connect("sql109.epizy.com","epiz_25606789","Ozt81Hjfhkr","epiz_25606789_mescontact");
if($db==false)
{die("could not connect".mysqli_connect_error());}

include 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MESCOE</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" />
<link rel="stylesheet" href="style.css">
</head>
<style>
  /* body {
  
  padding: 0;
  background-color: #93acc5;
  height: 100vh;
} */
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: auto;
  height: auto;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
  padding-bottom: 10px;
  border-radius : 10px;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
  </style>
<body>

<div style="text-align: right;">
    <a class="btn btn-danger my-2 my-sm-0 " href="logout.php" > Sign Out</a>
  </div>
  <!-- <div class="container">
    
      
    
  </div> -->

  <div id="login">
    
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-7">
                    <div id="login-box" class="col-md-12">
                      
                    <div class="data mx-auto">
                        <h3 class="" >Data</h3> <br>
                        <div id="list"></div>
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

  <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
  <script src="main.js"></script>
</body>
</html>