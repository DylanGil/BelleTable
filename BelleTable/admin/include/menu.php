<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>BelleTable</h3>
            </div>

            <a href="index3.html" class="header-sidebar">
                <img src="images/logo.png" alt="Logo" class="brand-image img-circle" style="opacity: .8">
                <span>Panel Admin</span>
            </a>

            <div class="hr"></div>

            <div class="header-sidebar">
                
                <a href="#" class=""><?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ; ?> </a>
            </div>

            <div class="hr"></div>

            <ul class="list-unstyled components navbar-dark bg-dark">
                <li class="nav-header">Gérer le site</li>

                <li class="dashboard">
                    <a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>

<!--            <li class="menuclick dropright">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fad fa-analytics"></i> Statistique </a>
                    <ul class="collapse list-unstyled sous-menu" id="homeSubmenu">
                        <li>
                            <a class="liste-panier" href="liste-panier.php"><i class="far fa-shopping-basket"></i> Paniers en cours</a>
                        </li>

                        <li>
                            <a class="liste-membre" href="liste-membre.php"><i class="fas fa-users"></i> Liste des membres inscrits</a>
                        </li>

                    </ul>
                </li> -->

                <li class="liste-panier">
                    <a href="liste-panier.php"><i class="far fa-shopping-basket"></i> Paniers en cours</a>
                </li>
                <li class="produits">
                    <a href="produits.php"><i class="fas fa-edit"></i> Gérer les produits </a>
                </li>
                <li class="offre">
                    <a href="offre.php"><i class="fas fa-plus"></i> Ajouter une offre d'emploi </a>
                </li>
                <li class="tickets">
                    <a href="tickets.php"><i class="fas fa-ticket-alt"></i> Tickets <span class="badge badge-danger"><?php $query = mysqli_query($bdd, "SELECT count(*) FROM contact WHERE etat = 'Nouveau'"); $newRep = mysqli_fetch_assoc($query); print_r($newRep['count(*)']); ?></span> </a>
                </li>
            </ul>
        
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="../" class="back">Retourner sur le site</a>
                </li>
                <li>
                    <a href="../?infos=index.php&deconnecter=1" class="deconnexion">Se deconnecter</a>
                </li>
            </ul>
        </nav>
