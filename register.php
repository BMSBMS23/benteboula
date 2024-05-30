<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
<div id="pre-inscription-form">
        <img src="logo.jpg" alt="" style="height: 60px; width: 70px; border-radius: 12px;"> 
        <h2>Registration</h2>
        <form action="" autocomplete="off" method="post">
            <input type="hidden" id="action" value="register">

            <div class="champ">
                <label for="">Nom:</label>
                <input type="text" id="Nom" value="">
            </div>
            <div class="champ">
                <label for="">Prénom:</label>
                <input type="text" id="Prenom" value="">
            </div>

            <div class="champ">
                <label for="">Date de naissance:</label>
                <input type="date" id="DateNaissance" value="">
            </div>
            <div class="champ">
                <label for="">E-mail:</label> 
                <input type="email" id="Email" name="Email" value="<?php echo isset($_POST['Email']) ? htmlspecialchars($_POST['Email']) : ''; ?>">
            </div>
           
            <div class="champ">
                <label for="">Password:</label> 
                <input type="password" id="Password" value="">
            </div>

            <div class="champ">
                <label for="">Téléphone:</label>
                <input type="tel" id="Telephone" value="">
            </div>
            <div class="champ">
                <label for="">Adresse:</label>
                <textarea id="Adresse"rows="2" value=""></textarea>
            </div>

            <div class="champ">
                <label for="">User Type:</label>
                <select id="niveau"value="">
                    <option id="niveau" value="vide"></option>
                    <option  value="Apprenant">Apprenant</option>
                    <option  value="Enseignant">Enseignant</option>
                </select>
            </div>
            <div id="cours" style="display:none;">
            <div class="champ">
                <label for="matieres">Choisir les courses:</label><br>
                <div class="matieres">
                <select class="form-select" id="Cours" value="" style="border-radius: 10px;">
                            <option id="Cours" value="vide"></option>
                            <option id="Cours" value="General English Course">General English Course</option>
                            <option id="Cours" value="acadimic year diploma">acadimic year diploma</option>
                            <option id="Cours" value="Ielts preparation">Ielts preparation</option>
                            <option id="Cours" value="Speaking club">Speaking club</option>
                            <option id="Cours" value="Business english">Business english</option>
                            <option id="Cours" value="English for kids">English for kids</option>  
                </select>
                </div>
            </div>
            </div>

              <div class="champ" id="Diplome" style="display:none;">
                <label for="">Diplome:</label> 
                <input type="text" id="DiplomesCertifications" value="">
            </div>


            <button type="button" onclick="submitData();">submit</button> <br> <br>
            <a href="login.php" id="login">j'ai déja un compte</a>
            <?php require 'script.php'; ?>
        </form>
    </div>
    <script>
        let select = document.getElementById('niveau');
        let Diplome = document.getElementById('Diplome');
        console.log(Diplome);
        let cours = document.getElementById('cours');
        console.log(cours);
    
    select.addEventListener('change',function() {
  let selectValue = this.value;
  if (selectValue == 'Apprenant') {

    cours.style.display = 'block';
   
    Diplome.style.display = 'none';
  }
   else if (selectValue == 'Enseignant') {

    Diplome.style.display = 'block';
    cours.style.display = 'none';
  }
  if (selectValue == 'vide') {
    Diplome.style.display = 'none';
    cours.style.display = 'none';

}
});
</script>
</body>
</html>
