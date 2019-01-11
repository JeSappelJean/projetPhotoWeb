
      <header>
        <!--Création du premier article contenant les infos sur la livraison premium-->
        <article>
            <a href="https://www.photoweb.fr/livraison-gratuite">
                <div>
                    <!--Affiche de l'image-->
                  <img src="../data/imagesSite/colis.png" alt="ImageBoitePhotoWeb">
                </div>

                <div>
                    <!--Affichage du texte-->
                  <p><b><span class="bleu">ABONNEMENT LIVRAISON PREMIUM :</span> <span class="blanc">  Livraison gratuite et illimitée !   <span class="souligne">> Je découvre</span></span></b></p>
                </div>
            </a>
        </article>

        <!--Création de la section contenant les numéros de téléphone-->
        <section>
          <p>
              <!--Lien menant vers le site PhotoWeb pour l'assistance-->
            <a href="https://www.photoweb.fr/espace_contact/espace-contact.asp">ASSISTANCE : <b>0 820 220 108</b></a> -
            <a href="https://www.photoweb.fr/espace_contact/espace-contact.asp">SUIVI DE COMMANDE : <b>09 69 32 05 36</b></a>
          </p>
        </section>

        <!--Création de la section contenant les menus-->
        <nav id="conteneur1">
          <div>

            <p><b>Sourire Garanti</b></p>
          </div>
          <!-- Affichage du logo + lien vers l'Accueil -->
          <div>
            <a href="../controleur/controleurAccueil.php"><img src="../data/imagesSite/LogoPhotoweb.png" alt="ImageLogoPhotoWeb"></a>
          </div>
          <!-- Liens vers différentes parties du site photoWeb  -->
          <div>
              <a href="https://www.photoweb.fr/moncompte/Account/LogOn?ReturnUrl=%2fmoncompte%2fcreations"> <img width= 75px; height=75px; src="../data/imagesSite/Créations.png" alt="pinceau"></a>
              <a href="https://www.photoweb.fr/moncompte/Account/LogOn?ReturnUrl=%2fmoncompte%2fphotos"> <img width= 75px; height=75px; src="../data/imagesSite/MesPhotos.png" alt="cadre"></a>
              <a href="https://www.photoweb.fr/moncompte/Account/LogOn?ReturnUrl=%2fmoncompte%2f"> <img width= 75px; height=75px; src="../data/imagesSite/Compte.png" alt="user"></a>
              <a href="https://www.photoweb.fr/moncompte/Account/LogOn?ReturnUrl=%2fPanier"> <img width= 75px; height=75px; src="../data/imagesSite/Panier.png" alt="panier"></a>
              <br>
              <!-- Vérifie si l'utilisateur est connecté ou non et affiche des textes différents en conséquence -->
              <?php
                if (isset($_SESSION['login'])){
                  echo $_SESSION['login'], " est connecté ";
                  echo "<a style=\"text-decoration:none; color:black; font-weight:bold; margin-left:5px;\" href=\"../controleur/controleurDeconnexion.php\">Deconnexion</a>";
                } else {
                  echo "<a style=\"text-decoration:none; color:black; font-weight:bold; margin-right:5px;\" href=\"../controleur/afficherVueConnexion.ctrl.php\">Connexion</a>";
                  echo "<a style=\"text-decoration:none; color:black; font-weight:bold; margin-right:5px;\" href=\"../controleur/afficherVueInscription.ctrl.php\">Inscription</a>";
                }
              ?>
          </div>
        </nav>

        <nav>
          <ul>
            <!-- Lien vers des parties du site photoWeb ou du projet dans des menus-->
            <li>
              <!-- Lien vers la création des Livres-->
              <a href="#" class="menuLivres" title="Livre photo">Livre photo</a>
              <ul class="sousMenu">
                <li><a href="../controleur/afficherVueCreationLivre.ctrl.php" class="menuLivres" title="Livre photo">Créer un Livre</a></li>
              </ul>
            </li>
            <!-- Lien vers site PhotoWeb -->
            <li><a href="https://www.photoweb.fr/produits/calendrier-agenda-photo#muraux" title="Calendrier & Agenda">Calendrier & Agenda</a></li>
            <!-- Lien vers site PhotoWeb -->
            <li><a href="https://www.photoweb.fr/produits/tirage-photo" title="Tirages Photo">Tirages Photo</a></li>
            <!-- Lien vers site PhotoWeb -->
            <li><a href="https://www.photoweb.fr/promotion/code-promo" title="Promos">Promos</a></li></li>
            <!-- Lien vers site PhotoWeb -->
            <li><a href="https://www.photoweb.fr/promotion/cadeau-photo-noel.asp" title="Cadeaux Noël">Cadeaux Noël</a></li>
            <!-- Lien vers la partie Template-->
            <li><a href="#" class="" title="Template">Template</a>
              <ul class="sousMenu">
                <!-- Lien vers l'outil de création de Template-->
                <li><a href="../controleur/afficherVueCreationTemplate.ctrl.php" class="menuLivres" title="CréerTemplate">Créer un template</a></li>
                <!-- Lien vers Mes templates -->
                <li><a href="../controleur/afficherVueMesTemplates.ctrl.php" class="menuLivres" title="MesTemplates">Templates</a></li>
              </ul>
            </li>
            <!-- Lien vers la page de Concours -->
            <li><a href="../controleur/afficherVueMonthTheme.ctrl.php" title="Concours">Concours</a></li>

          </ul>
      </nav>

      </header>
