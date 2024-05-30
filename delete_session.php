<?php
include "function.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM emploi WHERE idemploi ='$id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Séance supprimée avec succès";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    header("Location: emploiens.php"); // Redirige vers la page de l'emploi du temps
    exit();
}
?>
