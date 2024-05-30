<?php 
$conn = mysqli_connect("localhost", "root", "", "anglais");
if(isset($_GET['deleteen'])){
    $id = $_GET['deleteen'];
    $delete= mysqli_query($conn,"DELETE FROM formateurs WHERE FormateurID = '$id'");
    if($delete){
        header("location:enseiadm.php");
        die();
    }
}
?>
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
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="crossorigin="anonymous" referrerpolicy="no-referrer" >
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <title>espace admin</title>


    <title>espace admin</title>
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
        
        <li>
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
        <li class="active">
            <a class="active" href="#">
                <i class="fi fi-sr-graduation-cap"></i>
                <span class="links_name">Formateur</span>
            </a>
            <span class="tooltips">Formateur</span>

        </li>
        <li>
            <a href="emploi.php">
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
            <a href="cont.php">
                <i class='bx bxs-message'></i>
                <span class="links_name">Messages</span>
            </a>
            <span class="tooltips">Messages</span>

        </li>
   
    </ul>
    <div class="profile_content">
        <div class="profile">
      <a href="logout.php"><i class='bx bx-log-out' id="log_out" style="color: #fff;"></i></a>  
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
    <section class="container" style="width: 80%;margin-left:7%;margin-top:1%;">
        <div class="row">
            <div class="col-lg-8 col-sm" style="margin-left:10%; margin-bottom:2%">
                <h1 class="fs-2 text-center lead text-primary" style="font-family:Verdana, Geneva, Tahoma, sans-serif">Gestion des Formateur</h1>
            </div>
        </div>
        <div class="dropdown-divider" style="margin-bottom: 15px; margin-right: 8%; border-top:1px solid #ccccd0;"></div>
        <div class="row">
            <div class="col-md-4">
                <h5 class="fw-bold mb-0"> La liste des Formateur</h5>
            </div>
            <div class="col-md-7">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm me-3"data-bs-toggle="modal" data-bs-target="#createModal">
                        <i class="fas fa-folder-plus"></i> Nouveau</button>
                </div>
            </div>
        </div>
        <div class="dropdown-divider" style="margin-top: 15px; margin-right: 8%; border-top:1px solid #ccccd0;"></div>
        <div class="row">
            <div class="table-responsive" style="margin-top: 40px; max-width: 92%;">
            <table class="table">
                <thead class="table-light">

                    <?php
                    include_once "function.php";
                    $sql = "SELECT * FROM formateurs";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        ?>

                  <tr>
                    <th scope="col"style="width: 3%;">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">DateNaissance</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Diplome</th>
                    <th scope="col">Option</th>
                   
                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                  <tr>
                        <td style=" text-align: start;"><?=$row['FormateurID']?></td>
                        <td style=" text-align: start;"><?=$row['Nom']?></td>
                        <td style=" text-align: start;"><?=$row['Prenom']?></td>
                        <td style=" text-align: start;"><?=$row['DateNaissance']?></td>
                        <td style=" text-align: start;"><?=$row['Telephone']?></td>
                        <td style=" text-align: start;"><?=$row['Email']?></td>
                        <td style=" text-align: start;"><?=$row['DiplomesCertifications']?></td>
                            
                    <td>
                    <a href="editen.php?editen=<?php echo $row['FormateurID']?>" class="text-primary me-2 editbtn"title="Modifier"><i class="fas fa-edit"></i></a>

                       
                        <a href="enseiadm.php?deleteen=<?php echo $row['FormateurID']?>" onclick="return confirm('Voulez-vous supprimer cette personne ?')" class="text-danger me-2 deletebtn"title="supprimer"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  <?php
                        }}
                    ?>
                </tbody>
              </table>
            </div>
        </div>
      </section>
  
  <!-- Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createModalLabel">Nouveau Formateur</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form action="" method="post" autocomplete="off" id="add" >
            <input type="hidden" id="action" value="createen">
                <div class="mb-3">
                  <label for="" class="form-label">Nom</label>
                  <input type="text" class="form-control" id="Nom">
                </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Prenom</label>
                    <input type="text" class="form-control" id="Prenom">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Date Naissance</label>
                    <input type="date" class="form-control" id="DateNaissance">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Telephone</label>
                    <input type="number" class="form-control" id="Telephone" pattern="[0-9]+">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="e-mail" class="form-control" id="Email"autocomplete="off">
                  </div>
                  <div class="col-md">
                  <div class="mb-3">
                    <label for="" class="form-label">Diplome</label>
                    <input type="text" class="form-control" id="DiplomesCertifications"autocomplete="off">
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
      
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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