<?php 
$hide="";
session_start();

include("connection.php");
include("functions.php");

  $user_data = check_login($con);

$user_data = check_login($con);
  $hide_dashboard = true;

// me bo check a ka bo log in user apo admin based on the role 
if(isset($_SESSION['user_id']) && $user_data['Role'] === 'admin') {
    // nese admini ka bo log in mos me bo hide dashboard
    $hide_dashboard = false;
}
		?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Ballina.css">
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
                       <li><a href="Ballina.php" class="link active ">Ballina</a></li>
                       <li><a href="Dhuruesit.php" class="link">Dhuruesit</a></li>
                       <li><a href="Kerkuesit.php" class="link">Kerkuesit</a></li>
                       <li><a href="RrethNesh.php" class="link">Rreth Nesh</a></li>
                       <?php
                // php me bo hide Dashboard nese User log in
                if(!$hide_dashboard) {
                    echo '<li><a href="dashboard.php" class="link">Dashboard</a></li>';
                }
            ?>
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
        <div class="container">
            <div class="text">
              <h1>Because of You, Life Doesn’t Stop</h1>
              <p>Every two seconds, someone in the U.S. needs blood. This could be a little girl in the ICU or a mother with Stage 3 leukemia. 
                If you’re worried about needles, don’t be—most blood donors compare the experience to a mild, split-second pinch! The entire process is very safe and very fast,
                 and you will feel amazing knowing you potentially saved up to three people.</p>
            </div>
            <div class="video">
              <iframe width="560" height="315" src="Videos/Video1.mp4" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
<br>
<br>
<!----------------------------------------------------------------------->
<div class="courses-container">
	<div class="course">
		<div class="course-preview">
			<h6>Dhuro</h6>
			<h2>Dhuro Gjak</h2>
               <p> Kur dhuroni ju shpëtoni shumë jetë shumë persona  kan nevojë për ju.</p>
                
               
		
		</div>
		<div class="course-info">
			
			<h6>Gjak</h6>
			<h2>Ndihmo</h2>
           
             <p> Dikush ka nevojë për ju.</p>
                <br>
                <a href="DhuruesitPyetsori.php">
            <button class="btn" >Vazhdo</button>
                </a>
		</div>
	</div>
</div>
<!---------------------------------------------->
<section id="section1">
<div class="container">
<div class="card card-1">
    <!-- card-header -->
    <div class="card-header">
      <img src="Images/Dhurogjake.jpg" class="card-img" />
    </div>
    
    <!------->
    <!-- card-body -->
    <div class="card-body">
      
      <h2 class="card-title">Dhuro Gjak</h2>
      <p class="card-text">
        Kur jepni gjak , ju shpëtoni jetë në komunitetin tuaj dhe më gjerë.
      </p>
    </div>
    <!------->
    <!-- card-fotter -->
    <div class="card-footer">
        <a href="DhuruesitPyetsori.php">
            <button class="btn" >Vazhdo</button>
                </a>
    </div>
  </div>
  <!-- Card 1 -->
  <!-- Card 2 -->
  <div class="card card-2">
    <!-- card-header -->
    <div class="card-header">
      <img src="Images/Dhurogjake2.jpg" class="card-img" />
    </div>
    <!-- card-header -->
    <!-- card-body -->
    <div class="card-body">
     
      <h2 class="card-title">Kërko Gjak</h2>
      <p class="card-text">
      Nëse ke nevojë për gjak - Kërko Gjak <br>
      Ёshtë dikush që do të ju ndihmojë
      </p>
    </div>
    <!-- card-body -->
    <div class="card-footer">
        <a href="Kerkogjak.php">
            <button class="btn" >Vazhdo</button>
                </a>
    </div>
    <!-- card-footer -->
  </div>
  <!-- Card 2 -->
  <!-- Card 3 -->
  <div class="card card-3">
    <!-- card-header -->
    <div class="card-header">
      <img src="Images/Dhurogjake3.jpg" class="card-img" />
    </div>
    <!-- card-header -->
    <!-- card-body -->
    <div class="card-body">
     
      <h2 class="card-title">Na kontaktoni</h2>
      <p class="card-text">
Për çdo nevojë ose arsyje mund të na kontaktoni
      </p>
    </div>
    <!-- card-body -->
    <!-- card-footer -->
    <div class="card-footer">
        <a href="RrethNesh.php">
            <button class="btn" >Vazhdo</button>
                </a>
    </div>
  
    <!-- card-footer -->
  </div>
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