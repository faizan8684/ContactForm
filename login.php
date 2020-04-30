<!DOCTYPE HTML>
<html>
<title>MESCOE</title>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- <link rel="stylesheet" href="style.css"> -->
</head>




<style>

body {
  margin: 0;
  padding: 0;
  background-color: #93acc5;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
.brand{
  text-align: center;
}

.brand span{
  color:#fff;
}
</style>

<body>



<?php 
$db=mysqli_connect("sql109.epizy.com","epiz_25606789","Ozt81Hjfhkr","epiz_25606789_mescontact");
if($db==false)
{die("could not connect".mysqli_connect_error());}

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    
    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);
    
    $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
    
    if($count == 1) {
        //session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        
        header("location: data.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}

?>

<div class="container justify-content-center align-items-center">
<h1 class="brand mt-5 ml-5 " style="text-align: left" ><span>MESCOE</span> Contact Form</h1>

    <div id="login">
    
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-black">Only Admin Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group mx-auto ">
                            
                            <button class="btn btn-success mx-auto my-3" type="submit" id="submit2" style="color:black;">Sign in</button>
                            <a id="submit2" class="ml-5 " style="align:right; " href="/index.php">Back to Contact Form</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>  
</body>
</html>
