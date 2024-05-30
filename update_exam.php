<?php
$conn = mysqli_connect("localhost", "root", "", "anglais");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['idexam'];
    $nomforma = $_POST['nomforma'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $exsalle = $_POST['exsalle'];

    $stmt = $conn->prepare("UPDATE exam SET nomforma = ?, date = ?, heure = ?, exsalle = ? WHERE idexam = ?");
    $stmt->bind_param("ssssi", $nomforma, $date, $heure, $exsalle, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: exam.php");
    exit();
}
?>
