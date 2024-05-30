<?php
$conn = mysqli_connect("localhost", "root", "", "anglais");

// Initialisation des variables
$Nom = "";
$Prenom = "";
$DateNaissance = "";
$Telephone = "";
$Email = "";
$Cours = "";
$msg = "";
// Vérifiez si l'ID est défini dans les paramètres GET
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $select = mysqli_query($conn, "SELECT * FROM apprenants WHERE ApprenantID = '$id'");
    $data = mysqli_fetch_assoc($select);
    $Nom = $data["Nom"];
    $Prenom = $data["Prenom"];
    $DateNaissance = $data["DateNaissance"];
    $Telephone = $data["Telephone"];
    $Email = $data["Email"];
    $Cours = $data["Cours"];
}

// Vérifiez si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérez les données du formulaire
    $Nom = mysqli_real_escape_string($conn, $_POST['Nom']);
    $Prenom = mysqli_real_escape_string($conn, $_POST['Prenom']);
    $DateNaissance = mysqli_real_escape_string($conn, $_POST['DateNaissance']);
    $Telephone = mysqli_real_escape_string($conn, $_POST['Telephone']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Cours = mysqli_real_escape_string($conn, $_POST['Cours']);
    $user = mysqli_query($conn,  "SELECT * FROM apprenants WHERE Nom = '$Nom'  AND Cours = '$Cours'");
        if(mysqli_num_rows($user) > 0){
            $msg = "Apprenant Already Exists !";
        }else
    // Mettez à jour les données de l'apprenant dans la base de données
    if (isset($_GET['edit'])) {
        $update = mysqli_query($conn, "UPDATE apprenants SET Nom='$Nom', Prenom='$Prenom', DateNaissance='$DateNaissance', Telephone='$Telephone', Email='$Email', Cours='$Cours' WHERE ApprenantID = '$id'");
        if ($update) {
            header("location:apradm.php");
            die();
        }
    } else {
        $insert = mysqli_query($conn, "INSERT INTO apprenants (Nom, Prenom, DateNaissance, Telephone, Email, Cours) VALUES ('$Nom', '$Prenom', '$DateNaissance', '$Telephone', '$Email', '$Cours')");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>espace admin</title>
    <style>
    .error-message {
        width: 60%;
            color: #d9534f; 
            font-size: 14px; 
            font-weight: bold; 
            margin-top: 5px; 
            display: block; 
            background-color: transparent; 
            padding: 10px; 
            border: none; 
            border-radius: 4px; 
        }
        </style>
</head>
<body>

<div class="home_content" style="background:#fff;display:flexbox">
    <section class="container py-5">
        <div class="row">
            <div class="col-lg-8 col-sm mb-4" style="margin-left:10%;">
                <h1 class="fs-2 text-center lead text-primary" style="font-family:Verdana, Geneva, Tahoma, sans-serif">Modifier Apprenant</h1>
            </div>
        </div>

        <?php
        if (isset($data)) {
        ?>
        <div class="modal-body" style="margin-left:20%;">
            <form action="" method="post" autocomplete="off" id="add">
                <div class="mb-3" style="width:60%;">
                    <label for="Nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="Nom" value="<?php echo htmlspecialchars($Nom); ?>">
                </div>
                <div class="mb-3" style="width:60%;">
                    <label for="Prenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control" name="Prenom" value="<?php echo htmlspecialchars($Prenom); ?>">
                </div>
                <div class="mb-3" style="width:60%;">
                    <label for="DateNaissance" class="form-label">Date Naissance</label>
                    <input type="date" class="form-control" name="DateNaissance" value="<?php echo htmlspecialchars($DateNaissance); ?>">
                </div>
                <div class="mb-3" style="width:60%;">
                    <label for="Telephone" class="form-label">Telephone</label>
                    <input type="tel" class="form-control" name="Telephone" value="<?php echo htmlspecialchars($Telephone); ?>">
                </div>
                <div class="mb-3" style="width:60%;">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="Email" value="<?php echo htmlspecialchars($Email); ?>">
                </div>

                <div class="col-md" style="width:60%;">
                    <label for="Cours" class="form-label">Formation</label>
                    <div class="form-floating">
                        <?php  
                            include_once("function.php");
                            $sql = "SELECT nomforma FROM class";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) { ?>
                                <select class="form-select" name="Cours" id="Cours" aria-label="Cours">
                                <option value="<?php echo htmlspecialchars($Cours); ?>"><?php echo htmlspecialchars($Cours); ?></option>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?= $row['nomforma'] ?>"><?= $row['nomforma'] ?></option>
                                    <?php } ?>
                                </select>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="" style="margin-left: 20%; margin-top: 2%;">
                    <a href="apradm.php"><button type="button" class="btn btn-secondary">Annuler</button></a>
                    <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
                    
                </div>
                <span class="error-message"> <?php echo $msg; ?></span>
            </form>
        </div>
        <?php
        }
        ?>
    </section>
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
