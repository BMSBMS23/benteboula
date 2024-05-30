<?php include "function.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

.sidebar.active ~ .home_content .tab table{
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
.sidebar.active ~ .home_content button{
    transition: all 0.4s ease;
    margin-right: 18%;

}
.sidebar ~ .home_content button{
    margin-right: 200px;
    transition: all 0.4s ease;
    margin-bottom :20px;
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

    </style>
</head>
<body>
<div class="tab">
        <table style="width:95%;margin-left:2%; margin-top:10%">
    
            <tr>
                <th style="width:10%;height: 30%;background-color:transparent"></th>
                <th style="width:15%;height: 30%;">Dimanche</th>
                <th style="width:15%;height: 30%;">Lundi</th>
                <th style="width:15%;height: 30%;">Mardi</th>
                <th style="width:15%;height: 30%;">Mercredi</th>
                <th style="width:15%;height: 30%;">Jeudi</th>
            </tr>
            <tr >
            
               
            <th style="width:10%;height: 30%;" value=""> 08:00-10:00</th>
            <?php
             
             $sql = "SELECT * FROM emploi WHERE jour = 'Dimanche' AND Seance = '08:00-10:00'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
                 
            if ($row = mysqli_fetch_assoc($result)) {

               ?>
             <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"><?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
             
             <?php }
            else{
                ?>
                <td style="width:15%;height: 30%;background-color:transparent"></td>
                <?php
            }
            } ?>
             <?php
             
             $sql = "SELECT * FROM emploi WHERE jour = 'Lundi' AND Seance = '08:00-10:00'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
                 
            if ($row = mysqli_fetch_assoc($result)) {

               ?>
                <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                <?php }
            else{
                ?>
                <td style="width:15%;height: 30%;background-color:transparent"></td>
                <?php
            }
            } ?>                <?php
             
             $sql = "SELECT * FROM emploi WHERE jour = 'Mardi' AND Seance = '08:00-10:00'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
                 
            if ($row = mysqli_fetch_assoc($result)) {

               ?> 
                <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                <?php }
            else{
                ?>
                <td style="width:15%;height: 30%;background-color:transparent"></td>
                <?php
            }
            } ?>
                 <?php
             
             $sql = "SELECT * FROM emploi WHERE jour = 'Mercredi' AND Seance = '08:00-10:00'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
                 
            if ($row = mysqli_fetch_assoc($result)) {

               ?>
                <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                <?php }
            else{
                ?>
                <td style="width:15%;height: 30%;background-color:transparent"></td>
                <?php
            }
            } ?>                
            <?php
             
             $sql = "SELECT * FROM emploi WHERE jour = 'Jeudi' AND Seance = '08:00-10:00'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
                 
            if ($row = mysqli_fetch_assoc($result)) {

               ?>
                <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                <?php }
            else{
                ?>
                <td style="width:15%;height: 30%;background-color:transparent"></td>
                <?php
            }
            } ?>
            </tr>


            
            <tr >
               
            <th style="width:10%;height: 30%;" value=""> 10:00-12:00</th>
            <?php
             
             $sql = "SELECT * FROM emploi WHERE jour = 'Dimanche' AND Seance = '10:00-12:00'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
                 
            if ($row = mysqli_fetch_assoc($result)) {

               ?>
             <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
             <?php }} ?>
             <?php
             
             $sql = "SELECT * FROM emploi WHERE jour = 'Lundi' AND Seance = '10:00-12:00'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
                 
            if ($row = mysqli_fetch_assoc($result)) {

               ?>
                <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                <?php }} ?>
                <?php
             
             $sql = "SELECT * FROM emploi WHERE jour = 'Mardi' AND Seance = '10:00-12:00'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
                 
            if ($row = mysqli_fetch_assoc($result)) {

               ?> 
                <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                <?php }} ?>
                <?php
             
             $sql = "SELECT * FROM emploi WHERE jour = 'Mercredi' AND Seance = '10:00-12:00'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
                 
            if ($row = mysqli_fetch_assoc($result)) {

               ?>
                <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                <?php }} ?>
                <?php
             
             $sql = "SELECT * FROM emploi WHERE jour = 'Jeudi' AND Seance = '10:00-12:00'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
                 
            if ($row = mysqli_fetch_assoc($result)) {

               ?>
                <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                <?php }} ?>
            </tr>


            <tr >
               
               <th style="width:10%;height: 30%;" value=""> 13:00-15:00</th>
               <?php
                
                $sql = "SELECT * FROM emploi WHERE jour = 'Dimanche' AND Seance = '13:00-15:00'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    
               if ($row = mysqli_fetch_assoc($result)) {
   
                  ?>
                <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                <?php }} ?>
                <?php
                
                $sql = "SELECT * FROM emploi WHERE jour = 'Lundi' AND Seance = '13:00-15:00'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    
               if ($row = mysqli_fetch_assoc($result)) {
   
                  ?>
                   <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                   <?php }} ?>
                   <?php
                
                $sql = "SELECT * FROM emploi WHERE jour = 'Mardi' AND Seance = '13:00-15:00'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    
               if ($row = mysqli_fetch_assoc($result)) {
   
                  ?> 
                   <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                   <?php }} ?>
                   <?php
                
                $sql = "SELECT * FROM emploi WHERE jour = 'Mercredi' AND Seance = '13:00-15:00'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    
               if ($row = mysqli_fetch_assoc($result)) {
   
                  ?>
                   <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                   <?php }} ?>
                   <?php
                
                $sql = "SELECT * FROM emploi WHERE jour = 'Jeudi' AND Seance = '13:00-15:00'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    
               if ($row = mysqli_fetch_assoc($result)) {
   
                  ?>
                   <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                   <?php }} ?>
               </tr>

               <tr >
               
               <th style="width:10%;height: 30%;" value=""> 15:00-17:00</th>
               <?php
                
                $sql = "SELECT * FROM emploi WHERE jour = 'Dimanche' AND Seance = '15:00-17:00'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    
               if ($row = mysqli_fetch_assoc($result)) {
   
                  ?>
                <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                <?php }} ?>
                <?php
                
                $sql = "SELECT * FROM emploi WHERE jour = 'Lundi' AND Seance = '15:00-17:00'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    
               if ($row = mysqli_fetch_assoc($result)) {
   
                  ?>
                   <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                   <?php }} ?>
                   <?php
                
                $sql = "SELECT * FROM emploi WHERE jour = 'Mardi' AND Seance = '15:00-17:00'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    
               if ($row = mysqli_fetch_assoc($result)) {
   
                  ?> 
                   <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                   <?php }} ?>
                   <?php
                
                $sql = "SELECT * FROM emploi WHERE jour = 'Mercredi' AND Seance = '15:00-17:00'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    
               if ($row = mysqli_fetch_assoc($result)) {
   
                  ?>
                   <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                   <?php }} ?>
                   <?php
                
                $sql = "SELECT * FROM emploi WHERE jour = 'Jeudi' AND Seance = '15:00-17:00'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    
               if ($row = mysqli_fetch_assoc($result)) {
   
                  ?>
                   <td style="width:15%;height: 30%;background-color:transparent"  data-bs-toggle="modal" data-bs-target="#createModal"> <?=$row['jour'] ?> Formation: <?=$row['formation'] ?> <br> Formateur: <?=$row['nom']?> <br> Salle: <?=$row['salle']?></td>
                   <?php }} ?>
               </tr>

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createModalLabel">Nouvelle séance</h1>
          <button type="button" class="btclosn-e" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form action="" method="post" autocomplete="off" id="add" >
            <input type="hidden" id="action" value="addemploi">
            <div class="col-md">
                    <label class="form-label">Jour</label>
                    <div class="form-floating">
                        <select class="form-select" name="jour" id="jour" aria-label="jour" method="post">
                        <option id="jour" value="" ></option>
                            <option id="jour" value="Dimanche">Dimanche</option>
                            <option id="jour" value="Lundi">Lundi</option>
                            <option id="jour" value="Mardi">Mardi</option>
                            <option id="jour" value="Mercredi">Mercredi</option>
                            <option id="jour" value="Jeudi">Jeudi</option>
                         </select>
                    </div>
                  </div>
            
                  <div class="col-md">
                    <label class="form-label">Séance</label>
                    <div class="form-floating">
                        <select class="form-select" name="Seance" id="Seance" aria-label="Seance">
                        <option id="Seance" value=""></option>
                            <option id="Seance" value="08:00-10:00">08:00-10:00</option>
                            <option id="Seance" value="10:00-12:00">10:00-12:00</option>
                            <option id="Seance" value="13:00-15:00">13:00-15:00</option>
                            <option id="Seance" value="15:00-17:00">15:00-17:00</option>
                         </select>
                    </div>
                  </div>
               
                  <div class="col-md">
                    <label class="form-label">Formation</label>
                    <div class="form-floating">
                        <select class="form-select" name="formation" id="formation" aria-label="formation">
                        <option id="Séance" value=""></option>
                            <option id="formation" value="General English courses">General English courses</option>
                            <option id="formation" value="acadimic year diploma">acadimic year diploma</option>
                            <option id="formation" value="Ielts preparation">Ielts preparation</option>
                            <option id="formation" value="Speaking club">Speaking club</option>
                            <option id="formation" value="Business english">Business english</option>
                            <option id="formation" value="English for kids">English for kids</option>
                        </select>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Formateur</label>
                    <input type="text" class="form-control" id="nom">
                  </div>
                  <div class="col-md">
                    <label class="form-label">Salle</label>
                    <div class="form-floating">
                        <select class="form-select" name="salle" id="salle" aria-label="salle">
                        <option id="Séance" value=""></option>
                            <option id="salle" value="salle1">salle 1</option>
                            <option id="salle" value="salle2">salle 2</option>
                            <option id="salle" value="salle3">salle 3</option>
                            <option id="salle" value="salle4">salle 4</option>
                         </select>
                    </div>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary" onclick="submitData();" id="add">Ajouter <i class="fas fa-plus"></i></button>
        </div>
        <?php require 'script.php'; ?>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="process.js"></script>
</body>
</html>