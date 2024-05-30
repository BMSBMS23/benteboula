<?php include "function.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>courses</title>
    <style>
        .sidebar.active ~ .home_content .tab table {
            border-collapse: collapse;
            margin-left: 40px;
            width: 80%;
            transition: all 0.4s ease;
        }
        .sidebar ~ .home_content .tab table {
            border-collapse: collapse;
            width: 80%;
            margin-left: 120px;
            transition: all 0.4s ease;
        }
        .sidebar.active ~ .home_content button {
            transition: all 0.4s ease;
            margin-right: 18%;
        }
        .sidebar ~ .home_content button {
            margin-right: 200px;
            transition: all 0.4s ease;
            margin-bottom: 20px;
        }
        body {
            font-family: sans-serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color:#ffaf97;}
        .table-container {
            max-height: 730px; /* Set the desired max height */
            overflow-y: auto;
            width: 100%;
        }
        summary{
        list-style-type:"";
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>

<body>
  
  <nav>
      <img src="logo.jpg" alt=""style="width: 110px; height: 78px;">
      <div class="navigation">
        <ul>
          <i id="menu-close" class='bx bx-x'></i>
          <li><a  href="accueil.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a class="active" href="courses.php">Courses</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <a href="login.php"><button class="button"><i class='bx bx-log-in'></i><br>Login</button></a>
      </div>
  </nav>
  
  <section id="courses">
      <h2>Courses</h2>
  </section>

  <section id="course">
  <div class="about-text">
          <h1>Enhance your proficiency in english with our best courses</h1><br>
          <p>We are a dedicated organization passionate about empowering individuals through the power of the English language.</p>
      </div>
      <div class="course-box">
          <div class="courses">
                <img  src="general english.jpg" alt="">
                   <div class="details">
                   <details class="courses">
        <summary>
                        <h6 style="margin-left: 120px;">General English Course</h6>
                        </summary>
                        These courses are typically offered at a variety of levels, from beginner to advanced, and can be taken in a variety of formats, such as group classes, private lessons, or online courses.
                   </div>
          </div>
          <div class="courses">
              <img src="acadimic year diploma.jpg" alt="">
                 <div class="details">
                 <details class="courses">
        <summary>
                      <h6 style="margin-left: 120px;">acadimic year diploma</h6>
                      </summary>
                      Academic year diploma programs typically cover a wide range of topics related to the student's chosen field of study. In addition to classroom instruction, students may also participate in internships, practicums, and other hands-on learning experiences.
                 </div>
           </div>
        <div class="courses">
          <img src="ielts preparation.jpg" alt="">
             <div class="details">
             <details class="courses">
        <summary>
                  <h6 style="margin-left: 120px;">Ielts preparation</h6>
                  </summary>
                  This preparation aims to improve the language skills necessary to pass the four sections of the exam , oral comprehension , written comprehension , written expression , and oral expression.
             </div>
    </div>
    <div class="courses">
      <img src="speaking club.jpg" alt="">
         <div class="details">
         <details class="courses">
        <summary>
              <h6 style="margin-left: 120px;">Speaking club</h6>
              </summary>
              a great opportunity for those who want to improve their speaking skills in a foreign language through regular practice and interaction with other learners.
              </details>
            </div>
    </div>
    <div class="courses">
      <img src="business english.jpg" alt="">
         <div class="details">
         <details class="courses">
        <summary>
              <h6 style="margin-left: 120px;">Business english</h6>
              </summary>
              Business English is often taught to adults who are looking to improve their professional performance or prepare for working in English-speaking environments.
              </details>
            </div>
</div>
<div class="courses" >
  <img src="english for kids.jpg" alt="">
     <div class="details">
     <details class="courses">
        <summary>
          <h6 style="margin-left: 120px;">English for kids</h6>
          </summary>
          “English for Kids” is a term used to refer to programs, resources, or courses specifically designed to teach English to children. This can include books, apps, educational games, videos, and interactive activities that make learning English fun and accessible for young learners. These resources are often tailored to different ages and skill levels to help children develop their English skills in a gradual and engaging way.
          
        </details>
        </div>
</div>
</div>
<div class="about-text">
          <h1>Our programme</h1><br>
          <p>Consult our English course program to find out the times and levels available.</p>
      
      </div>
      <div class="tab">
    <div class="table-container">
        <table style="width:95%; margin-top:3%;margin-left:2%;margin-bottom:2%">
            <tr>
                <th style="width:10%;height: 30%;background-color:transparent"></th>
                <th style="width:15%;height: 30%;">Dimanche</th>
                <th style="width:15%;height: 30%;">Lundi</th>
                <th style="width:15%;height: 30%;">Mardi</th>
                <th style="width:15%;height: 30%;">Mercredi</th>
                <th style="width:15%;height: 30%;">Jeudi</th>
            </tr>
            <?php
            $timeSlots = ['08:00-10:00', '10:00-12:00', '13:00-15:00', '15:00-17:00'];
            $days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi'];
            
            foreach ($timeSlots as $slot) {
                echo "<tr><th style='width:10%;height: 30%;'>$slot</th>";
                foreach ($days as $day) {
                    $sql = "SELECT * FROM emploi WHERE jour = '$day' AND Seance = '$slot'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        echo "<td style='width:25%;height:30%;border-radius: 20px; background-color: #d4edff; data-bs-toggle='modal' data-bs-target='#createModal'>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo " Formation : {$row['formation']} <br> Formateur : {$row['Nom']} <br> Salle : {$row['salle']}<br><br>";
                        }
                        echo "</td>";
                    } else {
                        echo "<td style='width:15%;height: 30%;background-color:transparent'>Aucune séance</td>";
                    }
                }
                echo "</tr>";
            }
            ?>
        </table>

    </div>
</div>

  </section>

  <footer>
      <div class="footer-col">
          <h3>Contact: </h3>
          <li>Tel: 0770 30 75 15</li>
          <li>Adresse: Annaba à côté du lycée Moubarak El mili - <br>
              la première intersection à gauche, Annaba 23000</li>

      </div>
      <div class="footer-col">
          <h3>Quick links:</h3>
          <a href="register.php"><li>Register</li></a>
          <a href="contact.php"> <li>Send a message</li></a>
          <li>Who are we</li>

      </div><div class="footer-col">
          <h3>Information:</h3>
          <li>Our partner</li>
          <li>Our regional headquarters</li>

      </div>
      <div class="copyright">
          <p>Copyright©2024 All right reserved</p>
          <div class="pro-links">
          <a href="https://web.facebook.com/elitesenglishschool/?_rdc=1&_rdr">  <i class='bx bxl-facebook-circle'></i></a>
             <a href="https://www.instagram.com/elites_english_school/" > <i class='bx bxl-instagram-alt' ></i></a>
              <i class='bx bxl-gmail' ></i>
          </div>
      </div>
  </footer>

</body>

</html>