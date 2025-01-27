<?php 
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];


    if (!empty($Firstname) && !empty($Lastname) && !empty($Email) && !empty($Password) && !is_numeric($Email)) {
        $query = "INSERT INTO users (Firstname, Lastname, Email, Password) VALUES ('$Firstname','$Lastname','$Email','$Password')";

        if (mysqli_query($con, $query)) {
           
            header("Location: Dashboard.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-image: url("Images/LogoD.png");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .back-link {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 18px;
            text-decoration: none;
            color: white;
        }

        form {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <a href="Dashboard.php" class="back-link">Back</a>

    <form action="" method="post">
        <fieldset>
            <legend>Personal Information:</legend>
            Firstname:<br>
            <input type="text" name="Firstname" placeholder="Firstname" required><br>
            Lastname:<br>
            <input type="text" name="Lastname" placeholder="Lastname" required><br>
            Email:<br>
            <input type="text" name="Email" placeholder="Email" required><br>
            Password:<br>
            <input type="password" name="Password" placeholder="Password" required><br><br>
            <input type="submit" value="Register" name="register">
        </fieldset>
    </form>

</body>
</html>
