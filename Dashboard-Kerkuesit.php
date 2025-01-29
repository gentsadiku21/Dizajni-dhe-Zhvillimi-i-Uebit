<?php
include "connection.php";
include("functions.php");

$sql = "SELECT * FROM kerkuesit";


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
            width: 100%;
            height: 680px;
            background-image: url("Images/LogoD.png");
            background-attachment: fixed;
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat; 

        }

        .container {
            color: white;
        }

        .link {
            color: Black;
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
            <a href="Dashboard.php" class="link">Users</a>&nbsp&nbsp&nbsp
            <a href="Dashboard-Contact.php" class="link ">Contact us</a>&nbsp&nbsp&nbsp
            <a href="Dashboard-Dhuruesit.php" class="link ">Dhuruesit</a>&nbsp&nbsp&nbsp
            <a href="Dashboard-Kerkuesit.php" class="link active ">Kerkuesit</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>User_id</th>
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Nr-Telefonit</th>
                        <th>GrupiGjakut</th>
                        <th>Qyteti</th>
                        <th>Foto</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['user_id'] . '</td>';
                            echo '<td>' . $row['Emri'] . '</td>';
                            echo '<td>' . $row['Mbiemri'] . '</td>';
                            echo '<td>' . $row['Nrtelefonit'] . '</td>';
                            echo '<td>' . $row['Grupigjakut'] . '</td>';
                            echo '<td>' . $row['Qyteti'] . '</td>';
                            echo '<td>' . '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="20%" height="30%">' . '</td>';
                            echo '<td><a class="btn btn-info" href="Update-Kerkuesit.php?id=' . $row['user_id'] . '">Edit</a><br><br>
                                &nbsp;<a class="btn btn-danger" href="Delete-Kerkuesit.php?user_id=' . $row['user_id'] . '">Delete</a><br><br>
                                &nbsp;<a class="btn btn-info" href="Create-Kerkues.php?id" style="color:black;"><b>Create</b></a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
