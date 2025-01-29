<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
	
		
		$Emri=$_POST['Emri'];
		$Mbiemri=$_POST['Mbiemri'];
        $Nrtelefonit=$_POST['Nrtelefonit'];
        $Grupigjakut = $_POST['Grupigjakut'];
        $Qyteti= $_POST['Qyteti'];
        $image= $_POST['image'];
	
   
    if( !empty($Emri) && !empty($Mbiemri) )
		{
			$user_id = random_num(20);
			$query = "insert into kerkues (Emri,Mbiemri,Nrtelefonit,Grupigjakut,Qyteti) values ('$Emri','$Mbiemri','$Nrtelefonit','$Grupigjakut','$Qyteti')";

			mysqli_query ($con, $query);

}
		
else
		{
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
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.8);
            border-radius: 12px;
            padding: 30px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        input, select, button {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .back-link {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 25px;
            color: white;
            text-decoration: none;
        }

       

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<a href="Dashboard-Kerkuesit.php" class="back-link">Back</a>


<div class="form-container">
    <h1>Regjistro Kerkuesin</h1>
    <form action="process_formkerkuesit.php" method="post" enctype="multipart/form-data">
        <label for="Emri">Emri:</label>
        <input type="text" id="Emri" name="Emri" placeholder="Emri" required>

        <label for="Mbiemri">Mbiemri:</label>
        <input type="text" id="Mbiemri" name="Mbiemri" placeholder="Mbiemri" required>
<br>
        <label for="Nrtelefonit">Nr Telefonit:</label>
        <input type="text" id="Nrtelefonit" name="Nrtelefonit" placeholder="Nr telefonit" required>

        <label for="GrupiGjakut">Grupi i Gjakut:</label>
        <select id="Grupigjakut" name="Grupigjakut" required>
            <option value="">Zgjedh Grupin e Gjakut</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="0+">0+</option>
            <option value="0-">0-</option>
        </select>

        <label for="Qyteti">Qyteti:</label>
        <select id="Qyteti" name="Qyteti" required>
            <option value="">Zgjedh Qytetin</option>
            <option value="Gjilan">Gjilan</option>
            <option value="Prishtine">Prishtine</option>
            <option value="Ferizaj">Ferizaj</option>
            <option value="Prizeren">Prizeren</option>
            <option value="Istog">Istog</option>
            <option value="Pej&euml;">Pej&euml;</option>
            <option value="Gjakov">Gjakov</option>
            <option value="Skenderaj">Skenderaj</option>
            <option value="Lipjan">Lipjan</option>
            <option value="Deçan">Deçan</option>
            <option value="Suharek&euml;">Suharek&euml;</option>
            <option value="Podujev">Podujev</option>
        </select>

        <label for="image">Ngarko Imazhin:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <button type="submit" name="upload">Dergo</button>
    </form>
</div>

</body>
</html>
