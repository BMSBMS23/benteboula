<?php
include "function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $formation = $_POST['formation'];
    $nom = $_POST['Nom'];
    $salle = $_POST['salle'];

    $updates = [];
    if (!empty($formation)) {
        $updates[] = "formation='$formation'";
    }
    if (!empty($nom)) {
        $updates[] = "Nom='$nom'";
    }
    if (!empty($salle)) {
        $updates[] = "salle='$salle'";
    }

    if (!empty($updates)) {
        $sql = "UPDATE emploi SET " . implode(", ", $updates) . " WHERE idemploi='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Séance mise à jour avec succès";
        } else {
            echo "Erreur : " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    header("Location: emploiens.php"); // Redirige vers la page de l'emploi du temps
    exit();
}
?>
