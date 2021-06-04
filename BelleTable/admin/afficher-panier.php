<?php if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])):  ?>
  <!DOCTYPE html>
  <html>

  <head>
      <title>Panel Admin</title>   
      
      <?php require_once("include/en-tete.php"); ?>
      
      <style type="text/css">.liste-panier {background-color: #fff; color: #343A40;} .menuclick{color: #fff; background: #007BFF;}</style> 

      <?php 
        
        @$id = mysqli_escape_string($bdd, htmlspecialchars($_GET['id']));
        
        $req = mysqli_query($bdd, "SELECT id_panier, image, titre, description, prix FROM `panier`, produit, login WHERE panier.idproduit = produit.idproduit AND iduser = login.id AND iduser = '$id'");

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
                  echo mysqli_num_rows($req);
                ?> 
                <i class="fas fa-box"></i>
              </h3>
              <p>Articles</p>
            </div>
          </div>
        </div>
        <br>
      </section>

      <main>
        <div class="table-responsive" >
          <table class="table table-hover table-striped table-bordered table-sm-responsive">
            <thead>
              <tr>
                <th>N°</th>
                <th>Image</th>
                <th>Titre</th>
                <th>Description</th>
                <th>prix</th>
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
<?php else: ?>
  <?php header('location: liste-panier.php'); ?>
<?php endif; ?>