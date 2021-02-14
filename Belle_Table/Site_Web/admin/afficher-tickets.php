<?php if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])):  ?>
  <!DOCTYPE html>
  <html>

  <head>
      <title>Panel Admin V.3</title>   

      <style type="text/css">.contact {background-color: #007BFF;} </style> <!-- met la page ou on est en bleu -->

      <?php
        
        $class = ".contact" ; 
        
        require_once("include/en-tete.php");
        

        $id = str_replace("'","''",$_GET['id']);
        $requete = "SELECT * FROM contact WHERE id = '{$id}'" ;
        $query = mysqli_query($bdd, $requete);

        $recupReponse = "SELECT * FROM contact INNER JOIN reponse_contact ON reponse_contact.fk_contact = contact.id and fk_contact = $id" ;
        $recupReponse = mysqli_query($bdd, $recupReponse);

        if(mysqli_num_rows($query) > 0)
        { 
          $ligne = mysqli_fetch_assoc($query);
          $date = $ligne['date_creation']; 
          setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
          $datefr = strftime('%d-%m-%Y à %H:%M:%S', strtotime($date)); 
          $verif = true;
        }

        if(isset($_POST['submitRep']) && !empty($_POST['message']))
        {
          $nom = $_SESSION['nom'];
          $prenom = $_SESSION['prenom'];
          $email = $ligne['email'];
          $sujet = $ligne['sujet'];
          $message = str_replace("'","''",$_POST['message']);

          $newReponse = "INSERT INTO reponse_contact(fk_contact, nom, prenom, message, date_rep) VALUES ($id, '$nom', '$prenom', '$message', now())" ;
          $queryRep = mysqli_query($bdd, $newReponse);
          $sendRep = true;
          
          if($ligne['etat']=="Nouveau")
          {
            $newEtat = "UPDATE contact SET etat = 'Repondu' WHERE id = $id";
            $newEtat = mysqli_query($bdd, $newEtat);
          }

          $headers = "From: service@belletable.eu \r\n";
          $headers .= "Reply-To: service@belletable.eu \n";
          $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
          mail($email, $sujet, $message, $headers);
        }
      ?>

  </head>

  <body>

    <?php include("include/menu.php"); ?>

    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
              <button type="button" id="sidebarCollapse" class="btn btn-outline-dark">
                  <i class="fas fa-align-left"></i>
                  <span></span>
              </button>
          </div>
      </nav>

      <?php if(isset($verif)): ?>
        <div class="card">
          <div class="card-header">
            <?php echo @$ligne['sujet']; ?> 
            <?php if(@$ligne['etat']=="Nouveau"): ?>
              <span class="badge badge-success"><?php echo @$ligne['etat']; ?></span>
            <?php endif; ?>
            <?php if(@$ligne['etat']=="Repondu"): ?>
              <span class="badge badge-info"><?php echo @$ligne['etat']; ?></span>
            <?php endif; ?>
            <?php if(@$ligne['etat']=="Fermé"): ?>
              <span class="badge badge-danger"><?php echo @$ligne['etat']; ?></span>
            <?php endif; ?>
          </div>

          <div class="card-body">
            <h4 class="card-title"><?php echo @$ligne['prenom'] . " " . @$ligne['nom']; ?></h4>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo @$ligne['email']; ?></h6>
            <p class="card-text" style="font-family: inherit; color : #343a40; font-weight: 500; line-height: 2.5;"> <?php echo @$ligne['message'] ?>
            </p>
          </div>
          <div class="card-footer">
            <?php echo @$datefr; ?>
          </div>

          <?php while($reponse = mysqli_fetch_assoc($recupReponse)): ?>
            <?php 
              $date = $reponse['date_rep']; 
              setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
              $dateRepfr = strftime('%d-%m-%Y à %H:%M:%S', strtotime($date)); 
            ?>
            <div class="hr" style="margin: inherit;"></div> 
            <div class="card-body">
              <h4 class="card-title"><?php echo $reponse['prenom'] . " " . $reponse['nom']; ?> a répondu :</h4>
              <h6 class="card-subtitle mb-2 text-muted">ce message a etais envoyé a l'adresse email : <?php echo $ligne['email']; ?> </h6>
              <p class="card-text" style="font-family: inherit; color : #343a40; font-weight: 500; line-height: 2.5;">
                <?php echo $reponse['message']; ?>
              </p>
            </div>
            <div class="card-footer">
              <?php echo @$dateRepfr; ?>
            </div>
          <?php endwhile; ?>
        </div>
        <br>
        <form method="POST" style="padding: 1.25rem; background-color: white; border: 2px solid #F2F2F2; border-radius: 6px;">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Repondre à <?php echo $ligne['prenom']; ?></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="message"></textarea>
          </div>
            <input class="btn btn-primary" type="submit" name="submitRep">
        </form>
        <?php if(@$sendRep): ?>
          <br>
         <center><span class="alert alert-success">Le mail a bien étais envoyé !</span></center> 
        <?php endif; ?>
      <?php else: ?>
        <div class="card card-body">
          <span>Désolé mais l'id fournis n'existe pas dans la base de données</span>
        </div>
      <?php endif; ?>

      <br><br>

      <?php include("include/footer.php"); ?>
    </div>
  </body>

  </html>
<?php else: ?>
  <?php header('location: tickets.php'); ?>
<?php endif; ?>