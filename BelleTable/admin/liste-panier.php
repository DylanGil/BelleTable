<!DOCTYPE html>
<html>

<head>
    <title>Liste des paniers</title>   

    <?php require_once("include/en-tete.php"); ?>

    <style type="text/css">
      .liste-panier {background-color: /* #fff */ #007BFF; color: /* #343A40 */ #fff;} 
      /* .menuclick
      {
        color: #fff;
        background: #007BFF;
      } */
    </style> 

    <?php  
      $req = "SELECT panier.idproduit, iduser, email, SUM(prix) FROM panier INNER JOIN produit INNER JOIN login ON panier.idproduit = `produit`.`idproduit` AND iduser = id GROUP BY iduser " ;
      $requete = mysqli_query($bdd,$req);
      $i = 0;
      
      if (isset($_POST["monBoutonTri"]))
        { 
          $search =$_POST["search"];
          $tri =$_POST["tri"];
          $req = "SELECT panier.idproduit, iduser, email, SUM(prix) FROM panier INNER JOIN produit INNER JOIN login ON panier.idproduit = `produit`.`idproduit` AND iduser = id WHERE email LIKE '%$search%' ORDER BY email $tri";
          $requete = mysqli_query($bdd, $req); 
          $filtre = true ;
        }

      if(@$_GET['action']=="delete")
      {
        @$id = mysqli_escape_string($bdd, htmlspecialchars($_GET['id']));
        mysqli_query($bdd, "DELETE FROM panier WHERE iduser = '$id'");
        header('location: liste-panier.php');
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
              <div class="info-box box3" style="width: 160px; height: 110px;">
                <div class="text-box">
                  <h3><?php echo mysqli_num_rows($requete); ?> <i class="fas fa-shopping-basket"></i></h3>
                  <p>Paniers en cours</p>
                </div>
              </div>
            </div>

            <br>

          <center>
            <h2> <!-- modifie l'en tête en fonction de l'action faite !-->
                Liste des paniers 
            </h2>
          </center>

            <?php if(!isset($_GET['action'])): ?>
              <!-- formulaire de tri --> 

              <center>
                <br>
                <form action="" method="post">

                  <input type="text" class="form-control" style="width: 450px;" placeholder="Rechercher" name="search">
                  <br>
                  <label for="critere"> Trier par ordre : </label>
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
                    <th>Email</th>
                    <th>Nombre d'article</th>
                    <th>Prix Total</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $i = 0 ; ?>
                  <?php while ($basketInfo = mysqli_fetch_assoc($requete)): ?> 
                    <tr> 
                      <?php 
                        $i++; 
                        @$iduser = mysqli_escape_string($bdd, htmlspecialchars($basketInfo['iduser'])); 
                      ?>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $basketInfo['email']; ?></td>
                      <td><?php $query = mysqli_query($bdd, "SELECT count(*) FROM `panier` WHERE iduser = '$iduser'"); @$nbArticle = mysqli_fetch_assoc($query); echo @$nbArticle['count(*)']; ?> <i class="fas fa-box"></i></td>
                      <td><?php echo $basketInfo['SUM(prix)']; ?>€</td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-primary" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i> Options <i class="fas fa-arrow-down"></i> </button> 
                          <style type="text/css">.dropdown-item:hover{background-color: #F2F2F2;}</style>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="afficher-panier.php?id=<?= $basketInfo['iduser']; ?>" style=""><i class="far fa-eye"></i> Voir</a>
                            <a class="dropdown-item" href="?action=delete&id=<?php echo $basketInfo['iduser']; ?>"><i class="fas fa-trash-alt"></i> Vider le panier</a>
                          </div>
                        </div>  
                      </td> 
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
            <br>

          <?php if(@$filtre): ?>
            <center>
              <a href="liste-panier.php" class="btn btn-success">Retirez les filtre</a>
            </center>
          <?php endif; ?>

          <br>

          <?php include("include/footer.php"); ?>
    </div>
</body>

</html>