<?php
include_once "function.php"; // inclut le fichier contenant la connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nomforma = $_POST['nomforma'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $salle = $_POST['salle'];

    if(empty($nomforma) || empty($date) || empty($heure) || empty($salle)){
        echo "Please Fill Out The Form !";
        exit;
    }

    $user = mysqli_query($conn,  "SELECT * FROM exam WHERE idexam = ?");
    if(mysqli_num_rows($user) > 0){
        echo "Enseignant Already Exists !";
        exit;
    }
    $query = "INSERT INTO exam VALUES('', '$nomforma', '$date', '$heure', '$salle')";
    mysqli_query($conn, $query);

    echo"Addition Successful";
}
   

?>
