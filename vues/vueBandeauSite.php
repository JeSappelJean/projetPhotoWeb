
      <header>

        <article>
            <a href="https://www.photoweb.fr/livraison-gratuite">
                <div>
                  <img src="../data/imagesSite/colis.png" alt="ImageBoitePhotoWeb">
                </div>

                <div>
                  <p><b><span class="bleu">ABONNEMENT LIVRAISON PREMIUM :</span> <span class="blanc">  Livraison gratuite et illimitée !   <span class="souligne">> Je découvre</span></span></b></p>
                </div>
            </a>
        </article>

        <section>
          <p>
            <a href="https://www.photoweb.fr/espace_contact/espace-contact.asp">ASSISTANCE : <b>0 820 220 108</b></a> - <a href="https://www.photoweb.fr/espace_contact/espace-contact.asp">SUIVI DE COMMANDE : <b>09 69 32 05 36</b></a>
          </p>
        </section>

        <nav id="conteneur1">
          <div>
            <p><b>Sourire Garanti</b></p>
          </div>

          <div>
            <a href="../vues/vueAccueil.php">
            <img src="../data/imagesSite/LogoPhotoweb.png" alt="ImageLogoPhotoWeb"></a>
          </div>

          <div>
              <a href="https://www.photoweb.fr/moncompte/Account/LogOn?ReturnUrl=%2fmoncompte%2fcreations"> <img width= 75px; height=75px; src="../data/imagesSite/Créations.png" alt="pinceau"></a>
              <a href="https://www.photoweb.fr/moncompte/Account/LogOn?ReturnUrl=%2fmoncompte%2fphotos"> <img width= 75px; height=75px; src="../data/imagesSite/MesPhotos.png" alt="cadre"></a>
              <a href="../vues/vueCompte.php"> <img width= 75px; height=75px; src="../data/imagesSite/Compte.png" alt="user"></a>
              <a href="https://www.photoweb.fr/moncompte/Account/LogOn?ReturnUrl=%2fPanier"> <img width= 75px; height=75px; src="../data/imagesSite/Panier.png" alt="panier"></a>

              <?php
              if (isset($_SESSION['login'])){
                echo $_SESSION['login'], " est connecté";
                echo "<a href=\"../controleur/controleurDeconnexion.php\">Deconnexion</a>";
              } else {
                echo "<a href=\"../vues/vueConnexion.php\">Connexion</a>";
                echo "<a href=\"../vues/vueInscription.php\">Inscription</a>";
              }


               ?>
          </div>
        </nav>

        <nav>
          <ul>

            <li>
              <a href="#" class="menuLivres" title="Livre photo">Livre photo</a>
              <ul class="sousMenu">
                <li><a href="../controleur/afficherVueCreationLivre.ctrl.php" class="menuLivres" title="Livre photo">Créer un Livre</a></li>
                <li><a href="#" class="menuLivres" title="Livre photo">Categorie 2</a></li>
              </ul>
            </li>

            <li><a href="https://www.photoweb.fr/produits/calendrier-agenda-photo#muraux" title="Calendrier & Agenda">Calendrier & Agenda</a></li>

            <li><a href="https://www.photoweb.fr/produits/tirage-photo" title="Tirages Photo">Tirages Photo</a></li>

            <li><a href="https://www.photoweb.fr/promotion/code-promo" title="Promos">Promos</a></li></li>

            <li><a href="https://www.photoweb.fr/promotion/cadeau-photo-noel.asp" title="Cadeaux Noël">Cadeaux Noël</a></li>

            <li><a href="#" class="" title="Template">Template</a>
              <ul class="sousMenu">
                <li><a href="../controleur/afficherVueCreationTemplate.ctrl.php" class="menuLivres" title="Template">Créer un template</a></li>
                <li><a href="../controleur/afficherVueMesTemplates.ctrl.php" class="menuLivres" title="Livre photo">Mes Templates</a></li>
              </ul>
            </li>

          </ul>
      </nav>

      </header>
