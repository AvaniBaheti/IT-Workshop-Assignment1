<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectroCart | Payment Form</title>
    <link rel="stylesheet" href="registerform.css">
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
      $nameErr=$emailErr=$mobilenoErr=$stateErr=$genderErr=$agreeErr=$fnameErr=$dateErr="*";
      $name=$email=$mobileno=$state=$gender=$agree=$fname="";

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

if(empty($_POST["mobileno"]))
{
  $mobilenoErr="error";
}
else{
  $number = input_data($_POST["mobileno"]);
  if(validate_mobile($number)){
    $mobilenoErr="";
  }
  else{
    $mobilenoErr="error";
  }
}
// else{
//   if(!preg_match("/^[0-9]*$/",$mobileno))
//   {
//     $mobilenoErr="error";
//   }
//   if(strlen ($mobileno) != 10)
//   {
//     $mobilenoErr="error";
//   }
// }
if(empty($_POST["gender"]))
{
  $genderErr="error";
}
else{
  $genderErr="";
}

if(!isset($_POST["agree"]))
{
  $agreeErr="error";
}
else{
  $agreeErr="";

}
if(empty($_POST["fname"]))
{
  $fnameErr="error";
}
else{
  $fnameErr="";
}
if(empty($_POST["state"]))
{
  $stateErr="error";
}
else{
  $stateErr="";
}
if(empty($_POST["date"]))
{
  $dateErr="error";
}
else{
  $dateErr="";
}
}


if($nameErr =='' && $emailErr =='' && $mobilenoErr ==''&& $stateErr ==''&& $genderErr ==''&& $agreeErr ==''&& $fnameErr ==''&& $dateErr =='')
{
//  To redirect form on a particular page
echo '<script type="text/javascript">'; 
echo 'alert("You have successfully filled the form. \nYou will recieve your products within few days!");';
echo 'window.location.href="../index.php";';
echo '</script>';
}
// else{

//   echo $emailErr;
//   echo $mobilenoErr;
//   echo $stateErr;
//   echo $genderErr;
//   echo $agreeErr;
//   echo $fnameErr;
//   echo $dateErr;
// }


function input_data($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function validate_mobile($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}
?>

    <div class = "main">
        <div class = "pay">
            <h2>Payment and Delivery details</h2>
            <br>
           
            <p style="color:white; text-align:center; font-size:19px"><span class = "error">* required field </span></p>
            <br><br>
            
            <form id = "pay" method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label>First Name: </label>
                <br>
                <input type="text" name="name" id = "name" placeholder="Enter your First Name">
                <span class = "error"><?php echo $nameErr;?></span>
                <br><br>
                <label>Surname: </label>

                <br>
                <input type="text" name="fname" id = "name" placeholder="Enter your Surname">
                <span class = "error"><?php echo $nameErr;?></span>
                <br><br>
                <label> State and union territory :</label>

                <br>
                <select name = "state" id= "state" >
                    <option value = " ">select</option>
                    <option value = "1 ">rajasthan</option>
                    <option value = "2 ">madhya pradesh</option>
                    <option value = "3 ">uttar pradesh</option>
                    <option value = "4 ">andhra pradesh</option>
                    <option value = "5 ">chattisgarh</option>
                    <option value = "6 ">gujarat</option>
                    <option value = "7 ">Delhi</option>
                    <option value = "8 ">tripura</option>
                    <option value = "9 ">arunachal pradesh</option>
                    <option value = "10 ">goa</option>
                    <option value = "11 ">maharashtra</option>
                    <option value = "12 ">pondicherry</option>
                </select>
                <span class = "error"><?php echo $stateErr;?></span>
                <br><br>
                <label>Address : </label>
                <br>
                <input type="text" name="fname" id = "name" placeholder="Enter your Address">
                <span class = "error"><?php echo $fnameErr;?></span>
                <br><br>
                <label>Age : </label>
                <br>
                <input type="text" name="fname" id = "name" placeholder="How old are you ?? ">
                <span class = "error"><?php echo $fnameErr;?></span>
                <br><br>
                <label>Email: </label>
                <br>
                <input type="text" name="email" id = "name" placeholder="Enter your valid email">
                <span class = "error"><?php echo $emailErr;?></span>
                <br><br>
                <label> contact : </label>
                <br>
                <input type="text" name="mobileno" id = "name" placeholder="Enter your phone number/numbers ">
                <span class = "error"><?php echo $mobilenoErr;?></span>
                <br><br>
                <label>Gender : </label>
                <br>
                &nbsp;&nbsp;&nbsp;
                <input type = "radio" name = "gender" id = "male">
                &nbsp;
                <span id = "male">Male</span>
                &nbsp;&nbsp;&nbsp;
                <input type = "radio" name = "gender" id = "female">
                &nbsp;
                <span id = "female">Female</span>
                &nbsp;&nbsp;&nbsp;
                <input type = "radio" name = "gender" id = "others">
                &nbsp;
                <span id = "others">Others</span>
                <span class = "error"><?php echo $genderErr;?></span>
                <br><br>
                <label> cvv : </label>
                <br>
                <input type="text" name="fname" id = "name" placeholder="Enter your CVV">
                <span class = "error"><?php echo $fnameErr;?></span>
                <br><br>
                <label> Card Number  : </label>
                <br>
                <input type="text" name="fname" id = "name" placeholder="Enter your card number  ">
                <span class = "error"><?php echo $fnameErr;?></span>
                <br><br>
                <label> Number of items : </label>
                <br>
                <input type="text" name="fname" id = "name" placeholder="Enter total items ">
                <span class = "error"><?php echo $fnameErr;?></span>
                <br><br>
                <label> item code : </label>
                <br>
                <input type="text" name="fname" id = "name" placeholder="Enter codes given on item ">
                <span class = "error"><?php echo $fnameErr;?></span>
                <br><br>
                <label> amount  : </label>
                <br>
                <input type="text" name="fname" id = "name" placeholder="Enter the total amount of your items  ">
                <span class = "error"><?php echo $fnameErr;?></span>
                <br><br>
                <label>Date of buying: </label>
                <br>
                <input   type="date" name="date" id="date">
                <span class = "error"><?php echo $dateErr;?></span>
                <br><br><br>
                <label>I agree to the terms and conditions</label>
                <input type="checkbox" name = "agree" id = "checkbox">
                <span class = "error"><?php echo $agreeErr;?></span>
                <br><br>
                <input type = "submit" value = "submit" name = "submit" id = "submit"> 
            </form>
        </div>
    </div>
    <div>
      <br><br><br><br>
    </div>
</body>
</html>