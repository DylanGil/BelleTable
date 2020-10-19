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
              
            <div align="center">
              <div class="info-box box4" style="width: 150px; height: 110px;">
                <div class="text-box">
                  <h3><?php $countUtilisateur = "SELECT count(prenom) FROM login"; $reqNbUtilisateur = mysqli_query($bdd,$countUtilisateur); $nbUser = mysqli_fetch_assoc($reqNbUtilisateur); echo $nbUser['count(prenom)']; ?> <i class="fas fa-users"></i></h3>
                  <p>Utilisateurs</p>
                </div>
              </div>
            </div>

            <br>

            <?php  
            $req = "SELECT * FROM login" ;
            $requete = mysqli_query($bdd,$req);
            $i = 0;

            if(isset($_GET['id'])) /* si il y a dans l'url "refmed" alors appliquer ce code (le refmed vien seulement lors d'une modification ou d'une suppresion) */
            {
              $id = $_GET['id']; 
              $req = "SELECT * FROM login WHERE id = \"$id\" ";
              $res = mysqli_query($bdd,$req);
              $donnee = mysqli_fetch_assoc($res);
              $id = $donnee['id'];
              $nom = $donnee['nom'];
              $prenom = $donnee['prenom'];
              $telephone = $donnee['telephone'];
              $email = $donnee['email'];
              $admin = $donnee['admin']; 
              $modifier = true ; /* la variable modifier devien true ce qui va nous permettre de cacher le tableau */
            }

            if(isset($_GET['id']) && isset($_GET['modifier'])) /* si l'url contien refmed ET modifier alors la variable modifier devien false */
            {
              $modifier = false ; /* la variable modifier devien false et va nous permettre malgré le fait qu'il y es refmed dans l'url de nous montré le tableau */
            }

            if(isset($_GET['id']) && @$_GET['supprimer']==1) /* si l'url contient refmed ET supprimer = 1 alors executez ce code */
            {
              $id = $_GET['id'];
              $reqRecuperation = "SELECT * FROM login WHERE id = \"$id\" "; /* nous permet de recupéré la donnée avant qu'elle sois supprimé pour l'afficher */ 
              $requete = mysqli_query($bdd,$reqRecuperation);
              $req = "DELETE FROM login WHERE id = \"$id\" ";
              $res = mysqli_query($bdd,$req);
              $supprimer = true ; /* mettre la variable supprimer en true va nous permettre d'afficher les message ou l'action que l'on veut lorsqu'on va supprimer un utilisateurs */ 
              $modifier = false;
            }

            if(isset($_POST['monBoutonM'])) /* si le bouton submit du formulaire pour "Modifier les utilisateurs" a etais cliqué */
              {
                $id = $_GET['id'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $telephone = $_POST['telephone'];
                $email = $_POST['email'];
                $admin = $_POST['admin'];
                $req = "UPDATE login SET 
                nom = '$nom',
                prenom = '$prenom',
                telephone = '$telephone',
                email = '$email',
                admin = '$admin' 
                WHERE id = '$id'";
                $res = mysqli_query($bdd,$req);  
                $modification = true ; # a ne pas confondre avec la variable modifier, la variable modifier indique que l'on a cliqué sur le petit crayon pour modifier le utilisateurs (mais que nous n'avons pas encore modifié le utilisateurs nous somme encore sur la page de saisie) mais la variable modification elle permet d'executez une action LA ou on envoie le formulaire de modification  
                $req = "SELECT * FROM login WHERE nom = '$nom'";
                $requete = mysqli_query($bdd,$req);
                }
              
            if (isset($_POST["monBoutonTri"]))
              {
                $critere = $_POST["critere"];   
                $search =$_POST["search"];
                $tri =$_POST["tri"];
                $req = "SELECT * FROM login where $critere like '%$search%' order by $critere $tri";
                $requete = mysqli_query($bdd, $req); 
                $filtre = true ;
              }
          ?>
        </head>
        <body>
          <center>
            <h2> <!-- modifie l'en tête en fonction de l'action faite !-->
              <?php if(@$filtre): ?>
                Recherche <?php if($critere=="email"): ?> de l' <?php else: ?> du <?php endif; ?> <?php echo $critere ?>
              <?php endif; ?>
              <?php if(@$modifier): ?>
                Modification de l'utilisateur <?php echo $nom . " " . $prenom; ?>
              <?php endif; ?>
              <?php if(@$supprimer): ?>
                Suppression de l'utilisateur <?php echo $nom . " " . $prenom; ?>
              <?php endif; ?>
              <?php if(!@$modifier && !@$supprimer && !@$filtre): ?>
                Liste des membres inscrits
              <?php endif; ?>
            </h2>
          
            <!-- message de reussite de la suppresion du utilisateur -->
            <?php if(@$supprimer): ?>
              <br>
              <span class="alert alert-success" role="alert">Vous venez de supprimer l'utilisateur <?php echo $nom . " " . $prenom ; ?> </span>
              <br>
              <br>  
            <?php endif; ?>
            <!-- message de reussite de la modification du utilisateur -->
            <?php if(@$modification): ?>
              <br>
              <span class="alert alert-success" role="alert">Vous venez de modifier l'utilisateur <?php echo $nom . " " . $prenom ; ?> </span>
              <br>
              <br>    
            <?php endif; ?>
          </center>
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
                    <option value="telephone"> telephone </option>
                    <option value="rang"> rang </option>
                  </select>
                  <select name="tri" class="custom-select" style="width: 140px;">
                    <option value="ASC">Croissant</option>
                    <option value="DESC">Decroissant</option>
                  </select>
                  <input type="submit" class="btn btn-info" value="Filtrer" name="monBoutonTri"> <br><br><br>
                </form>
              </center>
            <?php endif; ?>
             <!-- la page principal -->
             <?php if(@$modifier==false): ?> <!-- ligne la plus importante, si la variable modifier = false alors afficher ce tableau -->
                <div class="table-resposive">
                  <table class="table table-hover table-striped table-bordered table-sm-responsive">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>email</th>
                        <th>telephone</th>
                        <th>rang</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($userInfo = mysqli_fetch_assoc($requete)): ?> 
                        <tr>
                          <td><?php echo $userInfo['nom']; ?></td>
                          <td><?php echo $userInfo['prenom']; ?></td>
                          <td><?php echo $userInfo['email']; ?></td>
                          <td><?php echo $userInfo['telephone']; ?></td>
                          <td><?php if($userInfo['admin']==0){echo "Utilisateur" ; } else{echo "admin" ;} ?></td>
                          <td>
                            <a class="btn btn-primary" href="?id=<?=$userInfo["id"]?>" >Modifier</a>
                            <a class="btn btn-danger" href="?id=<?=$userInfo["id"]?>&supprimer=1">Supprimer</a> 
                          </td>
                        </tr>    
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
            <?php endif; ?> 
            
            <?php if(@$supprimer || @$modification): ?> 
              <!-- cette conditions permet de crée le bouton "revenir a l'accueil" il est crée uniquement lorsque l'action a etais executé, que le utilisateurs sois ajouter/supprimer ou modifier  -->
              <center> <a href="liste-membre.php"><input type="button" class="btn btn-warning" style="color: white;" value="Revenir a l'accueil"></a> </center> 
            <?php endif; ?>

            <?php if(@$modifier): ?> <!-- si la variable modifié = true alors cela affiche le formulaire pour modifier le tableau -->
            
            <?php $id = $_GET['id']; ?>
              <form action="?id=<?=$id?>&modifier=<?=$nom?>" method="post"> <!-- le formulaire renvoie dans l'url l'id du utilisateur + crée le get modifier qui va permettre de mettre la variable modifier en false et donc afficher le tableau lorsque le formulaire sera envoyé -->

                <label for="nom">Nom: </label>
                <br>
                <input type="text" class="form-control" name="nom" id="nom" value="<?=$nom;?>" required> 
                <br>
                <label for="prenom">Prenom: </label>
                <br>
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?=$prenom;?>" required>
                <br>
                <label for="email">Email: </label>
                <br> 
                <input type="text" class="form-control" name="email" id="email" value="<?=$email;?>" required>
                <br>
                <label for="tel">telephone: </label>
                <br>
                <input type="text" class="form-control" name="telephone" id="tel" value="<?=$telephone;?>" required>
                <br>
                <label for="rang">rang : </label> &nbsp;&nbsp;&nbsp;&nbsp;
                <select name="admin" id="rang" class="form-control"> 
                  <?php  
                      $req = "SELECT DISTINCT admin FROM login ORDER BY admin" ;
                      $res = mysqli_query($bdd,$req);

                      while($ligne = mysqli_fetch_assoc($res))
                      { if($ligne['admin']==0) {$grade="Utilisateur";} else {$grade ="Admin";}
                        if ($ligne["admin"] == $donnee["admin"])
                          {
                            echo "<option value='".$donnee['admin']."' selected>$grade</option>";
                          }
                        else 
                          { 
                            echo "<option value='".$ligne["admin"]."'>$grade</option>";
                          }
                      } 
                  ?>
                </select>
                <br>
                
                <a href="liste-membre.php"><input type="button" class="btn btn-warning" style="color: white;"  value="Annuler"></a>

                <input type="submit" class="btn btn-success" value="Envoyer" name="monBoutonM">
              </form>
          
            <?php endif; ?>

            <?php if(@$filtre): ?>
              <center>
                <a href="http://liste/cerfal/1erPPE/BelleTable/Belle_Table/Site_Web/admin/liste-membre.php" class="btn btn-success">Retirez les filtre</a>
              </center>
            <?php endif; ?>

            <br>
            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <?php include("css/footer.php"); ?>
    </div>
</body>

</html>