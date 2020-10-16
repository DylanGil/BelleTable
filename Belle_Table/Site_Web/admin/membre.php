<!DOCTYPE html>
<html>

<head>
    <title>Panel Admin V.3</title>   
</head>
 <!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">




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

            <nav aria-label="">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><?php print_r($_SERVER['SERVER_NAME']); ?></a></li>
                <li class="breadcrumb-item" aria-current="page">admin</li>
                <li class="breadcrumb-item active" aria-current="page">Log</li>
              </ol>
            </nav>    
            
            <section>
                <h2>Statistique</h2>
                <div class="row">

                  <div class="col-lg-3 col-6">
                    <div class="info-box box1" align="center">
                      <div class="text-box">
                        <h3>23</h3>

                        <p>Utilisateurs</p>
                      </div>
                      <div class="icon-box">
                        
                      </div>
                      <div class="info-box-footer">
                        <a href="stats/utilisateur.php">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
    
                  <div class="col-lg-3 col-6" align="center">
                    <div class="info-box box2" >
                      <div class="text-box">
                        <h3>53%</h3>
                        <p>De participation</p>
                      </div>
                      <div class="icon-box">
                        
                      </div>
                      <div class="info-box-footer">
                        <a href="stats/taux-participation.php">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
         
                  <div class="col-lg-3 col-6" align="center">
                    <div class="info-box box3">
                      <div class="text-box">
                        <h3>3</h3>
                        <p>News</p>
                      </div>
                      <div class="icon-box">
                        
                      </div>
                      <div class="info-box-footer">
                        <a href="stats/news.php">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
       
                  <div class="col-lg-3 col-6" align="center">
                    <div class="info-box box4">
                      <div class="text-box">
                        <h3>25</h3>
                        <p>Commentaires</p>
                      </div>
                      <div class="icon-box">   
                      </div>
                      <div class="info-box-footer">
                        <a href="stats/commentaire.php">More info <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>  
            </section>
            <br>
            <h2>ChatBox - Commentaires  </h2>
            <div class="Chatbox-Commentaires">

                <div class="chat-box-w-header">
                    <div class="header-chat">
                        <center><h6>ChatBox</h6></center>
                    </div> 

                    <div class="chat-box-wi-header">
                        <div class="utilisateur-d">
                            <a href="#" class="destinataire">
                                <span>Skyrise_</span>
                                <br>
                                <img class="avatar" width='30' src="https://minotar.net/helm/fleurdeskyrise" onmouseover="this.src='https://minotar.net/avatar/fleurdeskyrise'" onmouseout="this.src='https://minotar.net/helm/fleurdeskyrise'"/> 
                            </a>
                            <span class="message-d">Woaw mais quel est cette merveille GROS BG ?! </span>
                        </div>

                        <br>

                        <div class="utilisateur-e">
                            
                            <a href="#" class="expediteur" >
                                <span class="pseudo-expediteur">Gold_Natoun</span>
                                <br>
                                <img class="avatar" width='30' src="https://minotar.net/helm/Gold_Natoun" onmouseover="this.src='https://minotar.net/avatar/Gold_Natoun'" onmouseout="this.src='https://minotar.net/helm/Gold_Natoun'"/> 
                            </a>    
                            <span class="message-e">Salut skyrise bienvenue dans ce nouveau panel ! </span>

                            <br>
                        </div>
                    </div>

                    <form method="POST" action="">
                        <div class="input-group-append">
                            <input type="texte" name="chat" class="champ form-control" >
                            <input type="submit" name="send" class="submit-chat">
                        </div>
                    </form>

                </div>

                <div class="commentaires-box-w-header">
                    <div class="header-chat">
                        <center><h6>Derniers Commentaires</h6></center>
                    </div>  
                    <div class="commentaire-box-wi-header">
                        <div class="commentaire" style="background-color: #F2F2F2;">
                            <center>
                                <a href="#" style="background-color: #9A9A9A ; color: white ; border-radius : 6px; padding: 0.5em; white-space: nowrap;" class="bold">
                                    <img width='30' src="https://minotar.net/helm/Gold_Natoun" onmouseover="this.src='https://minotar.net/avatar/Gold_Natoun'" onmouseout="this.src='https://minotar.net/helm/Gold_Natoun'"/> 
                                    <span class="Gouverneur">Gouverneur</span>
                                    <span>Gold_Natoun</span>
                                </a>
                                <br>
                                <span>06/10/2020</span>
                                <br> 
                                <span class="textCommentaire">Ceci est un commentaire</span>
                            </center>
                        </div>
                        <br>
                        <div class="commentaire" style="background-color: #F2F2F2;">
                            <center>
                                <a href="#" style="background-color: #9A9A9A ; color: white ; border-radius : 6px; padding: 0.5em; white-space: nowrap;" class="bold">
                                    <img width='30' src="https://minotar.net/helm/Gold_Natoun" onmouseover="this.src='https://minotar.net/avatar/Gold_Natoun'" onmouseout="this.src='https://minotar.net/helm/Gold_Natoun'"/> 
                                    <span class="Gouverneur">Gouverneur</span>
                                    <span>Gold_Natoun</span>
                                </a>
                                <br>
                                <span>06/10/2020</span>
                                <br> 
                                <span class="textCommentaire">Ceci est un commentaire</span>
                            </center>
                        </div>
                        <br>
                        <div class="commentaire" style="background-color: #F2F2F2;">
                            <center>
                                <a href="#" style="background-color: #9A9A9A ; color: white ; border-radius : 6px; padding: 0.5em; white-space: nowrap;" class="bold">
                                    <img width='30' src="https://minotar.net/helm/Gold_Natoun" onmouseover="this.src='https://minotar.net/avatar/Gold_Natoun'" onmouseout="this.src='https://minotar.net/helm/Gold_Natoun'"/> 
                                    <span class="Gouverneur">Gouverneur</span>
                                    <span>Gold_Natoun</span>
                                </a>
                                <br>
                                <span>06/10/2020</span>
                                <br> 
                                <span class="textCommentaire">Ceci est un commentaire</span>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="to-do-list">
                <table border="1">
                  <tr>
                    <th colspan="3" class="to-do-list-header">
                      <center><h6>TO-DO-LIST</h6></center>
                    </th>
                  </tr>
                  <tr align="center">
                    <th>fini ?</th>
                    <th>Tâches</th>
                    <th>Status</th>
                  </tr>
                  <tr align="center">
                    <td><a><i class="fal fa-stop"></i></a></td>
                    <td>mettre dans les log les modification des bio</td>
                    <td>A FAIRE</td>
                  </tr align="center">
                  <tr align="center">
                    <td><a><i class="fal fa-stop"></i></a></td>
                    <td>rendre les "dernier commentaire" sur le profil de quelqu'un lié par son UUID et non son pseudo</td>
                    <td>A FAIRE</td>
                  </tr>
                  <tr align="center">
                    <td><a><i class="fal fa-stop"></i></a></td>
                    <td>modifier automatiquement les nouveau pseudo</td>
                    <td>A FAIRE</td>
                  </tr>
                  <tr align="center">
                    <td><a><i class="fal fa-stop"></i></a></td>
                    <td>rendre la page gouvernement dynamique</td>
                    <td>A FAIRE</td>
                  </tr>
                  <tr align="center">
                    <td><a><i class="fal fa-stop"></i></a></td>
                    <td>esseyer de rendre la page ville dynamique</td>
                    <td>A FAIRE</td>
                  </tr>
                  <tr align="center">
                    <td><a><i class="fal fa-stop"></i></a></td>
                    <td>modifier le systeme admin</td>
                    <td>A FAIRE</td>
                  </tr>
                </table>
                <form method="POST" action="">
                  <div class="input-group-append">
                      <input type="texte" name="chat" class="champ form-control" >
                      <input type="submit" name="send" class="submit-chat" value="rajouter">
                  </div>
                </form>
            </div>
            <br>
            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <?php include("css/footer.php"); ?>
    </div>
</body>

</html>