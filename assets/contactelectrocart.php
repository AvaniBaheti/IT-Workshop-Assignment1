<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroCart | Contact Us</title>
    <link rel="stylesheet" href="contact.css">

</head>
<body>
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
      <?php
      $nameErr=$emailErr=$fnameErr=$usernameErr="*";
      $name=$email=$fname=$username="";

      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        if(empty($_POST["name"]))
        {
          $nameErr="error";
        }
        else{
          $name=input_data($_POST["name"]);
          if(!preg_match("/^[a-zA-Z]*$/",$name))
          {
            $nameErr="error";
          }
          else{
            $nameErr="";
          }
        }
if(empty($_POST["email"]))
{
  $emailErr="error";
}
else
{
  $email=input_data($_POST["email"]);
  if(!filter_var($email,FILTER_VALIDATE_EMAIL))
  {
    $emailErr = "error";
  }
  else{
    $emailErr = "";
  }
}



if(empty($_POST["fname"]))
{
  $fnameErr="error";
}
else{
  $fnameErr="";
}

if (empty($_POST["username"])) {
  $usernameErr = "error";
} else {
  $username = input_data($_POST["username"]);
  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    $usernameErr = "error";
  }
  else{
      $usernameErr = "";
  }


}
      }


if($nameErr =='' && $emailErr =='' && $fnameErr =='')
{
//  To redirect form on a particular page
echo '<script type="text/javascript">'; 
echo 'alert("Your message is succesfully conveyed. Press OK to go to home page");';
echo 'window.location.href="../index.php";';
echo '</script>';
}
// else{

//   echo $emailErr;
//   echo $usernameErr;
//   echo $fnameErr;

// }


function input_data($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
  </div>

    <br><br>
    <br>
    <br><br><br><br><br>

   <div class = "contact-box">
   <div class="head"><h1><u> Contact ElectroCart</u></h1>

       <form method ="post" >
       <br><br><br>
       <p id="req" style="color:white; text-align:center; font-size:19px"><span>* required field </span></p>
           <input type = "text" name ="name" id="name" class="input-field" placeholder="your name" onfocus="myfunction(this)" onblur = "myfunction2(this)">
           <span class = "error"><?php echo $nameErr;?></span>
           <input type = "text" class="input-field" placeholder="your username" onfocus="myfunction(this)" onblur = "myfunction2(this)" name="username" id="name">
           <span class = "error"><?php echo $usernameErr;?></span>
           <input type = "email" class="input-field" placeholder="your email"  onfocus="myfunction(this)" onblur = "myfunction2(this)" name="email" id="name">
           <span class = "error"><?php echo $emailErr;?></span>
           <input type = "text" class="input-field" placeholder="subject (feedback /complaint /help/ other)"  onfocus="myfunction(this)" onblur = "myfunction2(this)" name="fname" id="name">
           <span class = "error"><?php echo $fnameErr;?></span>
           <textarea type = "text" class="input-field-textarea" placeholder="message" onfocus="myfunction(this)" onblur = "myfunction2(this)" name="fname" id="name">message
               </textarea>
               <span class = "error"><?php echo $fnameErr;?></span>
               <input class="submit" type="Submit" value="Submit" name="Submit">     
              </form>
   </div> 
   <script type = "text/javascript">
     function myfunction(x)
    {
      x.style.color = "black";
      x.style.backgroundColor = " rgb(252, 151, 151)";
    
    }
    function myfunction2(y)
    {
      y.style.color="red";

      y.style.backgroundColor = " white";
      
    }
    // function myfunction3()
    // {
    //   alert("your message is succesfully conveyed. press OK to go to home page");
    //   window.location.href="../index.html";
    // }
    </script>
</body>
</html>