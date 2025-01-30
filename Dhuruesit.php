<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

// Write the query to get data from Dhuruesit table
$sql = "SELECT * FROM dhuruesit";

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
    <link rel="stylesheet" href="dhuruesit.css">
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
                    <li><a href="Ballina.php" class="link">Ballina</a></li>
                    <li><a href="Dhuruesit.php" class="link active">Dhuruesit</a></li>
                    <li><a href="Kerkuesit.php" class="link">Kerkuesit</a></li>
                    <li><a href="RrethNesh.php" class="link">Rreth Nesh</a></li>
                    <li><a href="logout.php" class="link">logout</a></li>
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
                        <p>
                            <b>
                                Për të gjetur se cilit grup mund ti dhuroni gjak-Selektoni grupin e gjakut tuaj :
                            </b>
                        </p>
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="a_pozitiv()">A+</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="a_negativ()">A-</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="b_pozitiv()">B+</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="b_negativ()">B-</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="ab_pozitiv()">AB+</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="ab_negativ()">AB-</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="o_pozitiv()">O+</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="o_negativ()">O-</button>
                        <br>
                        <br>
                        <p id="demo"> Ju lutem shtypni njërin nga butonet:</p>
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
                    echo 'Grupi-Gjakut: ' . $row['GrupiGjakut'] . '<br>','<br>';
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
            if (i.className === "nav-menu") {
                i.className += " responsive";
            } else {
                i.className = "nav-menu";
            }
        }

        let lastScrollTop = 0;

        window.addEventListener('scroll', function () {
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScroll > lastScrollTop) {
                document.querySelector('.nav').classList.add('nav-hidden');
            } else {
                document.querySelector('.nav').classList.remove('nav-hidden');
            }
            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        }, false);

        function a_pozitiv() {
            document.getElementById("demo").innerHTML = "Ju mund ti dhuroni grupeve: A+ dhe AB+ Dhe mund të merrni nga:A+, A-, O+ dhe O-";
        }

        function a_negativ() {
            document.getElementById("demo").innerHTML = "Ju mund ti dhuroni grupeve:A-, A+, AB- dhe AB+ Dhe mund të merrni nga:A- dhe O-";
        }

        function b_pozitiv() {
            document.getElementById("demo").innerHTML = "Ju mund ti dhuroni grupeve:B+ dhe AB+ Dhe mund të merrni nga:B+, B-, O+ dhe O-";
        }

        function b_negativ() {
            document.getElementById("demo").innerHTML = "Ju mund ti dhuroni grupeve:AB-, AB+, B- dhe B+ Dhe mund të merrni nga:B- dhe O-";
        }

        function ab_pozitiv() {
            document.getElementById("demo").innerHTML = "Ju mund ti dhuroni grupeve:AB+ Dhe mund te merrni nga të gjitha grupet";
        }

        function ab_negativ() {
            document.getElementById("demo").innerHTML = "Ju mund ti dhuroni grupeve:AB+ dhe AB- Dhe mund të merrni nga:AB+, A-, B- dhe O-";
        }

        function o_pozitiv() {
            document.getElementById("demo").innerHTML = "Ju mund ti dhuroni grupeve:O+, A+, B+ dhe AB+ Dhe mund të merrni nga:O+ dhe O-";
        }

        function o_negativ() {
            document.getElementById("demo").innerHTML = "Ju mund ti dhuroni the gjitha grupeve Dhe mund të merrni vetem nga O-";
        }
    </script>
</body>
</html>
