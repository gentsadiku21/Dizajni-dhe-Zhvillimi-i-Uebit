<?php 
session_start();

	include("connection.php");
    include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];



		if(!empty($Email) && !empty($Password) && !is_numeric($Email))
		{

			
			$query = "select * from users where Email = '$Email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);

					if($user_data['Password'] === $Password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location:Ballina.php");
						die;
					}
				}
			}

			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
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
                <li><a href="Ballina.php" class="link ">Ballina</a></li>
                <li><a href="Dhuruesit.php" class="link">Dhuruesit</a></li>
                <li><a href="Kerkuesit.php" class="link">Kerkuesit</a></li>
                <li><a href="RrethNesh.php" class="link">Rreth Nesh</a></li>
                <li><a href="#" class="link active ">Kyçu</a></li>
            </ul>
        </div>

        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
<!----------------------------- kuti e formes ----------------------------------->    
    <div class="form-box">

        <!------------------- Pjesa per log in-------------------------->

        <div class="login-container" id="login">
            <div class="top">

                <header>Login</header>
            </div>
            <form id="loginForm" method="post">
            <div class="input-box">
                <input type="text" id="Email" class="input-field" placeholder=" Email" name="Email">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" id="Password" class="input-field" placeholder="Password" name="Password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" id="SubmitLogin" class="submit" value="Sign In">
            </div>
            </form>
            <div class="two-col">

                <div class="top">
                    <span>Don't have an account? <a href="Login-Signup.php" >Sign Up</a></span>
                </div>
            </div>
        </div>

            </form>

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