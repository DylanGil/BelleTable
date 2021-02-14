<!DOCTYPE html>
<html>

<head>
    <title>Demande de ticket</title>   

    <style type="text/css">.tickets {background-color: #007BFF;}</style> <!-- met la page ou on est en bleu -->
    
    <?php 

      $class = ".tickets";

      require_once("include/en-tete.php");
      
    ?>
    <?php  
      $req = "SELECT * FROM contact" ;
      $requete = mysqli_query($bdd,$req);
 
      if (isset($_POST["monBoutonTri"]))
        {
          $critere = $_POST["critere"];   
          $search =$_POST["search"];
          $tri =$_POST["tri"];
          $req = "SELECT * FROM contact WHERE $critere like '$search%' order by $critere $tri";
          $requete = mysqli_query($bdd, $req); 
          $filtre = true ;
        }

      if (isset($_POST["monBoutonModif"]))
        {
          $newEtat = $_POST["etat"];   
          $id = $_GET['id'];
          $req = "UPDATE contact SET etat = '$newEtat' WHERE id = '$id' ";
          $requete = mysqli_query($bdd, $req); 
          $modif = true;
        }
    ?>
</head>
<body>

  <?php include("include/menu.php"); ?>
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
      
    <div align="center">
      <div class="info-box box4" style="width: 150px; height: 110px;">
        <div class="text-box">
          <h3><?php $countUtilisateur = "SELECT count(id) FROM contact"; $reqNbUtilisateur = mysqli_query($bdd,$countUtilisateur); $nbUser = mysqli_fetch_assoc($reqNbUtilisateur); echo $nbUser['count(id)']; ?> <i class="fas fa-id-card-alt"></i></h3>
          <p>Tickets</p>
        </div>
      </div>
    </div>

    <br>
    <center>
      <h2> <!-- modifie l'en tête en fonction de l'action faite !-->
        <?php if(@$filtre): ?>
          Recherche <?php if($critere=="email" || $critere == "etat"): ?> de l'<?php else: ?> du <?php endif; ?><?php echo $critere ; ?>
        <?php elseif(@$_GET['etat']): ?>
          Modification de l'etat
        <?php else: ?>
          Demande de ticket
        <?php endif; ?>
      </h2>
    </center>

    <?php if(!isset($_GET['etat'])): ?>
      <?php if(!isset($modifier) && !isset($_GET['action'])): ?>
        <!-- formulaire de tri --> 

        <center>
          <br>
          <form action="" method="post">

            <input type="text" class="form-control" style="width: 450px;" placeholder="Rechercher" name="search">
            <br>
            <label for="critere"> Trier par : </label>
            <select name="critere" class="custom-select" id="critere" style="width: 130px;">
              <option value="nom"> nom </option>
              <option value="prenom"> prenom </option>
              <option value="email"> email </option>
              <option value="sujet"> sujet </option>
              <option value="etat"> etat </option>
            </select>
            <select name="tri" class="custom-select" style="width: 140px;">
              <option value="ASC">Croissant</option>
              <option value="DESC">Decroissant</option>
            </select>
            <input type="submit" class="btn btn-info" value="Filtrer" name="monBoutonTri"> <br><br><br>
          </form>
        </center>
      <?php endif; ?>

      <div class="table-responsive" >
        <table class="table table-hover table-striped table-bordered table-sm-responsive">
          <thead>
            <tr>
              <th>N°</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Email</th>
              <th>Sujet</th>
              <th>Date</th>
              <th>Etat</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 0 ; ?>
            <?php while ($userInfo = mysqli_fetch_assoc($requete)): ?> 
              <tr> <?php $i++; ?>
                <td><?php echo $i; ?></td>
                <td><?php echo $userInfo['nom']; ?></td>
                <td><?php echo $userInfo['prenom']; ?></td>
                <td><?php echo $userInfo['email']; ?></td>
                <td><?php echo $userInfo['sujet']; ?></td>
                <td><?php echo $userInfo['date_creation']; ?></td>
                <td><?php echo $userInfo['etat']; ?></td>
                <td>
                  <div class="dropdown">
                    <button class="btn btn-primary" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i> Options <i class="fas fa-arrow-down"></i> </button> 
                    <style type="text/css">.dropdown-item:hover{background-color: #F2F2F2;}</style>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <a class="dropdown-item" href="afficher-tickets.php?id=<?= $userInfo['id']; ?>" style=""><i class="far fa-eye"></i> Voir</a>
                      <a class="dropdown-item" href="?etat=<?php echo $userInfo['etat']; ?>&id=<?php echo $userInfo['id']; ?>"><i class="fas fa-edit"></i>Modifier l'état</a>
                    </div>
                  </div>  
                </td> 
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <?php 
        $etat = $_GET['etat']; 
        $nouveau = "Nouveau";
        $repondu = "Repondu";
        $fermer = "Fermé";
      ?>
      <br>
      <center>
        <form action="" method="post">
          <select name="etat" class="custom-select changeEtat" style="width: 140px;">
            <?php if ($nouveau==$etat): ?>
              <option value="Nouveau" selected="">Nouveau</option>
              <option value="Repondu">Repondu</option>
              <option value="Fermé">Fermé</option>
            <?php elseif($repondu==$etat): ?>
              <option value="Nouveau">Nouveau</option>
              <option value="Repondu" selected="">Repondu</option>
              <option value="Fermé">Fermé</option>
            <?php elseif($fermer==$etat): ?>
              <option value="Nouveau">Nouveau</option>
              <option value="Repondu">Repondu</option>
              <option value="Fermé" selected="">Fermé</option>
            <?php else: ?>
              </select>
              <?php $erreurGet = true; ?>
              <style type="text/css">.changeEtat{display: none;}</style>
              <div class="card card-body" style="width: 320px;">Désolé une erreur est survenue</div>
              <br>
            <?php endif; ?>
          </select>
          <?php if(!isset($erreurGet)): ?>
            <input type="submit" class="btn btn-info" value="Modifier" name="monBoutonModif">
            <br><br><br>
          <?php endif; ?>
        </form> 
      </center>
    <?php endif; ?>

    <?php if(@$modif): ?>
      <center>
        <span class="alert alert-success">L'etat a bien étais modifié en 
          <strong><?php echo $newEtat; ?></strong>
        </span>
        <br><br>
        <a href="tickets.php" class="btn btn-success">Revenir a l'accueil</a>
      </center>
    <?php endif; ?>

    <?php if(@$filtre): ?>
      <center>
        <a href="tickets.php" class="btn btn-success">Retirer les filtres</a>
      </center>
    <?php endif; ?>

    <br>
  
    <?php include("include/footer.php"); ?>
  </div>
</body>

</html>