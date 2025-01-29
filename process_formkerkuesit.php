

<html>

	<head>
		<title>Admin Kerkuesit</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		
		
		
		 
	</head

<body>
<?php

include "connection.php";

if(isset($_POST['upload'])){

   $Emri=$_POST['Emri'];
   $Mbiemri=$_POST['Mbiemri'];
$Nrtelefonit=$_POST['Nrtelefonit'];
$Grupigjakut = $_POST['Grupigjakut'];
$Qyteti= $_POST['Qyteti'];
$image = $_FILES['image']['tmp_name'];
	
	$image =addslashes (file_get_contents($_FILES['image']['tmp_name']));
	
	
	 $maxsize = 10000000; //set to approx 10 MB
	

	
	
	
	if(empty($Emri) || empty($Mbiemri)|| empty($Nrtelefonit) || empty($Grupigjakut)|| empty($Qyteti)|| empty($image)) {
				
		if(empty($Emri)) {
			echo "<font color='red'>Emri field is empty.</font><br/>";
		}
		
		if(empty($Mbiemri)) {
			echo "<font color='red'>Mbiemri field is empty.</font><br/>";
		}
		
		if(empty($Nrtelefonit)) {
			echo "<font color='red'>Nrtelefonit field is empty.</font><br/>";
		}
		if(empty($Grupigjakut)) {
			echo "<font color='red'>Grupigjakut field is empty.</font><br/>";
		}
		if(empty($Qyteti)) {
			echo "<font color='red'>Qyteti field is empty.</font><br/>";
		}if(empty($image)) {
			echo "<font color='red'>image field is empty.</font><br/>";
		}
      
	
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// nese fields nuk jon empty
			
		//bohen insert ne db
		$result = mysqli_query($con, "INSERT INTO `kerkuesit`( `Emri`, `Mbiemri`, `Nrtelefonit`,`Grupigjakut`,`Qyteti`,`image`) VALUES ('$Emri','$Mbiemri','$Nrtelefonit','$Grupigjakut','$Qyteti','$image')");
		
		//bohet display mesazhi nese kryhet me sukses
			echo "<script>
         setTimeout(function(){
            window.location.href = 'Kerkuesit.php';
         }, 3000);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 3 sekonda. <b></p>";
		 
	
	}
}
?>

</body>
</html>
