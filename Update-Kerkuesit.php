<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $Emri = $_POST['Emri'];
    $Mbiemri = $_POST['Mbiemri'];
    $Nrtelefonit = $_POST['Nrtelefonit'];
    $Grupigjakut = $_POST['Grupigjakut'];
    $Qyteti = $_POST['Qyteti'];

  
    if (!empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
      
        $sql = "UPDATE `kerkuesit` SET `Emri`='$Emri', `Mbiemri`='$Mbiemri', `Nrtelefonit`='$Nrtelefonit', 
           `Grupigjakut`='$Grupigjakut', `Qyteti`='$Qyteti', `image`='$image'
            WHERE `user_id`='$user_id';";
    } else {
   
        $sql = "UPDATE `kerkuesit` SET `Emri`='$Emri', `Mbiemri`='$Mbiemri', `Nrtelefonit`='$Nrtelefonit', 
           `Grupigjakut`='$Grupigjakut', `Qyteti`='$Qyteti'
            WHERE `user_id`='$user_id';";
    }

  
    $result = $con->query($sql);

    if ($result == TRUE) {
     
        header('Location: Dashboard-Kerkuesit.php');
        exit;
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

   
    $sql = "SELECT * FROM `kerkuesit` WHERE `user_id`='$user_id';";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $user_id = $row['user_id'];
            $Emri = $row['Emri'];
            $Mbiemri = $row['Mbiemri'];
            $Nrtelefonit = $row['Nrtelefonit'];
            $Grupigjakut = $row['Grupigjakut'];
            $Qyteti = $row['Qyteti'];
            $image = $row['image'];
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
        padding: 20px; 
        width: 100%;
        max-width: 400px; 
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .form-container h1 {
        text-align: center;
        margin-bottom: 15px; 
        font-size: 20px;
    }

    input, select, button {
        width: 90%;
        padding: 8px; 
        margin: 8px 0; 
        border-radius: 5px;
        border: none;
        font-size: 14px;
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
        font-size: 14px; 
    }
</style>

    </head>
<body>

<a href="Dashboard-Kerkuesit.php" class="back-link"> Back</a>

<div class="form-container">
    <h1>Update Kerkuesin</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

        <label for="Emri">Emri:</label>
        <input type="text" id="Emri" name="Emri" placeholder="Emri" value="<?php echo $Emri; ?>" required>

        <label for="Mbiemri">Mbiemri:</label>
        <input type="text" id="Mbiemri" name="Mbiemri" placeholder="Mbiemri" value="<?php echo $Mbiemri; ?>" required>
<br>
        <label for="Nrtelefonit">Nr Telefonit:</label>
        <input type="text" id="Nrtelefonit" name="Nrtelefonit" placeholder="Nr telefonit" value="<?php echo $Nrtelefonit; ?>" required>

        <label for="Grupigjakut">Grupi i Gjakut:</label>
        <select id="Grupigjakut" name="Grupigjakut" required>
            <option value="">Zgjedh Grupin e Gjakut</option>
            <option value="A+" <?php if ($Grupigjakut == 'A+') echo 'selected'; ?>>A+</option>
            <option value="A-" <?php if ($Grupigjakut == 'A-') echo 'selected'; ?>>A-</option>
            <option value="B+" <?php if ($Grupigjakut == 'B+') echo 'selected'; ?>>B+</option>
            <option value="B-" <?php if ($Grupigjakut == 'B-') echo 'selected'; ?>>B-</option>
            <option value="AB+" <?php if ($Grupigjakut == 'AB+') echo 'selected'; ?>>AB+</option>
            <option value="AB-" <?php if ($Grupigjakut == 'AB-') echo 'selected'; ?>>AB-</option>
            <option value="0+" <?php if ($Grupigjakut == '0+') echo 'selected'; ?>>0+</option>
            <option value="0-" <?php if ($Grupigjakut == '0-') echo 'selected'; ?>>0-</option>
        </select>

        <label for="Qyteti">Qyteti:</label>
        <select id="Qyteti" name="Qyteti" required>
            <option value="">Zgjedh Qytetin</option>
            <option value="Gjilan" <?php if ($Qyteti == 'Gjilan') echo 'selected'; ?>>Gjilan</option>
            <option value="Prishtine" <?php if ($Qyteti == 'Prishtine') echo 'selected'; ?>>Prishtine</option>
            <option value="Ferizaj" <?php if ($Qyteti == 'Ferizaj') echo 'selected'; ?>>Ferizaj</option>
            <option value="Prizeren" <?php if ($Qyteti == 'Prizeren') echo 'selected'; ?>>Prizeren</option>
            <option value="Istog" <?php if ($Qyteti == 'Istog') echo 'selected'; ?>>Istog</option>
            <option value="Pej&euml;" <?php if ($Qyteti == 'Pej&euml;') echo 'selected'; ?>>Pej&euml;</option>
            <option value="Gjakov" <?php if ($Qyteti == 'Gjakov') echo 'selected'; ?>>Gjakov</option>
            <option value="Skenderaj" <?php if ($Qyteti == 'Skenderaj') echo 'selected'; ?>>Skenderaj</option>
            <option value="Lipjan" <?php if ($Qyteti == 'Lipjan') echo 'selected'; ?>>Lipjan</option>
            <option value="Deçan" <?php if ($Qyteti == 'Deçan') echo 'selected'; ?>>Deçan</option>
            <option value="Suharek&euml;" <?php if ($Qyteti == 'Suharek&euml;') echo 'selected'; ?>>Suharek&euml;</option>
            <option value="Podujev" <?php if ($Qyteti == 'Podujev') echo 'selected'; ?>>Podujev</option>
        </select>

        <label for="image">Ngarko Foto:</label>
        <?php if (!empty($image)) { ?>
            <label for="currentImage"></label>
            <div>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" alt="Current Image" style="max-width: 50%; height: auto; border: 1px solid #ccc; margin-bottom: 10px; border-radius: 8px;">
            </div>
        <?php } ?>
        <input type="file" id="image" name="image" accept="image/*">

        <button type="submit" name="update">Update</button>
    </form>
</div>

</body>
</html>

<?php
    } else {
        // nese 'id' nuk eshte  valid na bon back te dashboard
        header('Location:Dashboard-Kerkuesit.php');
    }
}
?>
