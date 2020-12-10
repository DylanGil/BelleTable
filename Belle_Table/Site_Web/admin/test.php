<?php  require_once('include/en-tete.php'); ?>

<?php 
        
        if(isset($_POST['new']))
          {
          	
            @$titre =  mysqli_escape_string($bdd, htmlspecialchars($_POST['titre']));
            @$prix =  mysqli_escape_string($bdd, htmlspecialchars($_POST['prix']));
            @$desc =  mysqli_escape_string($bdd, htmlspecialchars($_POST['desc']));
            @$img =  mysqli_escape_string($bdd, htmlspecialchars($_POST['monfichier']));

            echo $_FILES['monfichier']['error'];
            if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
              {   
                echo "le fichier a bien étais chargé ! <br><br>" ;

                  // Testons si le fichier n'est pas trop gros
                  if ($_FILES['monfichier']['size'] <= 1000000)
                    { 
                      // Testons si l'extension est autorisée
                      echo "le fichier respect bien la taille imposé de 1Mo <br><br>";
                      $infosfichier = pathinfo($_FILES['monfichier']['name']);
                      $extension_upload = $infosfichier['extension'];
                      $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                      if (in_array($extension_upload, $extensions_autorisees))
                        {
                          echo "L'extension du fichier est bien autorisée <br><br>" ;
                                  
                          // On peut valider le fichier et le stocker définitivement*
                          $_FILES['monfichier']['name'] = str_shuffle("imgwithstrhuffleestrespratiquepouureviterlessuppressionamoinquejenaipasdechance") . "." . $extension_upload;  
                          move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
                          echo "L'envoi a bien été effectué ! <br><br>";
                          $image = $_FILES['monfichier']['name'];
                          
                          echo '<img width="200" src="uploads/'. $image . '">';
                        }
                      else 
                      {
                        echo "Désolé l'extension de votre de fichier n'est pas autorisée, veuillez mettre uniquement du jpg, jpeg, gif ou png merci." ;
                      }
                    }
                  else 
                  {
                    echo "Désolé le fichier que vous nous avez fournis depasse 1Mo ";
                  }
              }
            else 
              {
                echo "une erreur est survenue lors de l'envoie du fichier";
              }

            mysqli_query($bdd, "INSERT INTO annonce(titre, prix, description) VALUES ('$titre', '$prix', '$desc') ");
          }
      ?>