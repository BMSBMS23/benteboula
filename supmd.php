<?php include "function.php"; ?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Document</title>
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
            background-color: #f0f0f0;
        }
        .table-container {
            max-height: 730px; /* Set the desired max height */
            overflow-y: auto;
            width: 100%;
        }
    </style>
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
        
        <li >
            <a href="accadm.php">
                <i class='bx bxs-home-alt-2'></i>
                <span class="links_name">Accueil</span>
            </a>
            <span class="tooltips">Accueil</span>

        </li>
        <li>
            <a href="apradm.php">
                <i class="fi fi-ss-users-class"></i>       
                <span class="links_name">Apprenant</span>
            </a>
            <span class="tooltips">Apprenant</span>

        </li>
        <li>
            <a href="enseiadm.php">
                <i class="fi fi-sr-graduation-cap"></i>
                <span class="links_name">Enseignant</span>
            </a>
            <span class="tooltips">Enseignant</span>

        </li>
        <li class="active">
            <a class="active" href="#">
                <i class='bx bxs-calendar'></i>
                <span class="links_name">Emplois du temps</span>
            </a>
            <span class="tooltips">Emplois</span>

        </li>
        <li>
            <a href="salle.php">
                <i class="fi fi-rs-school"></i>
                <span class="links_name">Salle</span>
            </a>
            <span class="tooltips">Salle</span>
        </li>
        <li>
            <a href="formation.php">
                <i class="fi fi-ss-e-learning"></i>
                <span class="links_name">Formation</span>
            </a>
            <span class="tooltips">Formation</span>

        </li>
        <li>
            <a href="#">
                <i class='bx bxs-message'></i>
                <span class="links_name">Messages</span>
            </a>
            <span class="tooltips">Messages</span>

        </li>

    </ul>
    <div class="profile_content">
        <div class="profile">
       <a href="logout.php"> <i class='bx bx-log-out' id="log_out" style="color : #fff;"></i></a>
            <div class="profile_details">
                <i class='bx bxs-user-circle' ></i>
                <div class="name_job">
                <div class="name"><?php include_once("function.php");
                            $sql = "SELECT Nom FROM administrateurs";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            if ($row = mysqli_fetch_assoc($result)) {     ?>
                <div class="name"> <?=$row['Nom']?></div>
                <?php } }?></div>
                <div class="job">Administrateur</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="home_content">
<div class="tab" style="width:85%;margin-left:1%">
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
            include_once("function.php");
            $timeSlots = ['08:00-10:00', '10:00-12:00', '13:00-15:00', '15:00-17:00'];
            $days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi'];
            foreach ($timeSlots as $slot) {
                echo "<tr><th style='width:10%;height: 30%;'>$slot</th>";
                foreach ($days as $day) {
                    $sql = "SELECT * FROM emploi WHERE jour = '$day' AND Seance = '$slot'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        echo "<td style='width:15%;height: 30%;background-color:transparent'>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "Formation: {$row['formation']} <br> Formateur: {$row['Nom']} <br> Salle: {$row['salle']}<br><br>";
                            echo "<button class='btn btn-danger btn-sm' onclick='confirmDeletion({$row['idemploi']})'>Supprimer</button>";
                        }
                        echo "</td>";
                    } else {
                        echo "<td style='width:15%;height: 30%;background-color:transparent'>Aucune séance</td>";
                    }
                }
                echo "</tr>";
            }
            ?>
        </table> <a href="emploi.php"><button type="button" class="btn btn-primary" style="width:15%;margin-left:43%;margin-bottom:1%">Back <i class="fas"></i></button></a>

      </div>
    </div>
</div>

<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function() {
        sidebar.classList.toggle("active");
    }

    function confirmDeletion(idemploi) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cette séance?")) {
            window.location.href = `delete_session.php?id=${idemploi}`;
        }
    }
</script>

<script src="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="process.js"></script>

</body>
</html>
