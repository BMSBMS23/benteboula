<?php
include_once "function.php"; // inclut le fichier contenant la connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $ApprenantID = $_POST['ApprenantID'];
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $DateAbsence = $_POST['DateAbsence'];
    $Raison = $_POST['Raison'];

    // Vérifiez si l'ApprenantID existe dans la table apprenants
    $checkSql = "SELECT * FROM apprenants WHERE ApprenantID = ? ";
    $checkStmt = mysqli_prepare($conn, $checkSql);
    mysqli_stmt_bind_param($checkStmt, 'i', $ApprenantID);
    mysqli_stmt_execute($checkStmt);
    $checkResult = mysqli_stmt_get_result($checkStmt);

    if (mysqli_num_rows($checkResult) > 0) {
        // Préparer et exécuter la requête d'insertion
        $sql = "INSERT INTO absences (ApprenantID, Nom, Prenom, DateAbsence, Raison) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'issss', $ApprenantID, $Nom, $Prenom, $DateAbsence, $Raison);

        if (mysqli_stmt_execute($stmt)) {
            echo "Nouvelle absence ajoutée avec succès.";
        } else {
            echo "Erreur: " . mysqli_error($conn);
        }

        // Rediriger vers la page des absences après ajout
        header("Location: Absence.php");
        exit();
    } else {
        echo "Erreur: ApprenantID n'existe pas dans la table apprenants.";
    }
}
?>
