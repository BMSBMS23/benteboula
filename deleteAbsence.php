<?php
include_once("function.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM absences WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Absence supprimée avec succès!";
    } else {
        echo "Erreur: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "ID manquant!";
}
header("Location:Absence.php"); // Redirige vers la page de gestion des absences
exit;
?>
