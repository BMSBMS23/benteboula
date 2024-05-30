
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <title>espace admin</title>

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
.home_content .row{
    align-items: center;
    margin-top:4%;
    margin-left: 140px;
    font-size: 30px;    
    color: #0042dd;
    transition: all 0.4s ease;
}
.sidebar.active ~  .home_content .row{
    margin-left: 40px;
    transition: all 0.4s ease;
}
.home_content .bor{
    margin-left:15%;
     margin-right: 8%; 
     border-top:1px solid #ccc;
     margin-top:1%;
     width:55%;
    margin-bottom: 2%;
    transition: all 0.4s ease;
}
.sidebar.active ~  .home_content .bor{
    margin-left: 40px;
    transition: all 0.4s ease;
}
.home_content .al{
    border-radius: 5px;
    cursor: pointer;
   height: 20%; 
   width: 20%;
    display: flex;
    margin-left: 140px;
    transition: all 0.4s ease;
    background-color: #11101d;
}
.home_content .al i{
    color: #fff;
    height: 50%;
    width: 50%;
   font-size: 50px;
    display: grid;
    grid-template-columns: repeat(3 , 1fr);
    margin-top: 15%;
    margin-left: 10%;
    transition: all 0.4s ease;
    background-color: transparent;
}
.home_content .al h5{
    color: #fff;
    margin-top: 15%;
    margin-left: 20%;
}
.sidebar.active ~  .home_content .al{
    margin-left: 60px;
    transition: all 0.4s ease;
}
    </style>

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
            <a href="cont.php">
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
    <div class="row">
            <div class="col-lg-8 col-sm" style="margin-left:4%">
                <h1 class="fs-2 text-center lead text-primary" style="font-family:Verdana, Geneva, Tahoma, sans-serif">Gestion des Emplois du Temps</h1>
            </div>
        </div> <div class="bor"></div> <br> 
        
        <div class="state" style="grid-template-columns: repeat(2 , 1fr);margin-left:7%">
        <div class="state-box8"data-bs-toggle="modal" data-bs-target="#createModal" style="width: 450px;background-color: rgb(0, 121, 20);">
        <i class="fi fi-sr-graduation-cap" style="margin-left: 350px;"></i>  <br>    
                   <h5>Ajouter une séance</h5> 
              
              
        </div>
        <a href="mp.php" style="text-decoration:none;width: 450px;background-color: rgb(0, 130, 190);" class="state-box5">
        <i class='bx bxs-calendar'style="margin-left: 350px;"></i><br>
                          <h5>Afficher l'emploi</h5> 
        </a>
        <a href="edmp.php" style="text-decoration:none;width: 450px;background-color: rgb(203, 98, 0);" class="state-box6">
        <i class='bx bxs-calendar'style="margin-left: 350px;"></i><br>
                          <h5>Modifier l'emploi</h5> 
        </a>
        <a href="supmd.php" style="text-decoration:none;width: 450px; background-color:rgb(226, 45, 45);" class="state-box7">
        <i class='bx bxs-calendar'style="margin-left: 350px;"></i><br>
                          <h5>Supprimer l'emploi</h5> 
        </a>
    </div>
        
    </div>
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createModalLabel">Nouvelle séance</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form action="" method="post" autocomplete="off" id="add" >
            <input type="hidden" id="action" value="addemploi">
            <div class="col-md">
                    <label class="form-label">Jour</label>
                    <div class="form-floating">
                        <select class="form-select" name="jour" id="jour" aria-label="jour">
                        <option id="jour" value=""></option>
                            <option id="jour" value="Dimanche">Dimanche</option>
                            <option id="jour" value="Lundi">Lundi</option>
                            <option id="jour" value="Mardi">Mardi</option>
                            <option id="jour" value="Mercredi">Mercredi</option>
                            <option id="jour" value="Jeudi">Jeudi</option>
                         </select>
                    </div>
                  </div>
                <br>
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
                  <br>
                  <div class="mb-3">
                            <label for="" class="form-label">Formation</label>
                            <?php  
                            include_once("function.php");
                            $sql = "SELECT nomforma FROM class";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) { ?>
                                <select class="form-select" name="formation" id="formation" aria-label="formation">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?= $row['nomforma'] ?>"><?= $row['nomforma'] ?></option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                        </div>
                  
                  <div class="mb-3">
                            <label for="nom" class="form-label">Formateur</label>
                            <?php  
                            include_once("function.php");
                            $sql = "SELECT Nom FROM formateurs";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) { ?>
                                <select class="form-select" name="Nom" id="Nom" aria-label="Nom">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?= $row['Nom'] ?>"><?= $row['Nom'] ?></option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Salle</label>
                            <?php  
                            include_once("function.php");
                            $sql = "SELECT nomsalle FROM salle";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) { ?>
                                <select class="form-select" name="salle" id="salle" aria-label="salle">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?= $row['nomsalle'] ?>"><?= $row['nomsalle'] ?></option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
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
  
    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function() {
        sidebar.classList.toggle("active");
        }
      
    </script>
   
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="process.js"></script>



</body>
</html> 




