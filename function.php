<?php
$conn = mysqli_connect("localhost", "root", "", "anglais");
 
        
        if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            $sql = "DELETE FROM apprenants WHERE ApprenantID = '$id'";
             mysqli_query($conn,$sql);
           
        }
        if(isset($_GET['deleteen'])){
            $id = $_GET['deleteen'];
            $sql = "DELETE FROM formateurs WHERE FormateurID = '$id'";
             mysqli_query($conn,$sql);

        }
        if(isset($_GET['deletes'])){
            $id = $_GET['deletes'];
            $sql = "DELETE FROM salle WHERE idsalle = '$id'";
             mysqli_query($conn,$sql);
           
        }
        if(isset($_GET['deletef'])){
            $id = $_GET['deletef'];
            $sql = "DELETE FROM class WHERE idformation = '$id'";
             mysqli_query($conn,$sql);
           
        }
     if(isset($_POST["action"])){
        if($_POST["action"] == "register"  &&  $_POST["niveau"] == "Enseignant" ){
            registerensei();  
            exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "login"  &&  $_POST["role"] == "Apprenant" ){
            loginapr();  
            exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "login"  &&  $_POST["role"] == "Enseignant" ){
            loginensei();  
            exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "login"  &&  $_POST["role"] == "Directeur" ){
            loginadm();  
            exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "login"  &&  $_POST["role"] == "vide" ){
            echo "Please Fill Out The Form ";
              exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "register"  &&  $_POST["niveau"] == "vide" ){
            echo "Please Fill Out The Form ";
            exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "createap"){
            addapr();  
            exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "register"  &&  $_POST["niveau"] == "Apprenant" ){
            registerapr();  
            exit;
        }}
    if(isset($_POST["action"])){
        if($_POST["action"] == "contact"){
            contact();  
            exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "createen"){
            addensei();  
            exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "addexam"){
            addensei();  
            exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "addemploi"){
            addemploi();  
            exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "addsalle"){
            addsalle();  
            exit;
        }
    }
    if(isset($_POST["action"])){
        if($_POST["action"] == "addformation"){
            addforma();  
            exit;
        }
    }
function contact(){
    global $conn;
    $nom =$_POST["nom"];
    $email = $_POST["email"];
    $obj = $_POST["obj"];
    $msg = $_POST["msg"];
    
    if(empty($nom) || empty($email) || empty($obj) || empty($msg)){
        echo "Please Fill Out The Form ";
        exit;
    }

    $query = "INSERT INTO contact VALUES('', '$nom','$email', '$obj','$msg')";
    mysqli_query($conn, $query);

    echo"Send message Successful";
    
}
function registerapr(){
    global $conn;

    $Nom = $_POST["Nom"];
    $Prenom = $_POST["Prenom"];
    $DateNaissance = $_POST["DateNaissance"];
    $Adresse = $_POST["Adresse"];
    $Telephone = $_POST["Telephone"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $Cours = $_POST["Cours"];
    
    if(empty($Nom) || empty($Prenom) || empty($DateNaissance) || empty($Adresse) || empty($Telephone) || empty($Email) || empty($Password) || empty($Cours)){
        echo "Please Fill Out The Form ";
        exit;
    }

    $user = mysqli_query($conn,  "SELECT * FROM apprenants WHERE Email = '$Email'");
    if(mysqli_num_rows($user) > 0){
        echo "Email Already Exists !";
        exit;
    }

    $query = "INSERT INTO apprenants VALUES('', '$Nom', '$Prenom', '$DateNaissance', '$Adresse', '$Telephone', '$Email', '$Password', '$Cours','')";
    mysqli_query($conn, $query);

    echo"Registration Apprenant Successful";
}
function registerensei(){
    global $conn;

    $Nom =$_POST["Nom"];
    $Prenom = $_POST["Prenom"];
    $DateNaissance = $_POST["DateNaissance"];
    $Adresse = $_POST["Adresse"];
    $Telephone = $_POST["Telephone"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $DiplomesCertifications = $_POST["DiplomesCertifications"];
    
    if(empty($Nom) || empty($Prenom) || empty($DateNaissance) || empty($Adresse) || empty($Telephone) || empty($Email) || empty($Password) || empty($DiplomesCertifications)){
        echo "Please Fill Out The Form ";
        exit;
    }

    $user = mysqli_query($conn,  "SELECT * FROM formateurs WHERE Email = '$Email'");
    if(mysqli_num_rows($user) > 0){
        echo "Email Already Exists !";
        exit;
    }

    $query = "INSERT INTO 	formateurs VALUES('', '$Nom', '$Prenom', '$DateNaissance', '$Adresse', '$Telephone', '$Email', '$Password', '$DiplomesCertifications')";
    mysqli_query($conn, $query);

    echo"Registration Enseignant Successful";
    
}    
function loginapr(){
    global $conn;
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];


    if(empty($Email) || empty($Password)){
        echo "Please Fill Out The Form ";
        exit;
    }
    $user = mysqli_query($conn,  "SELECT * FROM apprenants WHERE Email = '$Email' AND Password = '$Password'");
    if(mysqli_num_rows($user) > 0){
       $row = mysqli_fetch_assoc($user);
        if($Password == $row["Password"]){
            echo "Apprenant Login Successful";
         }
        else{
            echo "Email or Password is Incorrect";
        }
    }
    else{
        echo "user not registered";
    }
}
function loginensei(){
    global $conn;
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    if(empty($Email) || empty($Password)){
        echo "Please Fill Out The Form ";
    }
    $user = mysqli_query($conn,  "SELECT * FROM formateurs WHERE Email = '$Email' AND Password = '$Password'");
    if(mysqli_num_rows($user) > 0){
       $row = mysqli_fetch_assoc($user);
        if($Password == $row["Password"]){
            echo "Enseignant Login Successful";
            
        }
        else{
            echo "Email or Password is Incorrect";
        }
    }
    else{
        echo "user not registered";
    }
}
function loginadm(){
    global $conn;
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    if(empty($Email) || empty($Password)){
        echo "Please Fill Out The Form ";
    }
    $user = mysqli_query($conn,  "SELECT * FROM administrateurs WHERE Email = '$Email' AND Password = '$Password'");
    if(mysqli_num_rows($user) > 0){
       $row = mysqli_fetch_assoc($user);
        if($Password == $row["Password"]){
            echo "Admin Login Successful";
        }
        else{
            echo "Email or Password is Incorrect";
        }
    }
    else{
        echo "user not registered";
    }
}
function addapr(){
    global $conn;

    $Nom = $_POST["Nom"];
    $Prenom = $_POST["Prenom"];
    $DateNaissance = $_POST["DateNaissance"];
    $Telephone = $_POST["Telephone"];
    $Email = $_POST["Email"];
    $Cours = $_POST["Cours"];
    
    if(empty($Nom) || empty($Prenom) || empty($DateNaissance) || empty($Telephone) || empty($Email) || empty($Cours)){
        echo "Please Fill Out The Form !";
        exit;
    }

    $user = mysqli_query($conn,  "SELECT * FROM apprenants WHERE Email = '$Email' AND Cours = '$Cours'");
    if(mysqli_num_rows($user) > 0){
        echo "Apprenant Already Exists !";
        exit;
    }
    $query = "INSERT INTO apprenants VALUES('', '$Nom', '$Prenom', '$DateNaissance','', '$Telephone', '$Email','', '$Cours','')";
    mysqli_query($conn, $query);

    echo"Addition Successful";
}
function addensei(){
    global $conn;

    $Nom = $_POST["Nom"];
    $Prenom = $_POST["Prenom"];
    $DateNaissance = $_POST["DateNaissance"];
    $Telephone = $_POST["Telephone"];
    $Email = $_POST["Email"];
    $DiplomesCertifications = $_POST["DiplomesCertifications"];
    
    if(empty($Nom) || empty($Prenom) || empty($DateNaissance) || empty($Telephone) || empty($Email) || empty($DiplomesCertifications)){
        echo "Please Fill Out The Form !";
        exit;
    }

    $user = mysqli_query($conn,  "SELECT * FROM formateurs WHERE Nom = '$Nom'");
    if(mysqli_num_rows($user) > 0){
        echo "Enseignant Already Exists !";
        exit;
    }
    $query = "INSERT INTO formateurs VALUES('', '$Nom', '$Prenom', '$DateNaissance','', '$Telephone', '$Email','', '$DiplomesCertifications')";
    mysqli_query($conn, $query);

    echo"Addition Successful";
}
function addemploi(){
    global $conn;
    $jour = $_POST["jour"];
    $Seance = $_POST["Seance"];
    $formation = $_POST["formation"];
    $salle = $_POST["salle"];
    $Nom = $_POST["Nom"];
    
    if(empty($jour) || empty($salle) || empty($Seance) || empty($formation) || empty($Nom)){
        echo "Please Fill Out The Form !";
        exit;
    }else{
    $query = "INSERT INTO emploi VALUES('','$jour', '$Seance', '$formation', '$salle', '$Nom')";
    mysqli_query($conn, $query);

    echo"Addition Successful";
    }
}
function addsalle(){
    global $conn;
    $nomsalle = $_POST["nomsalle"];
    $nbrplace = $_POST["nbrplace"];
    
    if( empty($nomsalle) || empty($nbrplace)){
        echo "Please Fill Out The Form !";
        exit;
    }$user = mysqli_query($conn,  "SELECT * FROM salle WHERE nomsalle = '$nomsalle'");
    if(mysqli_num_rows($user) > 0){
        echo "Salle Already Exists !";
        exit;
    }
    else{
    $query = "INSERT INTO salle VALUES('', '$nomsalle', '$nbrplace')";
    mysqli_query($conn, $query);

    echo"Addition Successful";
    }
}
function addforma(){
    global $conn;
    $nomforma = $_POST["nomforma"];
    $nbrheure = $_POST["nbrheure"];
    $prix = $_POST["prix"];
    if( empty($nomforma) || empty($nbrheure)|| empty($prix)){
        echo "Please Fill Out The Form !";
        exit;
    }$user = mysqli_query($conn,  "SELECT * FROM class WHERE nomforma = '$nomforma'");
    if(mysqli_num_rows($user) > 0){
        echo "Salle Already Exists !";
        exit;
    }
    else{
    $query = "INSERT INTO class VALUES('', '$nomforma', '$nbrheure','$prix')";
    mysqli_query($conn, $query);
    echo"Addition Successful";
    }
}
function addexam(){
    global $conn;
   // Récupérer les données du formulaire
    $nomforma = $_POST['nomforma'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $exsalle = $_POST['exsalle'];

    if(empty($nomforma) || empty($date) || empty($heure) || empty($salle)){
        echo "Please Fill Out The Form !";
        exit;
    }

    $user = mysqli_query($conn,  "SELECT * FROM exam WHERE nomforma = '$nomforma' AND date = '$date' AND heure = '$heure' AND exsalle = '$exsalle' AND ");
    if(mysqli_num_rows($user) > 0){
        echo "Enseignant Already Exists !";
        exit;
    }
    $query = "INSERT INTO exam VALUES('', '$nomforma', '$date', '$heure', '$exsalle')";
    mysqli_query($conn, $query);

    echo"Addition Successful";
}
   

?>

