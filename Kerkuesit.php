<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Write the query to get data from kerkuesit table
$sql = "SELECT * FROM kerkuesit";

// Execute the query
$result = $con->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="kerkuesit.css">
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
                       <li><a href="ballina.php" class="link  ">Ballina</a></li>
                       <li><a href="Dhuruesit.php" class="link ">Dhuruesit</a></li>
                       <li><a href="Kerkuesit.php" class="link active">Kerkuesit</a></li>
                       <li><a href="RrethNesh.php" class="link">Rreth Nesh</a></li>
                       <li><a href="logout.php" class="link ">logout</a></li>
                   </ul>
               </div>
            
               <div class="nav-menu-btn">
                   <i class="bx bx-menu" onclick="myMenuFunction()"></i>
               </div>
           </nav>
        </div>
<br>
<br>
<br>
<br>
<br>

      
<!----------------------------------------------------------------------->
<div class="courses-container">
	<div class="course">
		<div class="course-preview">
			<div class="container-1">
                <div class="box-1">
                <b>
             <h3>- Keni nevoj per gjak - </h3>
           
              <br>

              <br>
              <div class="card-footer">
                <a href="Kerkogjak.php">
                    <button class="btn" >Kerko gjak</button>
                        </a>
            </div>
            </b>     
            </div> 
            </div> 
     		</div>
	</div>
</div>



<!---------------------------------------------->
<section id="section1">
        <div class="container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<div class="card-header">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" class="card-img" />';
                    echo '</div>';
                    echo '<div class="card-body">';
                    echo '<h2 class="card-title">' . $row['Emri'] . ' ' . $row['Mbiemri'] . '</h2>';
                    echo '<p class="card-text">';
                    echo 'Nr-Telefonit: ' . $row['Nrtelefonit'] . '<br>','<br>';
                    echo 'Grupi-Gjakut: ' . $row['Grupigjakut'] . '<br>','<br>';
                    echo 'Qyteti: ' . $row['Qyteti'] . '<br>';
                    echo '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </section>

<!------------------------------------------------------------------------------->
          <footer class="footer">
            <div class="container">
        
              <p class="copyright">
              &copy; 2024 All Rights Reserved by <a href="#" class="copyright-link">Dhuro & Kerko Gjake</a>
              </p>
        
            </div> 
          </footer>


        <script>
   
            function myMenuFunction() {
             var i = document.getElementById("navMenu");
             if(i.className === "nav-menu") {
                 i.className += " responsive";
             } else {
                 i.className = "nav-menu";
             }
            }
        /*  Javascript per me bo hide navbar kur jem scrool posht*/

            let lastScrollTop = 0;

window.addEventListener('scroll', function() {
    let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop) {
        // Kur Bojm Scrool down
        document.querySelector('.nav').classList.add('nav-hidden');
    } else {
        // Kur Bojm Scroll up
        document.querySelector('.nav').classList.remove('nav-hidden');
    }
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; 
}, false);



         </script>
</body>
</html>