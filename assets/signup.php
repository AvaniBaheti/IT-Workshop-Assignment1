<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroCart | Signup</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Open Sans", Sans-serif;
        }
        section{
            height: 100vh;
            width: 100%;
            background-color: black ;
            /* background: linear-gradient(black,white); */
        }
        /* NavBar */
        nav {
            display: flex;
            padding: 8px 3%;
            justify-content: space-between;
            align-items: center;
            background-color: black;
        }
        .nav-list {
            flex: 1;
            text-align: right;
        }
        .nav-list ul li {
        list-style: none;
        display: inline-block;
        padding: 8px 12px;
        position: relative;
        }
        .nav-list ul li a {
        text-decoration: none;
        font-size: 20px;
        color: white;
        }
        .logo {
        font-size: 25px;
        text-decoration: none;
        color: white;
        }
        .nav-list ul li::after {
        content: "";
        width: 0%;
        height: 3px;
        background: red;
        display: block;
        margin: auto;
        transition: 0.5s;
        cursor: pointer;
        }
        .nav-list ul li:hover::after {
        width: 100%;
        }
        /* NavBar End */
        .logo{
            text-align: center;
        }
        .box{
            /* width: 280px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: white; */
            width: 280px;
            margin-left:auto;
            margin-right: auto;
            box-shadow: 2px 2px 2px 2px;
            padding: 20px 25px 13px 25px;
            background-color: white;
            margin-top: 100px;
            border-radius: 5px;

        }
        .box h1{
            float: left;
            font-size: 35px;
            border-bottom: 6px solid #230404;
            margin-bottom: 50px;
            padding: 13px 0;
            /* color: white; */
        }
        .textbox{
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px 0;
            margin: 8px 0;
            border-bottom: 1px solid;
            /* color: white; */
        }
        .textbox img{
            width: 26px;
            float: left;
            text-align: center;
        }
        .textbox input{
            border:none;
            outline: none;
            background: none;
            font-size: 18px;
            width: 80%;
            /* float: left; */
            margin: 0 10px;
            /* color: white; */
        }
        .btn{
            width: 100%;
            background: none;
            border: 2px solid;
            padding: 7px;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
            background-color: black;
            color: white;
        }
        .btn:hover{
            /* border: 5px solid #c59123; */
            background: linear-gradient(135deg,black,red);
        }
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            /* color: white; */            
        }

        .register{
            text-align: center;
        }
        .register p{
            padding: 5px 0;
        }
        .register a{
            color: black;            
        }
        .register a:hover{
            text-decoration: none;
        }
        .error{
            font-size:12px;
            /* text-align:center; */
            /* margin-left:100px; */
            color:red;
        }
        
    </style>
</head>
<body>
<?php
// define variables and set to empty values
$nameErr = $passErr = $usernameErr= $emailErr=$conPassErr="*";
$name = $password = $username=$conPass= $email= "";



// ---------------------NAME CHECK--------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters allowed";
    }
    else{
        $nameErr = "";
    }
}
// --------------------------------------------

//----------------Username---------------------
if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameErr = "Only letters allowed";
    }
    else{
        $usernameErr = "";
    }
}


//-------------email---------------------------
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
    else{
        $emailErr = "";
    }}
//-----------------------------------------------



// ---------------------PASSWORD--------------------
if(empty($_POST["password"])){
    $passErr = "Password is required";
}
else{
    $password=test_input($_POST["password"]);
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        $passErr = "Enter a strong Password";
    }    
    else{
        $passErr = "";
    }
} 
// -----------------------------------------------------

//---------------------confirm Password--------------------

if(empty($_POST["conPass"])){
    $conPassErr = "Password is required";
}
else{
    $conPass=test_input($_POST["conPass"]);
    $password=test_input($_POST["password"]);
    if($conPass != $password) {
        $conPassErr = "Password doesn't match!";
    }    
    else{
        $conPassErr = "";
    }
}
//-----------------------------------------------------------

}

// ---------------Redirect------------------
if($nameErr =='' && $passErr =='' && $usernameErr=='' && $emailErr=='' && $conPassErr=='')
{
//  To redirect form on a particular page
echo '<script type="text/javascript">'; 
echo 'alert("You have registered succesfully '.$name.'!\nPress OK to redirect to Login page");';
echo 'window.location.href="login.php";';
echo '</script>';
}
// else{
//     echo $nameErr;
//     echo $usernameErr;
//     echo $emailErr;
//     echo $passErr;
//     echo $conPassErr;
// }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>
        <section class="page">
            <div class="nav">
                <nav>
                  <a class="logo" href="../index.php"><h1>ElectroCart</h1></a>
                  <div class="nav-list">
                    <ul>
                      <li><a href="../index.php">Home</a></li>
                      <li><a href="login.php">Login</a></li>
                      <li><a href="registerform.php">Cart</a></li>
                      <li><a href="trending.html">Trending</a></li>
                      <li><a href="reviewelectroCart.html">Reviews</a></li>
                      <li><a href="contactelectrocart.php">Contact Us</a></li>
                      <li><a href="aboutus.html">About Us</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
          <div class="box">
            <h1>Register</h1>
            <form method = "post">
            <div class="textbox">
                <!-- <img src="https://img.icons8.com/ios-glyphs/30/000000/user--v1.png"/ > -->
                <input type="text" name="username" id="" placeholder="Username">
                <!-- <span class="error"><?php echo $usernameErr;?></span> -->
                <p class="error"><?php echo $usernameErr;?></p>

            </div>
            <div class="textbox">
                <input type="text" name="name" id="" placeholder="Name">
                <p class="error"><?php echo $nameErr;?></p>

            </div>
            <div class="textbox">
                <!-- <img src="https://img.icons8.com/ios-glyphs/30/000000/filled-message.png"/> -->
                <input type="email" name="email" id="" placeholder="Email-Id">
                <p class="error"><?php echo $emailErr;?></p>

            </div>
            <div class="textbox">
                <!-- <img src="https://img.icons8.com/ios-glyphs/30/000000/lock--v1.png"/> -->
                <input type="password" name="password" id="" placeholder="Password">
                <p class="error"><?php echo $passErr;?></p>

            </div>
            <div class="textbox">
                <!-- <img src="https://img.icons8.com/ios-glyphs/30/000000/lock--v1.png"/> -->
                <input type="password" name="conPass" id="" placeholder="Confirm Password">
                <p class="error"><?php echo $conPassErr;?></p>

            </div>
            <input class="btn" type="Submit" value="Register" name="Submit">
            <div class="register">
            </form>
                <p>Already have an account <a href="login.php">Login</a></p>
            </div>
        </div>
    </section>
</body>
</html>