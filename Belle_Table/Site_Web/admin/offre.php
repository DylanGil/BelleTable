<!DOCTYPE html>
<html>

<head>
    <title>Panel Admin V.3</title>   
    
    <style type="text/css">.offre {background-color: #007BFF;}</style> <!-- met la page ou on est en bleu -->

    <?php 

      $class = ".offre" ; 
      
      require_once("include/en-tete.php");

      $req = mysqli_query($bdd, "SELECT * FROM emploi ORDER BY id");

      @$id = mysqli_escape_string($bdd, htmlspecialchars($_GET['id']));

      if(isset($_POST['submit']))
      {
        @$libelle =  mysqli_escape_string($bdd, htmlspecialchars($_POST['libelle']));
        @$desc =  mysqli_escape_string($bdd, htmlspecialchars($_POST['desc']));
        @$note =  mysqli_escape_string($bdd, htmlspecialchars($_POST['note']));

        if($_GET['action']=="new")
        {
          mysqli_query($bdd, "INSERT INTO emploi(libelle, description, note) VALUES ('$libelle', '$desc', '$note') "); 

          header('location: offre.php'); 
        }
            
        if($_GET['action']=="edit")
        {
          mysqli_query($bdd, "UPDATE emploi SET libelle = '$libelle', description = '$desc', note = '$note' WHERE id = '$id'"); 

          header('location: offre.php'); 
        }
      }

      if(@$_GET['action']=="delete")
      {
        mysqli_query($bdd, "DELETE FROM emploi WHERE id = '$id'");
        header('location: offre.php');
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
                $query = mysqli_query($bdd, "SELECT count(*) FROM emploi"); 
                $nbEmploi = mysqli_fetch_assoc($query); 
                echo $nbEmploi['count(*)']; 
              ?> 
              <i class="fas fa-box"></i>
            </h3>
            <p>Emploi</p>
          </div>
        </div>
      </div>
      <br>
    </section>

    <main>
      
      <?php if(!isset($_GET['action'])): ?>
        <center>
          <a href="?action=new" class="btn btn-success"><i class="fas fa-plus"></i>Ajouter une offre</a>
        </center>
      <?php endif; ?> 

      <?php if(@$_GET['action']=="new" || @$_GET['action']=="edit"): ?>

          <?php 
            if(@$_GET['action']=="edit")
              {
                @$id = mysqli_escape_string($bdd, htmlspecialchars($_GET['id']));
                $edit = mysqli_query($bdd, "SELECT * FROM emploi WHERE id = '$id'");
                $emploi = mysqli_fetch_assoc($edit);
              } 
          ?>
          <form method="POST" style="width: 300px; margin: auto;">
            <br><br>
            <label for="libelle" class="label-produit">Emploi</label><br>
            <input type="texte" name="libelle" id="libelle" value="<?php echo @$emploi['libelle'] ?>" placeholder="Emploi" class="form-control">
            <br>
            <label for="desc" class="label-produit">Description</label><br>
            <input type="texte" name="desc" id="desc" value="<?php echo @$emploi['description'] ?>" placeholder="description" class="form-control">
            <br>
            <label for="note" class="label-produit">Note</label><br>
            <input type="texte" name="note" id="note" value="<?php echo @$emploi['note'] ?>" placeholder="Note" class="form-control">
            <br>
            <input type="submit" name="submit" class="btn btn-success">
             <a href="offre.php" class="btn btn-warning text-white">Annuler</a>
          </form>

      <?php endif; ?>

      <div class="table-responsive" >
        <table class="table table-hover table-striped table-bordered table-sm-responsive">
          <thead>
            <tr>
              <th>N°</th>
              <th>Emploi</th>
              <th>Description</th>
              <th>Note</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <br>
            <?php $i = 0 ; ?>
            <?php while ($offre = mysqli_fetch_assoc($req)): ?> 
              <tr> <?php $i++; ?>
                <td><?php echo $i; ?></td>
                <td><?php echo $offre['libelle']; ?></td>
                <td><?php echo $offre['description']; ?></td>
                <td><?php echo $offre['note']; ?></td>
                <td style="white-space: nowrap;">
                  <a class="btn btn-primary" href="?action=edit&id=<?=$offre["id"]?>">Modifier</a>
                  <a class="btn btn-danger" href="?action=delete&id=<?=$offre["id"]?>">Supprimer</a> 
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