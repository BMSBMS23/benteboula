

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification </title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
        <img src="logo.jpg" alt="" style="height: 60px; width: 70px; border-radius: 12px;"> 
        <h1>Log In</h1>
        <form action="" autocomplete="off" method="post">
            <input type="hidden" id="action" value="login">
            <label for="username">E-mail:</label>
            <input type="Email" id="Email" placeholder="Enter your E-mail" >
            <label for="password">Password</label>
            <input type="password" id="Password"  placeholder="Enter your Password">
            <div class="champ">
                <label for="=">User Type:</label>
                <select id="role" style="border-radius: 10px;">
                    <option value="vide"></option>
                    <option value="Apprenant">Apprenant</option>
                    <option value="Enseignant">Enseignant</option>
                    <option value="Directeur">Administrateur</option>
                </select>
            </div>
            
            <button type="button" onclick="submitData();">Se connecter</button> <br><br>
            <a href="register.php" id="signin">Créer un compte</a>
            <?php require 'script.php';?>
        </form>
    </div>
</body>
</html>

