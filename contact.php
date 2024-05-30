<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

  
  <nav>
      <img src="logo.jpg" alt=""style="width: 110px; height: 78px;">
      <div class="navigation">
        <ul>
          <i id="menu-close" class='bx bx-x'></i>
          <li><a href="accueil.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a class="active" href="contact.php">Contact</a></li>
        </ul>
        <a href="login.php"><button class="button"><i class='bx bx-log-in'></i><br>Login</button></a>
      </div>
  </nav>
  
  <section id="contactus">
      <h2>Contact Us</h2>
  </section>
  <section id="contact" >
      <div class="getin">
          <h2>Get in touch</h2>
          <p>looking for help? Fill the form and star a new adventure.</p>
          <div class="getin-details">
              <h3>Headquarters</h3>
              <div>
                  <i class='bx bxs-home'></i>
                  <p>Adresse: Annaba à côté du lycée Moubarak El mili - <br>
                      la première intersection à gauche, Annaba 23000</p>
              </div>
              <h3>Phone</h3>
              <div>
                  <i class='bx bxs-phone'></i>
                  <p>07 70 30 75 15 <br>07 70 92 82 26 </p>
              </div>
              <h3>Support</h3>
              <div>
                  <i class='bx bxs-envelope'></i>           
                    <p> </p>
              </div>
              <h3>Follow Us</h3>
              <div class="pro-links">
              <a href="https://web.facebook.com/elitesenglishschool/?_rdc=1&_rdr">  <i class='bx bxl-facebook-circle'></i></a>
             <a href="https://www.instagram.com/elites_english_school/" > <i class='bx bxl-instagram-alt' ></i></a>
              <i class='bx bxl-gmail' ></i>

              </div>

          </div>
      </div>
      <div class="form">
          <h4>Contact</h4>
          <p>contact us for more information or question</p>
          <form action="" autocomplete="off" method="post">
          <input type="hidden" id="action" value="contact">
          <div class="form-row">
              <input type="text" name="nom" id="nom"  placeholder="Your Name">
              <input type="text" name="email" id="email"  placeholder="Email">
          </div>
          <div class="form-col">
              <input type="text" name="obj"  id="obj" placeholder="subject">
          </div>
          <div class="form-col">
              <textarea name="msg" id="msg"  cols="30" rows="8" placeholder="How can we help ?"></textarea>
          </div>
          <div class="form-col">
              <button  onclick="submitData();">Send Message</button>
              <?php require 'script.php';?>
          </div>
          </form>
      </div>
  </section>
  <section id="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12759.66000877774!2d7.7594348!3d36.9162966!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12f0072cdbaa9ea7%3A0xe7079524f516a891!2sElites%20school%20of%20English%20Annaba!5e0!3m2!1sfr!2sdz!4v1713303530900!5m2!1sfr!2sdz" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>

  <footer>
      <div class="footer-col">
          <h3>Contact: </h3>
          <li>Tel: 07 70 30 75 15</li>
          <li>Adresse: Annaba à côté du lycée Moubarak El mili- <br> la première intersection à gauche, Annaba 23000</li>

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