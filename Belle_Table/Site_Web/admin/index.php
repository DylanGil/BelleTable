<!DOCTYPE html>
<html>

<head>
    <title>Panel Admin V.3</title>   
</head>

<style type="text/css">.dashboard {background-color: #007BFF;}</style> <!-- met la page ou on est en bleu -->

<?php $class = ".dashboard" ; ?> <!-- permet de definir sur quel page je suis est desactivé le bleu lorsque j'active le sous menu  -->

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
                <div class="row">

                  <div class="col-lg-3 col-6">
                    <div class="info-box box1" align="center">
                      <div class="text-box">
                        <h3>223 <i class="fas fa-box"></i></h3>
                        <p>Articles</p>
                      </div>
                      <div class="info-box-footer">
                        <a href="stats/utilisateur.php">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
    
                  <div class="col-lg-3 col-6" align="center">
                    <div class="info-box box2" >
                      <div class="text-box">
                        <h3>53 <i class="fas fa-box-usd"></i></h3>
                        <p>Articles vendu</p>
                      </div>
                      <div class="icon-box">
                        
                      </div>
                      <div class="info-box-footer">
                        <a href="#">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
         
                  <div class="col-lg-3 col-6" align="center">
                    <div class="info-box box3">
                      <div class="text-box">
                        <h3>25 <i class="fas fa-shopping-basket"></i></h3>
                        <p>Paniers en cours</p>
                      </div>
                      <div class="icon-box">
                        
                      </div>
                      <div class="info-box-footer">
                        <a href="#">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
       
                  <div class="col-lg-3 col-6" align="center">
                    <div class="info-box box4">
                      <div class="text-box">
                        <h3><?php $countUtilisateur = "SELECT count(prenom) FROM login"; $reqNbUtilisateur = mysqli_query($bdd,$countUtilisateur); $nbUser = mysqli_fetch_assoc($reqNbUtilisateur); echo $nbUser['count(prenom)']; ?> <i class="fas fa-users"></i></h3>
                        <p>Utilisateurs</p>
                      </div>
                      <div class="icon-box">   
                      </div>
                      <div class="info-box-footer">
                        <a href="liste-membre.php">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>  
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

              $afficherTache = "SELECT id_tdl, prenom, tache, realiser FROM login, to_do_list WHERE fk_utilisateur = id ORDER BY realiser ASC" ;
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

            <h2>ChatBox - Commentaires  </h2>
            <div class="Chat">
              <div class="chat-w-header">
                <div class="header-chat">
                  <center><h6>Chat Admin</h6></center>
                </div> 
                  <div class="chat-wi-header">
                    <?php while($fetch = mysqli_fetch_assoc($resAfficherMessage)): ?> 
                 
                      <?php  
                        if($fetch['prenom']==$_SESSION['prenom'])
                          {
                            $utilisateur = "utilisateur-e" ;
                            $expediteur = "expediteur" ;
                            $message = "message-e" ;
                          }
                        else 
                          {
                            $utilisateur = "utilisateur-d" ;
                            $expediteur = "destinataire" ;
                            $message = "message-d" ;
                          }
                      ?>
                      <div class="<?php echo $utilisateur ?>">
                          <a href="#" class="<?php echo $expediteur ?>">
                              <span><?php echo $fetch['prenom'] ?></span>
                              <br>
                              <img class="avatar" width='30' src=""/> 
                          </a>
                          <span class="<?php echo $message ?>"><?php echo $fetch['message']; ?> </span><br>
                      </div>   

                    <?php endwhile; ?>
                  </div>    
                <form method="POST" action="">
                    <div class="input-group-append">
                        <input type="texte" name="chat" class="champ form-control" >
                        <input type="submit" name="send" class="submit-chat">
                    </div>
                </form>
              </div>
            </div>

            <br><br>
            <div class="to-div-list">
              <div class="to-do-list">
                <table class="tdl" border="1">
                  <tr>
                    <th colspan="4" style="background-color: white;">
                      <center>
                        <h6>
                          <i class="far fa-play"></i> = a faire |
                          <i class="far fa-clock"></i> = en cours |
                          <i class="far fa-check"></i> = fini
                        </h6>
                      </center>
                    </th>
                  </tr>
                  <tr>
                    <th colspan="4" class="to-do-list-header">
                      <center><h6>TO-DO-LIST</h6></center>
                    </th>
                  </tr>
                  <tr align="center">
                    <th>Changer le status</th>
                    <th>crée par</th>
                    <th>Tâches</th>
                    <th>Status</th>
                  </tr>

                  <?php while($tache = mysqli_fetch_assoc($resAfficherTache)): ?> 
                    <?php $idtdl = $tache['id_tdl'];  
                          if($tache['realiser']==0){$a = "fe2d08"; } 
                          if($tache['realiser']==1){$a = "ff891d"; }
                          if($tache['realiser']==2){$a = "0ede28"; }  
                    ?>
                    <tr align="center">
                      <td style="text-align: center; ">
                        <a href="?realiser=a faire&id=<?php echo $idtdl ?>"><i class="far fa-play"></i></a>
                        <a href="?realiser=en cours&id=<?php echo $idtdl ?>"><i class="far fa-clock"></i></a>
                        <a href="?realiser=fini&id=<?php echo $idtdl ?>"><i class="far fa-check"></i></a>
                      </td>
                      <td><?php echo $tache['prenom']; ?></td>
                      <td><?php echo $tache['tache']; ?></td>
                      <td style="background-color: #<?php echo $a; ?>">
                        <?php 
                          if($tache['realiser']==0){echo "A FAIRE";} 
                          if($tache['realiser']==1){echo "EN COURS"; }
                          if($tache['realiser']==2){echo "FINI"; } 
                        ?>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </table>
                <form method="POST" action="">
                  <div class="input-group-append">
                      <input style="border-radius: inherit;" type="texte" name="tache" class="champ form-control" >
                      <input type="submit" name="send-tdl" class="submit-chat" value="rajouter">
                  </div>
                </form>
              </div>
            </div> 
            <br>
            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <?php include("css/footer.php"); ?>
    </div>
</body>

</html>