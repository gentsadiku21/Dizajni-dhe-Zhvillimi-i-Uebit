<?php 
session_start();

	include("connection.php");
    include("functions.php");



	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Firstname=$_POST['Firstname'];
		$Lastname=$_POST['Lastname'];
		 $Email = $_POST['Email'];
		$Password = $_POST['Password'];

    if( !empty($Firstname) && !empty($Lastname) &&!empty($Email) && !empty($Password) &&  !is_numeric($Email))
		{

			//save to database
			$user_id = random_num();
			$query = "insert into users (user_id,Firstname,Lastname,Email,Password) values ('$user_id','$Firstname','$Lastname','$Email','$Password')";

			mysqli_query($con, $query);



			header("Location:Login.php");
			die;
		}
		else
		{
			echo "Please enter some valid information!";
	   }

	}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Login-Signup.css">
    <title>Dhuro Gjak</title>
</head>
<body>
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p> Dhuro Gjak</p>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="Ballina.html" class="link ">Ballina</a></li>
                <li><a href="Dhuruesit.html" class="link">Dhuruesit</a></li>
                <li><a href="#" class="link">Kerkuesit</a></li>
                <li><a href="RrethNesh.html" class="link">Rreth Nesh</a></li>
                <li><a href="#" class="link active ">Kyçu</a></li>
            </ul>
        </div>
     
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
   
    <div class="form-box">
        
        
     
        <!------------------- Pjesa Per Regjistrim-------------------------->
        <div class="register-container" id="register">
            <div class="top">
               
                <header>Sign Up</header>
            </div>
            <form id="registerForm">
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" id="Firstname" class="input-field" placeholder="Firstname">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" id="Lastname" class="input-field" placeholder="Lastname">
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="input-box">
                <input type="text" id="RegisterEmail" class="input-field" placeholder="Email">
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="registerpassword" id="RegisterPassword" class="input-field" placeholder="Password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" id="SubmitRegister" class="submit" value="Register">
            </div>
            </form>
            <div class="two-col">
                
                <div class="top">
                    <span>Have an account? <a href="Login.php" onclick="login()">Login</a></span>
                </div>
            </div>
        </div>
    </div>
</div>   
<!-----   pjesa e javascript per meny (navbar)  -->
<script>
   
   function myMenuFunction() {
    var i = document.getElementById("navMenu");
    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
 
</script>
</body>
</html>