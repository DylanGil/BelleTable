<!DOCTYPE html>
<html>

<head>
    <title>Panel Admin V.3</title>   
</head>
 <!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">

<style type="text/css">.liste-membre {background-color: #fff; color: #343A40;}</style> <!-- met la page ou on est en bleu -->

<body>
    <?php include("css/menu.php"); ?>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-dark">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                </div>
            </nav>

            <section>
              <h2>Statistique</h2>
              <center>    
                <div class="col-lg-3 col-6" align="center">
                  <div class="info-box box4">
                    <div class="text-box">
                      <h3>25 <i class="fas fa-users"></i></h3>
                      <p>Utilisateurs</p>
                    </div>
                    <div class="info-box-footer">
                      <a href="stats/commentaire.php">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
              </center>   
            </section>
            <br>
            <?php 
              @$email = $_SESSION['email'];
              @$chat = $_POST['chat'];
              @$tache = $_POST['tache'];

              if(isset($_POST['send'])) 
                {
                  $requete = "INSERT INTO message(fk_utilisateur, message) VALUES ( (SELECT id FROM login WHERE email = '$email'), '$chat')";
                  mysqli_query($bdd, $requete);
                } 

              $afficherMessage = "SELECT id_message, prenom, message FROM login, message WHERE fk_utilisateur = id ORDER BY id_message ASC" ;
              $resAfficherMessage = mysqli_query($bdd, $afficherMessage);

              #######################TO DO LIST################################################

              if(isset($_POST['send-tdl'])) 
                {
                  $requete = "INSERT INTO to_do_list(fk_utilisateur, tache, realiser) VALUES ( (SELECT id FROM login WHERE email = '$email'), '$tache', 0)";
                  mysqli_query($bdd, $requete);
                } 
              $afficherTache = "SELECT id_tdl, prenom, tache, realiser FROM login, to_do_list WHERE fk_utilisateur = id ORDER BY id_tdl ASC" ;
              $resAfficherTache = mysqli_query($bdd, $afficherTache);
              if(isset($_GET['realiser']))
              {
                $id = $_GET['id'];
                $url = "/cerfal/1erPPE/BelleTable/Belle_Table/Site_Web/admin/index.php";
                if($_GET['realiser']=="a faire")
                {
                  $modifStatus = "UPDATE to_do_list SET realiser = 0 WHERE id_tdl = $id ";
                  mysqli_query($bdd, $modifStatus);
                  ?> 
                    <script language="Javascript">
                      document.location.replace("<?php echo $url ?>"); 
                    </script> 
                  <?php
                }
                if($_GET['realiser']=="en cours")
                {
                  $modifStatus = "UPDATE to_do_list SET realiser = 1 WHERE id_tdl = $id ";
                  mysqli_query($bdd, $modifStatus);
                  ?> 
                    <script language="Javascript">
                      document.location.replace("<?php echo $url ?>"); 
                    </script> 
                  <?php
                }
                if($_GET['realiser']=="fini")
                {
                  $modifStatus = "UPDATE to_do_list SET realiser = 2 WHERE id_tdl = $id ";
                  mysqli_query($bdd, $modifStatus);
                  ?> 
                    <script language="Javascript">
                      document.location.replace("<?php echo $url ?>"); 
                    </script> 
                  <?php
                }
              }
            ?>

            <h2>Liste des membres inscrits </h2>
            
            <br>
            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <?php include("css/footer.php"); ?>
    </div>
</body>

</html>