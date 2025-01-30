<?php 
session_start();

    include("connection.php");
	  include("functions.php");

  $user_data = check_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
	  $Emri=$_POST['Emri'];
		$Mbiemri=$_POST['Mbiemri'];
    $Nrtelefonit=$_POST['Nrtelefonit'];
    $GrupiGjakut = $_POST['GrupiGjakut'];
    $Qyteti= $_POST['Qyteti'];
    $image= $_POST['image'];
	
   
    if( !empty($Emri) && !empty($Mbiemri) )

		{
			$user_id = random_num(20);
			$query = "insert into dhuruesit (Emri,Mbiemri,Nrtelefonit,GrupiGjakut,Qyteti) values ('$Emri','$Mbiemri','$Nrtelefonit','$GrupiGjakut','$Qyteti','$image')";

            if (mysqli_query($con, $query)) {
           
                header("Location:Dhuruesit.php");
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
<link rel="stylesheet" href="dhuruesitPyetsori.css"> 
</head>
<body>
<a href="Ballina.php" class="back-link">Back</a>


<div class="form-container">
    <h1>Dhuro Gjak</h1>
    <form action="proces_formdhuruesit.php" method="post" enctype="multipart/form-data">
        <label for="Emri">Emri:</label>
        <input type="text" id="Emri" name="Emri" placeholder="Emri" required>

        <label for="Mbiemri">Mbiemri:</label>
        <input type="text" id="Mbiemri" name="Mbiemri" placeholder="Mbiemri" required>
<br>
        <label for="Nrtelefonit">Nr Telefonit:</label>
        <input type="text" id="Nrtelefonit" name="Nrtelefonit" placeholder="Nr telefonit" required>

        <label for="GrupiGjakut">Grupi i Gjakut:</label>
        <select id="GrupiGjakut" name="GrupiGjakut" required>
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

        <label for="image">Ngarko Foto:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <button type="submit" name="upload">Dergo</button>
    </form>
</div>

</body>
</html>
