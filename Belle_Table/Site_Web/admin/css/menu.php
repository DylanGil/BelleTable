 <meta charset="utf-8">
<!-- pour avoir un site responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- pour mettre des icones  -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
<!-- pour la description du site -->
<meta name="description" content="">
<!-- pour mettre les mots clés -->
<meta name= "keywords" content= "">
<!-- pour IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<!-- pour utiliser jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- Pour activer le bouton afficher/enlever la navbar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
        $('.menuclick').click(function() {
          $('.menuclick').toggleClass('active');
          $('.menuclick').toggleClass('dropright');
          $('<?php echo $class ?>').toggleClass('desactive');
        }); 
        $('.menuclick2').click(function() {
          $('.menuclick2').toggleClass('active');
          $('.menuclick2').toggleClass('dropright');
        });
    });
</script>

<style type="text/css">.desactive {background-color: inherit;}</style> <!-- permet de enlever la couleur de la page active lorsqu'on active un sous menu !-->
<?php include("../inscriptionPHP.php"); ?>
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>BelleTable</h3>
            </div>

            <a href="index3.html" class="header-sidebar">
                <img src="images/logo.jpg" alt="Logo" class="brand-image img-circle" style="opacity: .8">
                <span class="brand-text font-weight-light">Panel Admin</span>
            </a>

            <div class="hr"></div>

            <div class="header-sidebar">
                
                <a href="#" class=""><?php print_r($_SESSION['nom'] . " " . $_SESSION['prenom']); ?> </a>
            </div>

            <div class="hr"></div>

            <ul class="list-unstyled components navbar-dark bg-dark">
                <li class="nav-header">Gérer le site</li>

                <li class="dashboard">
                    <a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>

                <li class="menuclick dropright">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users-cog"></i> Administration </a>
                    <ul class="collapse list-unstyled sous-menu" id="homeSubmenu">
                        <li class="membre">
                            <a href="membre.php"><i class="fas fa-users"></i> Liste des membres inscrit</a>
                        </li>

                        <li class="maintenance" style="">
                            <a href="activer-maintenance.php"><i class="fas fa-cog"></i> Maintenance</a>
                        </li>
                    </ul>
                </li>

                <li class="couleur-du-site">
                    <a href="couleur-du-site.php"><i class="fas fa-paint-brush"></i> Gérer les articles <span class="right badge badge-danger">New</span></a>
                </li>
                <li class="add-news">
                    <a href="ajouter-news.php"><i class="fas fa-pencil-alt"></i> News</a>
                </li>
                <li class="log">
                    <a href="log.php"><i class="fas fa-history"></i> Log</a>
                </li>
            </ul>
        
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="#" class="download">Retourner sur [page personalisé]</a>
                </li>
                <li>
                    <a href="#" class="article">Retourner sur le site</a>
                </li>
            </ul>
        </nav>
