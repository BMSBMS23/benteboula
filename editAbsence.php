<?php
include_once("function.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM absences WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $absence = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "ID manquant!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ApprenantID = $_POST['ApprenantID'];
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $DateAbsence = $_POST['DateAbsence'];
    $Raison = $_POST['Raison'];

    $sql = "UPDATE absences SET ApprenantID = ?, Nom = ?, Prenom = ?, DateAbsence = ?, Raison = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssi", $ApprenantID, $Nom, $Prenom, $DateAbsence, $Raison, $id);

    if ($stmt->execute()) {
        echo "Absence mise à jour avec succès!";
        header("location:Absence.php");
        
    } else {
        echo "Erreur: " . $conn->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier Absence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<div class="container">
    <h1>Modifier Absence</h1>
    <form method="post">
        <div class="mb-3">
            <label for="ApprenantID" class="form-label">ID Apprenant</label>
            <input type="text" class="form-control" id="ApprenantID" name="ApprenantID" value="<?= htmlspecialchars($absence['ApprenantID']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="Nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="Nom" name="Nom" value="<?= htmlspecialchars($absence['Nom']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="Prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="Prenom" name="Prenom" value="<?= htmlspecialchars($absence['Prenom']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="DateAbsence" class="form-label">Date d'absence</label>
            <input type="date" class="form-control" id="DateAbsence" name="DateAbsence" value="<?= htmlspecialchars($absence['DateAbsence']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="Raison" class="form-label">Raison</label>
            <input type="text" class="form-control" id="Raison" name="Raison" value="<?= htmlspecialchars($absence['Raison']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
</body>
</html>
