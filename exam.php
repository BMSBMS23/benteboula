<?php
$conn = mysqli_connect("localhost", "root", "", "anglais");

if (isset($_GET['deletex'])) {
    $id = $_GET['deletex'];
    $stmt = $conn->prepare("DELETE FROM exam WHERE idexam = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    header("Location: exam.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addExam'])) {
        $nomforma = $_POST['nomforma'];
        $date = $_POST['date'];
        $heure = $_POST['heure'];
        $exsalle = $_POST['exsalle'];

        $stmt = $conn->prepare("INSERT INTO exam (nomforma, date, heure, exsalle) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nomforma, $date, $heure, $exsalle);
        $stmt->execute();
        $stmt->close();

        header("Location: exam.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formateur</title>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css"> 
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        
        <li>
            <a href="accens.php">
                <i class='bx bxs-home-alt-2'></i>
                <span class="links_name">Accueil</span>
            </a>
            <span class="tooltips">Accueil</span>

        </li>
        <li>
            <a href="note.php">
                    <i class='bx bxs-book'></i>
                    <span class="links_name">Note</span>
            </a>
            <span class="tooltips">Note</span>

        </li>
        <li>
            <a href="Absence.php">
            <i class='bx bxs-calendar'></i>
                <span class="links_name">Absence</span>
            </a>
            <span class="tooltips">Absence</span>

        </li>
        <li>
            <a href="emploiens.php">
            <i class='bx bxs-time'></i>
                <span class="links_name">Emplois du temps</span>
            </a>
            <span class="tooltips">Emplois</span>

        </li>
        <li class="active">
            <a class="active" href="#">
            <i class='bx bxs-graduation'></i>
                <span class="links_name">Examen</span>
            </a>
            <span class="tooltips">Examen</span>
        </li>



    </ul>
    <div class="profile_content">
        <div class="profile">
       <a href="logout.php"> <i class='bx bx-log-out' id="log_out" style="color : #fff;"></i></a>
            <div class="profile_details">
                <i class='bx bxs-user-circle' ></i>
                <div class="name_job">
                    <div class="name">
                        <?php include_once("function.php");
                        $sql = "SELECT Nom FROM formateurs";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            if ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="name"><?= $row['Nom'] ?></div>
                        <?php } } ?>
                    </div>
                    <div class="job">Formateur</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="home_content" style="width:75%;margin-left:110px; margin-top:50px">
    <div class="card">
        <div class="card-header">
            Liste des Examens
        </div>
        <div class="card-body">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addExamModal">Ajouter un examen</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Examen</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Salle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM exam");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['idexam']}</td>";
                        echo "<td>{$row['nomforma']}</td>";
                        echo "<td>{$row['date']}</td>";
                        echo "<td>{$row['heure']}</td>";
                        echo "<td>{$row['exsalle']}</td>";
                        echo "<td>
                                <button class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#editModal' data-id='{$row['idexam']}'>Modifier</button>
                                <button class='btn btn-danger btn-sm' onclick='confirmDelete({$row['idexam']})'>Supprimer</button>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Exam Modal -->
<div class="modal fade" id="addExamModal" tabindex="-1" aria-labelledby="addExamModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addExamModalLabel">Ajouter Examen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="exam.php" method="post">
                    <input type="hidden" name="addExam" value="1">
                    <div class="mb-3">
                        <label for="nomforma" class="form-label">Examen</label>
                        <select class="form-select" name="nomforma" id="nomforma" required>
                            <option value=""></option>
                            <?php
                            $result = mysqli_query($conn, "SELECT nomforma FROM class");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['nomforma']}'>{$row['nomforma']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" id="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="heure" class="form-label">Heure</label>
                        <input type="time" class="form-control" name="heure" id="heure" required>
                    </div>
                    <div class="mb-3">
                        <label for="exsalle" class="form-label">Salle</label>
                        <select class="form-select" name="exsalle" id="exsalle" required>
                            <option value=""></option>
                            <?php
                            $result = mysqli_query($conn, "SELECT nomsalle FROM salle");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['nomsalle']}'>{$row['nomsalle']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifier l'Examen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form content will be dynamically loaded using JavaScript -->
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function() {
        sidebar.classList.toggle("active");
        }
    </script>
<script>
    function confirmDelete(id) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet examen?")) {
            window.location.href = "exam.php?deletex=" + id;
        }
    }

    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var examId = button.data('id');

        $.ajax({
            url: 'get_exam.php',
            type: 'GET',
            data: {id: examId},
            success: function(data) {
                $('#editModal .modal-body').html(data);
            }
        });
    });
</script>
</body>
</html>
