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
                        echo "<td style='width:15%;height: 30%;background-color:transparent' data-bs-toggle='modal' data-bs-target='#createModal'>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "Formation: {$row['formation']} <br> Formateur: {$row['Nom']} <br> Salle: {$row['salle']}<br><br>";
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
      <a href="emploi.php"><button type="button" class="btn btn-primary" style="width:15%;margin-left:43%;margin-bottom:1%">Back <i class="fas"></i></button></a>

    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyRfNkEphF+6tkKp1/1sv6nktlRmxpS/ZfekpL1pF2hxOfXZ6L3e9O1" crossorigin="anonymous"></script>
</body>
</html>
