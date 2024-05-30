<?php
$conn = mysqli_connect("localhost", "root", "", "anglais");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM exam WHERE idexam = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $exam = $result->fetch_assoc();
    $stmt->close();

    echo '<form action="update_exam.php" method="post">
            <input type="hidden" name="idexam" value="' . $exam['idexam'] . '">
            <div class="mb-3">
                <label for="nomforma" class="form-label">Nom de l\'Examen</label>
                <input type="text" class="form-control" name="nomforma" value="' . $exam['nomforma'] . '" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" name="date" value="' . $exam['date'] . '" required>
            </div>
            <div class="mb-3">
                <label for="heure" class="form-label">Heure</label>
                <input type="time" class="form-control" name="heure" value="' . $exam['heure'] . '" required>
            </div>
            <div class="mb-3">
                <label for="exsalle" class="form-label">Salle</label>
                <input type="text" class="form-control" name="exsalle" value="' . $exam['exsalle'] . '" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
          </form>';
}
?>
