<?php include_once("function.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-straight/css/uicons-solid-straight.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.3.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css"> 
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>espace apprenant</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <img src="logo.jpg" alt="" style="height: 60px; width: 70px; border-radius: 12px;">
                <div class="logo_name">Elite School <br>Of English</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="accap.php">
                    <i class='bx bxs-home-alt-2'></i>
                    <span class="links_name">Accueil</span>
                </a>
                <span class="tooltips">Accueil</span>
            </li>
            <li class="active">
                <a class="active" href="">
                    <i class="fi fi-sr-graduation-cap"></i>
                    <span class="links_name">Formation</span>
                </a>
                <span class="tooltips">Formation</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <a href="logout.php">
                    <i class='bx bx-log-out' id="log_out" style="color : #fff;"></i>
                </a>
                <div class="profile_details">
                    <i class='bx bxs-user-circle'></i>
                    <div class="name_job">
                        <div class="name">
                            <?php
                            $sql = "SELECT Nom FROM apprenants";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                if ($row = mysqli_fetch_assoc($result)) {
                                    echo '<div class="name">' . $row['Nom'] . '</div>';
                                }
                            }
                            ?>
                        </div>
                        <div class="job">Apprenant</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home_content" style="width:75%;margin-left:110px; margin-top:50px">
        <div class="card">
            <div class="card-header">
                Liste des Classes
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom Formation</th>
                            <th>Nombre d'Heures</th>
                            <th>Prix</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM class");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['idformation']}</td>";
                            echo "<td>{$row['nomforma']}</td>";
                            echo "<td>{$row['nbrheure']}</td>";
                            echo "<td>{$row['prix']}</td>";
                            echo "<td>
                            <button type='button' class='btn btn-success voir-btn' data-idformation='{$row['idformation']}' data-nomforma='{$row['nomforma']}' data-nbrheure='{$row['nbrheure']}' data-prix='{$row['prix']}' data-bs-toggle='modal' data-bs-target='#editModal'>Voir</button>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Détails de la Classe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Les informations seront chargées ici par JavaScript -->
                </div>
            </div>
        </div>
    </div>
    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        }
    </script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.5/datatables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            let voirButtons = document.querySelectorAll('.voir-btn');
            voirButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    let idformation = button.getAttribute('data-idformation');
                    let nomforma = button.getAttribute('data-nomforma');
                    let nbrheure = button.getAttribute('data-nbrheure');
                    let prix = button.getAttribute('data-prix');

                    let modalBody = document.querySelector('#editModal .modal-body');
                    modalBody.innerHTML = `
                        <p><strong>ID Formation:</strong> ${idformation}</p>
                        <p><strong>Nom Formation:</strong> ${nomforma}</p>
                        <p><strong>Nombre d'Heures:</strong> ${nbrheure}</p>
                        <p><strong>Prix:</strong> ${prix}</p>
                    `;
                });
            });
        });
    </script>
</body>
</html>
