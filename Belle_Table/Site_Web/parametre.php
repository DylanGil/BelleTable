<!DOCTYPE html>
<html>
<head>
    <?php session_start(); ?>
    <?php $page = "profil.php"; ?>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
    <title>Profil</title>
 <?php 
    $succes = false ;
    $email = $_SESSION['email'];
   
    if(isset($_POST) && !empty($_POST['submit']))
    {       
        switch ($_POST['submit']) 
        {   
            case 'modifier-nom':
           
                if($_POST['nom'] == $_SESSION['nom']) 
                    {
                        $error = '<span class="erreur-form">Ne mettez pas votre ancien nom </span>';
                    }
                else 
                {
                    if(!empty($_POST['nom']))
                    {
                        $newNom = $_POST['nom'];
                        requete("UPDATE `login` SET `nom` = '{$newNom}' where email = '$email'");
                        $_SESSION['nom'] = $newNom;
                        $succes = true ; 
                    }
                    else
                    {   
                        $error = '<span class="erreur-form">Champ invalide !</span>';
                    }      
                }

                break;
            case 'modifier-email':
                if($_POST['email'] == $_SESSION['email']) 
                    {
                        $error = '<span class="erreur-form">Ne mettez pas votre ancienne adresse mail </span>';
                    }
                else 
                {
                    if(!empty($_POST['email']) && preg_match( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $_POST['email']))
                    {
                        $newEmail = $_POST['email'];
                        $email = $_SESSION['email'];
                        requete("UPDATE `login` SET `email` = '{$newEmail}' where email = '$email'");
                        $_SESSION['email'] = $newEmail;
                        $succes = true ;
                    }
                    else
                    {
                        $error = '<span class="erreur-form">Email invalide !</span>';
                    }
                }
                break;
                case 'current' :
                    if($_POST['current-mdp'] !== $_SESSION['mdp']) 
                    {
                        $error = '<span class="erreur-form">Mauvais mot de passe !</span>';
                    }
                    if(empty($_POST['current-mdp']))
                    {   
                        $error = '<span class="erreur-form">Mot de passe invalide !</span>';
                    }
                    
                   
                break;  
                case 'modifier-mdp':
                if($_POST['nouveau-mdp']==$_SESSION['mdp'] || $_POST['confirmation']==$_SESSION['mdp']) 
                    {
                        $error = '<span class="erreur-form">Ne mettez pas votre ancien mot de passe !</span>';
                    }
                else 
                {   
                    if(!empty($_POST['nouveau-mdp']) && !empty($_POST['confirmation']) && $_POST['nouveau-mdp']==$_POST['confirmation'])
                    {
                        $newMdp = $_POST['nouveau-mdp'];
                        requete("UPDATE `login` SET `mdp` = '{$newMdp}' where email = '$email'");
                        $_SESSION['mdp'] = $newMdp;
                        $succes = true ;
                    }
                    else
                    {
                        $error = '<span class="erreur-form">les mots de passes ne son pas indentique</span>';
                    }
                    if(empty($_POST['nouveau-mdp']) || empty($_POST['confirmation']))
                    {
                        $error = '<span class="erreur-form">veuillez remplir les deux champs !</span>';
                    }
                }
                break;
        }
    }
?>

</head>

<body>
    <?php include("menu.php"); ?>
        <main style="background-image: url(images/image-1.jpg);">

           <div class="settings-box" align="center">
               <div class="titre-settings">
                    Paramètres généraux du compte
                </div> 
                <div class="section-settings">
                    
                    <p class="ligne-settings"> 
                        <span class="chtml">Nom:</span>
                        <span class="bold">
                            <?php echo $_SESSION['nom']; ?>
                        </span>
                        <a href="?modifier=nom">Modifier</a>
                    </p>

                     <?php if(@$_GET['modifier']=='nom'): ?>
                        <form class="form-modifier" method="POST" action="">
                            <label for="pseudo">Nouveau nom</label><br>
                            <input type="text" name="pseudo" class="modifier form-control">
                            <?php echo @$error; ?>
                            <?php if($succes): ?>
                                <span class="succes-message">Le nom a bien etais modifié !</span>
                                <br><br>
                            <?php endif; ?>
                            <br>
                            <button type="submit" name="submit" value="modifier-pseudo" class="btn btn-modifier"> Modifier </button> 
                            <button type="button" name="submit" value="annuler" onclick="self.location.href='parametre.php'" class="btn btn-cancel">Annuler</button>
                        </form>
                    <?php endif; ?>

                    <p class="ligne-settings"> 
                        <span class="chtml">Prenom:</span>
                        <span class="bold">
                            <?php echo $_SESSION['prenom']; ?>
                        </span>
                        <a href="?modifier=prenom">Modifier</a>
                    </p>

                     <?php if(@$_GET['modifier']=='prenom'): ?>
                        <form class="form-modifier form-pseudo" method="POST" action="">
                            <label for="pseudo">Nouveau Prenom</label><br>
                            <input type="text" name="pseudo" class="modifier form-control">
                            <?php echo @$error; ?>
                            <?php if($succes): ?>
                                <span class="succes-message">Le prenom a bien etais modifié !</span>
                                <br><br>
                            <?php endif; ?>
                            <br>
                            <button type="submit" name="submit" value="modifier-pseudo" class="btn btn-modifier"> Modifier </button> 
                            <button type="button" name="submit" value="annuler" onclick="self.location.href='parametre.php'" class="btn btn-cancel">Annuler</button>
                        </form>
                    <?php endif; ?>

                    <p class="ligne-settings"> 
                        <span class="chtml">Telephone:</span>
                        <span class="bold">
                            <?php echo $_SESSION['telephone']; ?>
                        </span>
                        <a href="?modifier=tel">Modifier</a>
                    </p>

                     <?php if(@$_GET['modifier']=='tel'): ?>
                        <form class="form-modifier form-pseudo" method="POST" action="">
                            <label for="pseudo">Nouveau Tel</label><br>
                            <input type="text" name="pseudo" class="modifier form-control">
                            <?php echo @$error; ?>
                            <?php if($succes): ?>
                                <span class="succes-message">Le numéro de telephone a bien etais modifié !</span>
                                <br><br>
                            <?php endif; ?>
                            <br>
                            <button type="submit" name="submit" value="modifier-pseudo" class="btn btn-modifier"> Modifier </button> 
                            <button type="button" name="submit" value="annuler" onclick="self.location.href='parametre.php'" class="btn btn-cancel">Annuler</button>
                        </form>
                    <?php endif; ?>

                    <p class="ligne-settings"> 
                        <span class="chtml">Email:</span>
                        <span class="bold">
                            <?php echo $_SESSION['email']; ?>
                        </span>
                        <a href="?modifier=email">Modifier</a>
                    </p>

                    <?php if(@$_GET['modifier']=='email'): ?>
                        <form class="form-modifier form-pseudo" method="POST" action="">
                            <label for="pseudo">Nouvelle Email</label><br>
                            <input type="text" name="pseudo" class="modifier form-control">
                            <?php echo @$error; ?>
                            <?php if($succes): ?>
                                <span class="succes-message">L'email a bien etais modifié !</span>
                                <br><br>
                            <?php endif; ?>
                            <br>
                            <button type="submit" name="submit" value="modifier-pseudo" class="btn btn-modifier"> Modifier </button> 
                            <button type="button" name="submit" value="annuler" onclick="self.location.href='parametre.php'" class="btn btn-cancel">Annuler</button>
                        </form>
                    <?php endif; ?>
            
                    <p class="ligne-settings">
                        <span class="chtml">Mot de passe: </span>
                        <span class="bold">
                            
                        </span>
                        <a href="?modifier=mot-de-passe">Modifier</a>
                    </p>
                    
                    <?php if(@$_GET['modifier']=='mot-de-passe'): ?>
                        <form class="form-modifier form-mdp-current" method="POST" action="">
                            <label for="current-mdp">Mot de passe actuel</label><br>
                            <input type="password" name="current-mdp" class="modifier form-control">
                            <?php echo @$error; ?>
                            <?php if($succes): ?>
                                    <span class="succes-message">Le mot de passe a bien etais modifié !</span>
                                    <br><br>
                            <?php endif; ?>
                            <br>
                            <button type="submit" name="submit" value="current" class="btn btn-modifier"> Envoyer </button>
                            <button type="button" name="submit" value="annuler" onclick="self.location.href='parametre.php'" class="btn btn-cancel">Annuler</button>
                        </form>

                    <?php endif; ?>


                    <?php if(@$_POST['current-mdp'] == $_SESSION['mdp']): ?>
                        <style type="text/css">.form-mdp-current {display: none;}</style>
                        <form class="form-modifier form-mdp" method="POST" action="">
                            <label for="nouveau-mdp">Nouveau Mot de passe</label><br>
                            <input type="password" name="nouveau-mdp" class="modifier form-control">
                            <label for="confirmation">Confirmer</label><br>
                            <input type="password" name="confirmation" class="modifier form-control">
                            <br>
                            <button type="submit" name="submit" value="modifier-mdp" class="btn btn-modifier"> Modifier </button> 
                            <button type="button" name="submit" value="annuler" onclick="self.location.href='parametre.php'" class="btn btn-cancel">Annuler</button>
                        </form>
                    <?php endif; ?>
                    <center>
                        <a href="profil.php">Retournez sur mon profil</a> <a href="">|</a>
                        <a href="?deconnecter=1">Deconnexion</a>
                    </center>
                </div> 
            </div>
        </main>
    <?php include("footer.php"); ?>
</body>
</html>