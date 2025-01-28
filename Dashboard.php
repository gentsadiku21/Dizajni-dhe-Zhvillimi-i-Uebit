<?php 
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$sql = "SELECT * FROM users";



$result = $con->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<header>
	<style>
body {
    background-image: url("Images/LogoD.png");
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    height: 100vh;
    margin: 0;
    padding: 0;
    backdrop-filter: blur(2px); 
    filter: brightness(0.9); 
}
.container{
	color:white;
}
.link {
            color: black;
            font-size: 20px; 
            text-decoration: none;
        }

     
        .active {
            font-weight: bold; 
        }

    </style>
<body>



	<div class="menu">
          <div class="btn">
            <i class="fas fa-times close-btn"></i>
          </div>

	<div class="container">
	<a href="Ballina.php" class="link">Back</a>&nbsp&nbsp&nbsp
	<a href="Dashboard.php" class="link active">Users</a>&nbsp&nbsp&nbsp
    <a href="Dashboard-Contact.php" class="link">Contact us</a>&nbsp&nbsp&nbsp
	<a href="Dashboard-Dhuruesit.php" class="link ">Dhuruesit</a>&nbsp&nbsp&nbsp
	<a href="Dashboard-Kerkuesit.php" class="link ">Kerkuesit</a>
<table class="table">
	<thead>
		<tr>
		<th>User_id</th>
		<th>First-Name</th>
		<th>Last-Name</th>
		<th>Email</th>
		<th>Password</th>
	</tr>
	</thead>
	<tbody>	

	</header>
		<?php
			if ($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {
		?>

					<tr>
					<td><?php echo $row['user_id']; ?></td>
					<td><?php echo $row['Firstname']; ?></td>
					<td><?php echo $row['Lastname']; ?></td>
					<td><?php echo $row['Email']; ?></td>
					<td><?php echo $row['Password']; ?></td>
					<td><a class="btn btn-info" href="update.php?id=<?php echo $row['user_id']; ?>">Edit</a>
					&nbsp;<a class="btn btn-danger" href="delete.php?user_id=<?php echo $row['user_id']; ?>">Delete</a>
					&nbsp;<a class="btn btn-info" href="create.php?id" style="color:black;"><b>Create</b></a></td>



				</tr>	

		<?php		}
			}
		?>

	</tbody>
</table>
	</div>



</body>
</html>