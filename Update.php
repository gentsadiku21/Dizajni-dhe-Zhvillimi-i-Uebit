<?php 
session_start();

include("connection.php");
include("functions.php");

if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $sql = "UPDATE `users` SET `Firstname`='$Firstname', `Lastname`='$Lastname', `Email`='$Email', `Password`='$Password' WHERE `user_id`='$user_id'";

    $result = $con->query($sql);

    if ($result == TRUE) {
        // kthehemi te Dashboard.php nese update eshte bere me sukses
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `users` WHERE `user_id`='$user_id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $user_id = $row['user_id'];
            $Firstname = $row['Firstname'];
            $Lastname = $row['Lastname'];
            $Email = $row['Email'];
            $Password = $row['Password'];
        }
    } else {
        header('Location: Dashboard.php');
        exit();
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
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            Firstname:<br>
            <input type="text" name="Firstname" placeholder="Firstname" value="<?php echo $Firstname; ?>"><br>
            Lastname:<br>
            <input type="text" name="Lastname" placeholder="Lastname" value="<?php echo $Lastname; ?>"><br>
            Email:<br>
            <input type="text" name="Email" placeholder="Email" value="<?php echo $Email; ?>"><br>
            Password:<br>
            <input type="password" name="Password" placeholder="Password" value="<?php echo $Password; ?>"><br>
            <br>
            <input type="submit" value="Update" name="update">
        </fieldset>

    </form>
</body>
</html>

<?php
}
?>