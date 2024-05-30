<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>formateur</title>
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card {
            margin-bottom: 20px;
        }
        .home_content {
            margin-left: 100px;
            padding: 20px;
            width: 80%;
        }
        .sidebar.active ~ .home_content {
            margin-left: 70px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <img src="logo.jpg" alt="Logo" style="height: 60px; width: 70px; border-radius: 12px;">
            <div class="logo_name">Elite School <br>Of English</div>
        </div>
        <i class='bx bx-menu' id="btn"></i>
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
        <li class="active">
            <a class="active" href="#">
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
        <li>
            <a href="exam.php">
                <i class='bx bxs-graduation'></i>
                <span class="links_name">Examen</span>
            </a>
            <span class="tooltips">Examen</span>
        </li>
    </ul>
    <div class="profile_content">
        <div class="profile">
            <a href="logout.php"><i class='bx bx-log-out' id="log_out" style="color: #fff;"></i></a>
            <div class="profile_details">
                <i class='bx bxs-user-circle'></i>
                <div class="name_job">
                        <?php include_once("function.php");
                        $sql = "SELECT Nom FROM formateurs";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            if ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="name"><?=$row['Nom']?></div>
                        <?php } } ?>
                    
                    <div class="job">Formateur</div></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="home_content">
    <section class="container-fluid">
        <h1 class="text-center text-primary mb-4">Gestion des Absences</h1>
        <div class="text-end mb-4">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAbsenceModal">Ajouter une absence</button>
        </div>
        <div class="row">
            <?php
            include_once("function.php");
            $sql = "SELECT * FROM absences";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'.htmlspecialchars($row['Nom']).' '.htmlspecialchars($row['Prenom']).'</h5>';
                    echo '<p class="card-text"><strong>ID:</strong> '.htmlspecialchars($row['ApprenantID']).'</p>';
                    echo '<p class="card-text"><strong>Date:</strong> '.htmlspecialchars($row['DateAbsence']).'</p>';
                    echo '<p class="card-text"><strong>Raison:</strong> '.htmlspecialchars($row['Raison']).'</p>';
                    echo '<a href="editAbsence.php?id='.htmlspecialchars($row['ID']).'" class="btn btn-primary">Modifier</a> ';
                    echo '<a href="deleteAbsence.php?id='.htmlspecialchars($row['ID']).'" class="btn btn-danger">Supprimer</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </section>
</div>

<!-- Modal for adding absence -->
<div class="modal fade" id="addAbsenceModal" tabindex="-1" aria-labelledby="addAbsenceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAbsenceModalLabel">Ajouter une absence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="addAbsence.php" method="post">
                    <div class="mb-3">
                        <label for="ApprenantID" class="form-label">ID Apprenant</label>
                        <?php
                        include_once("function.php");
                        $sql = "SELECT ApprenantID FROM apprenants";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) { ?>
                            <select class="form-select" name="ApprenantID" id="ApprenantID" aria-label="ApprenantID" required>
                                <option value=""></option>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?= htmlspecialchars($row['ApprenantID']) ?>"><?= htmlspecialchars($row['ApprenantID']) ?></option>
                                <?php } ?>
                            </select>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label for="Nom" class="form-label">Nom</label>
                        <?php
                        $sql = "SELECT Nom FROM apprenants";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) { ?>
                            <select class="form-select" name="Nom" id="Nom" aria-label="Nom" required>
                                <option value=""></option>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?= htmlspecialchars($row['Nom']) ?>"><?= htmlspecialchars($row['Nom']) ?></option>
                                <?php } ?>
                            </select>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label for="Prenom" class="form-label">Prénom</label>
                        <?php
                        $sql = "SELECT Prenom FROM apprenants";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) { ?>
                            <select class="form-select" name="Prenom" id="Prenom" aria-label="Prenom" required>
                                <option value=""></option>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?= htmlspecialchars($row['Prenom']) ?>"><?= htmlspecialchars($row['Prenom']) ?></option>
                                <?php } ?>
                            </select>
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <label for="DateAbsence" class="form-label">Date d'absence</label>
                        <input type="date" class="form-control" id="DateAbsence" name="DateAbsence" required>
                    </div>
                    <div class="mb-3">
                        <label for="Raison" class="form-label">Raison</label>
                        <input type="text" class="form-control" id="Raison" name="Raison" required>
                    </div>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
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