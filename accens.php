
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'> 
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="index.css">

    <title>Accueil formateur</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
              <img src="logo.jpg" alt="" style="height: 60px; width: 70px; border-radius: 12px;"> 
                 <div class="logo_name">Elite School <br>Of English</div>
            </div><i class='bx bx-menu' id="btn"></i>
        </div>
        
        <ul class="nav_list">
        
        <li class="active">
            <a class="active" href="#">
                <i class='bx bxs-home-alt-2'></i>
                <span class="links_name">Accueil</span>
            </a>
            <span class="tooltips">Accueil</span>

        </li>
        <li>
            <a href="note.php">
                    <i class='bx bxs-book'></i>
                    <span class="links_name">Note</span>
            </a>
            <span class="tooltips">Note</span>

        </li>
        <li>
            <a href="Absence.php">
            <i class='bx bxs-calendar'></i>
                <span class="links_name">Absence</span>
            </a>
            <span class="tooltips">Absence</span>

        </li>
        <li>
            <a href="emploiens.php">
            <i class='bx bxs-time'></i>
                <span class="links_name">Emplois du temps</span>
            </a>
            <span class="tooltips">Emplois</span>

        </li>
        <li>
            <a href="exam.php">
            <i class='bx bxs-graduation'></i>
                <span class="links_name">Examen</span>
            </a>
            <span class="tooltips">Examen</span>
        </li>



    </ul>
    <div class="profile_content">
        <div class="profile">
       <a href="logout.php"> <i class='bx bx-log-out' id="log_out" style="color : #fff;"></i></a>
            <div class="profile_details">
                <i class='bx bxs-user-circle' ></i>
                <div class="name_job">
                <div class="name"><?php include_once("function.php");
                            $sql = "SELECT Nom FROM formateurs ";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            if ($row = mysqli_fetch_assoc($result)) {     ?>
                <div class="name"> <?=$row['Nom']?></div>
                <?php } }?></div>
                <div class="job">Formateur</div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="home_content">
        <div class="head" ><h4>W</h4>elcome to your managmement space
        </div>
        <div class="text">Statistiques</div>
    <div class="state" style="grid-template-columns: repeat(2 , 1fr);margin-top:50px;">
        <div class="state-box1" style="width: 450px;">
            <i class="fi fi-ss-users-class" style="margin-left: 350px;"></i> 
            

<i class="fi fi-ss-users-class" style="margin-left: 350px;"></i>
<?php      
            include_once("function.php"); // Ensure this file establishes the database connection in $conn

$sql = "SELECT COUNT(ApprenantID) as total FROM apprenants";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
        $totalApprenants = $row['total'];
    }
} else {
    $totalApprenants = 0; // Default to 0 if the query fails or returns no rows
}
?>
<h5><?php echo $totalApprenants; ?></h5> 
               <h6>Nombre total Apprenant(s)</h6>
        </div>

        <div class="state-box4" style="width: 450px;">
            <i class="fi fi-ss-e-learning" style="margin-left: 350px;"></i>
            <?php      
            include_once("function.php"); // Ensure this file establishes the database connection in $conn

$sql = "SELECT COUNT(idformation) as totalf FROM class";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
        $totalform = $row['totalf'];
    }
} else {
    $totalform = 0; // Default to 0 if the query fails or returns no rows
}
?>
            <h5><?php echo $totalform; ?></h5>
               <h6>Nombre total Formation</h6>
        </div>
          </div>

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function() {
        sidebar.classList.toggle("active");
        }
      
    </script>
   
   <script src="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="process.js"></script>



</body>
</html> 
