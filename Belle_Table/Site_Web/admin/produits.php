<!DOCTYPE html>
<html>

<head>
    <title>Gestion des produits</title>   
    
    <style type="text/css">.produits {background-color: #007BFF;}</style> <!-- met la page ou on est en bleu -->

    <?php 

      $class = ".produits" ; 
      
      require_once("include/en-tete.php");

      $req = mysqli_query($bdd, "SELECT * FROM produit ORDER BY idproduit");

      @$id = mysqli_escape_string($bdd, htmlspecialchars($_GET['id']));

      if(isset($_POST['submit']))
      {
        @$titre =  mysqli_escape_string($bdd, htmlspecialchars($_POST['titre']));
        @$prix =  mysqli_escape_string($bdd, htmlspecialchars($_POST['prix']));
        @$desc =  mysqli_escape_string($bdd, htmlspecialchars($_POST['desc']));
        @$img =  mysqli_escape_string($bdd, htmlspecialchars($_FILES['image']['name']));
        @$img2 =  mysqli_escape_string($bdd, htmlspecialchars($_POST['oldimage']));

        if($_GET['action']=="new")
        {
          #################PARAMETRE IMAGE#######################3
          // Tester si le fichier a étais envoyé
          if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
          {   
            // Le fichier a bien étais chargé !

            // Tester si le fichier n'est pas trop gros
            if ($_FILES['image']['size'] <= 3000000)
            { 
              // Le fichier respect bien la taille imposé de 1Mo
              
              $infosfichier = pathinfo($_FILES['image']['name']);
              $extension_upload = $infosfichier['extension'];
              $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

              // Tester si l'extension est autorisée
              if (in_array($extension_upload, $extensions_autorisees))
                {
                  // L'extension du fichier est bien autorisée
                          
                  // Le fichier peut maintenant être stocker définitivement
                
                  move_uploaded_file($_FILES['image']['tmp_name'], '../produits/' . basename($_FILES['image']['name']));

                  // Le fichier a étais stocker dans le repertoire "produits"

                  mysqli_query($bdd, "INSERT INTO produit(titre, prix, description, image) VALUES ('$titre', '$prix', '$desc', '$img') ");
                  
                  header('location:produits.php');

                }

              else 
              {
                $errorUpload = "Désolé l'extension de votre de fichier n'est pas autorisée, veuillez mettre uniquement du jpg, jpeg, gif ou png merci." ;
              }
            }
            else 
            {
              $errorUpload = "Désolé le fichier que vous nous avez fournis depasse 3Mo ";
            }
          }
          else 
          {
            $errorUpload = "une erreur est survenue lors de l'envoie du fichier";
          }
        }

        if($_GET['action']=="edit")
        {
          if($_FILES['image']['name']) // si l'produit est modifié est qu'une nouvelle photo est ajouté 
          {
            if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
            {   
              // Le fichier a bien étais chargé !

              // Tester si le fichier n'est pas trop gros
              if ($_FILES['image']['size'] <= 3000000)
              { 
                // Le fichier respect bien la taille imposé de 1Mo
                
                $infosfichier = pathinfo($_FILES['image']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'Jpg', 'Jpeg', 'Gif', 'PNG', 'JPG', 'JPEG', 'GIF');

                // Tester si l'extension est autorisée
                if (in_array($extension_upload, $extensions_autorisees))
                {
                  // L'extension du fichier est bien autorisée
                          
                  // Le fichier peut maintenant être stocker définitivement
                
                  move_uploaded_file($_FILES['image']['tmp_name'], '../produits/' . basename($_FILES['image']['name']));

                  // Le fichier a étais stocker dans le repertoire "produits"

                  mysqli_query($bdd, "UPDATE produit SET titre = '$titre', prix = '$prix', description = '$desc', image = '$img' WHERE idproduit = '$id'");
                  
                  header('location:produits.php');
                }

                else 
                {
                  $errorUpload = "Désolé l'extension de votre fichier n'est pas autorisée, veuillez mettre uniquement du jpg, jpeg, gif ou png merci." ;
                }
              }
              else 
              {
                $errorUpload = "Désolé le fichier que vous nous avez fournis depasse 3Mo ";
              }
            }
            else 
            {
              $errorUpload = "une erreur est survenue lors de l'envoie du fichier";
            }
          }  
          else 
            // si l'produit est modifié MAIS que la photo n'est pas modifié alors garder l'ancienne photo contenue dans le hidden "oldimage" 
          {
            mysqli_query($bdd, "UPDATE produit SET titre = '$titre', prix = '$prix', description = '$desc', image = '$img2' WHERE idproduit = '$id'");
          }
                  
          header('location:produits.php');
        }
      }

      if(@$_GET['action']=="delete")
      {
        mysqli_query($bdd, "DELETE FROM produit WHERE idproduit = '$id'");
        header('location:produits.php');
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
        </button>
      </div>
    </nav>

    <section>
      <h2>Statistique</h2>

      <div align="center">
        <div class="info-box box1" style="width: 150px; height: 130px; ">
          <div class="text-box" style="padding-top: 35px;">
            <h3> 
              <?php 
                $query = mysqli_query($bdd, "SELECT count(*) FROM produit"); 
                $nbProduit = mysqli_fetch_assoc($query); 
                echo $nbProduit['count(*)']; 
              ?> 
              <i class="fas fa-box"></i>
            </h3>
            <p>Produits</p>
          </div>
        </div>
      </div>
      <br>
    </section>

    <main>
      
      <?php if(!isset($_GET['action'])): ?>
        <center>
          <a href="?action=new" class="btn btn-success"><i class="fas fa-plus"></i>Ajouter un produit</a>
        </center>
      <?php endif; ?> 

      <?php if(@$_GET['action']=="new" || @$_GET['action']=="edit"): ?>

          <?php 
            if(@$_GET['action']=="edit")
              {
                @$id = mysqli_escape_string($bdd, htmlspecialchars($_GET['id']));
                $edit = mysqli_query($bdd, "SELECT * FROM produit WHERE idproduit = '$id'");
                $produit = mysqli_fetch_assoc($edit);
              } 
          ?>
          <form method="POST" style="width: 300px; margin: auto;" enctype="multipart/form-data">
            <span style="color: red;"><?php echo @$errorUpload; ?></span>
            <br><br>
            <label for="titre" class="label-produit">Titre</label><br>
            <input type="texte" name="titre" id="titre" value="<?php echo @$produit['titre'] ?>" placeholder="titre" class="form-control">
            <br>
            <label for="prix" class="label-produit">Prix</label><br>
            <input type="number" name="prix" id="prix" value="<?php echo @$produit['prix'] ?>" placeholder="prix" class="form-control">
            <br>
            <label for="desc" class="label-produit">Description</label><br>
            <input type="texte" name="desc" id="desc" value="<?php echo @$produit['description'] ?>" placeholder="Description" class="form-control">
            <br>
            <label for="image" class="label-produit form-control">Image <i class="fas fa-download"></i></label>
            <input type="file" hidden="" name="image" id="image" class="form-control">
            <input type="hidden" name="oldimage" value="<?php echo @$produit['image'] ?>">
            <?php if(!isset($produit['image'])): ?>
              <span> Fichier autorisée : jpg, jpeg, gif, png. 3Mo maximum  </span>
            <?php else: ?>
              <span> <span style="color: red;">Attention !</span> Si vous rajoutez une photo, la nouvelle photo remplacera l'ancienne</span>
            <?php endif; ?>
            <br><br>
            <input type="submit" name="submit" class="btn btn-success">
             <a href="produits.php" class="btn btn-warning text-white">Annuler</a>
          </form>

      <?php endif; ?>

      <div class="table-responsive" >
        <table class="table table-hover table-striped table-bordered table-sm-responsive">
          <thead>
            <tr>
              <th>N°</th>
              <th>Image</th>
              <th>Titre</th>
              <th>Description</th>
              <th>prix</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <br>
            <?php $i = 0 ; ?>
            <?php while ($produit = mysqli_fetch_assoc($req)): ?> 
              <tr> <?php $i++; ?>
                <td><?php echo $i; ?></td>
                <td><img width="110" src="../produits/<?php echo $produit['image']; ?>"></td>
                <td><?php echo $produit['titre']; ?></td>
                <td><?php echo $produit['description']; ?></td>
                <td><?php echo $produit['prix']; ?>€</td>
                <td style="white-space: nowrap;">
                  <a class="btn btn-primary" href="?action=edit&id=<?=$produit["idproduit"]?>">Modifier</a>
                  <a class="btn btn-danger" href="?action=delete&id=<?=$produit["idproduit"]?>">Supprimer</a> 
                </td> 
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>

    </main>
     
    <br>
    <?php include("include/footer.php"); ?>

  </div>
</body>

</html>