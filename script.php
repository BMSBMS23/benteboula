<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
    function submitData(){
        $(document).ready(function(){
            var data = {
                Nom: $('#Nom').val(),
                jour: $('#jour').val(),
                Seance: $('#Seance').val(),
                formation: $('#formation').val(),
                salle: $('#salle').val(),
                idemploi: $('#idemploi').val(),
                Prenom: $('#Prenom').val(),
                DateNaissance: $('#DateNaissance').val(),
                Adresse: $('#Adresse').val(),
                Telephone: $('#Telephone').val(),
                Email: $('#Email').val(),
                Password: $('#Password').val(),
                Cours: $('#Cours').val(),
                action: $('#action').val(),
                niveau: $('#niveau').val(),
                role: $('#role').val(),
                id: $('#id').val(),
                DiplomesCertifications: $('#DiplomesCertifications').val(),
                ApprenantID: $('#ApprenantID').val(),
                AdminID : $('#AdminID').val(),
                FormateurID: $('#FormateurID').val(),
                idsalle: $('#idsalle').val(),
                nomsalle: $('#nomsalle').val(),
                nbrplace: $('#nbrplace').val(),
                idformation: $('#idformation').val(),
                nomforma: $('#nomforma').val(),
                nbrheure: $('#nbrheure').val(),
                prix: $('#prix').val(),
                note: $('#note').val(),
                nomforma: $('#nomforma').val(),
                date: $('#date').val(),
                heure: $('#heure').val(),
                nom: $('#nom').val(),
                email: $('#email').val(),
                obj: $('#obj').val(),
                exsalle: $('#exsalle').val(),
                msg: $('#msg').val(),
                idcontact: $('#idcontact').val(),

            };
            $.ajax({
                url: 'function.php',
                type: 'post',
                data: data,
                success: function(response){
                    

                     if(response == "Please Fill Out The Form !"){
                        Swal.fire({
                        icon: "warning",
                        title: "Please Fill Out The Form ",
                        });
                        
                    }
                    if(response == "Salle Already Exists !"){
                        Swal.fire({
                        icon: "warning",
                        title: "Salle Already Exists ! ",
                        });
                        
                    }
                    else if(response == "Admin Login Successful"){
                        alert(response);
                        window.location.href = 'accadm.php';
                    }
                    else if(response == "Please Fill Out The Form "){
                        alert(response);
                    }
                    else if(response == "Email Already Exists !"){
                        alert(response);
                    }
                   
                    else if(response == "Email or Password is Incorrect"){
                        alert(response);
                    }
                    else if(response == "user not registered"){
                        alert(response);
                    }
                    else if(response == "Apprenant Login Successful"){
                        alert(response);
                        window.location.href = 'accap.php';
                    }
                    else if(response == "Registration Successful"){
                        alert(response);
                        window.location.href = 'accadm.php';
                    }
                    else if(response == "Send message Successful"){
                        alert(response);
                        window.location.href = 'contact.php';
                    }
                        else if(response == "Registration Enseignant Successful"){
                        alert(response);
                        window.location.href = 'accens.php';
                        }
                        else if(response == "Registration Apprenant Successful"){
                        alert(response);
                        window.location.href = 'accap.php';
                        }
                        else if(response == "Register Successful"){
                        alert(response);
                        window.location.href = 'accueil.php';
                        }
                        else if(response == "Supprimer success"){
                        alert(response);
                        window.location.href = 'apradm.php';
                        }
                    else if(response == "Enseignant Login Successful"){
                        alert(response);
                        window.location.href = 'accens.php';
                    }
                   else if(response == "Addition Successful")
                    { $('#createModal').modal('hide');
                       Swal.fire({
                        icon: "success",
                        title: "add success",
                        });
                        add[0].reset();
                        exit;
                   }
                   else if(response == "Modification success"){
                        window.location.href = 'apradm.php';
                        exit();
                    }
                   
                }
            });
        });
    }

</script>
