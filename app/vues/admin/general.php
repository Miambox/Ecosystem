<div class="general">
  <h1> Eco'Admin <h1>

    <h2> Comment gérer votre site ? <h2><br>

      <div class="container">

        <?php
        if($_SESSION['type'] == "administrateur") {
          ?>
          <div class="faq">
            <a href="<?=ROOT_URL?>?Route=admin&amp;Ctrl=faq&amp;Vue=faq">
            <p>
              <img class="crayon" src="<?=ROOT_URL?>static/image/icon/crayon.png">
              Éditez votre FAQ
            </p>
          </div>
          <?php
        } else {
          ?>
          <div class="faq" style="margin: auto;">
            <a href="<?=ROOT_URL?>?Route=admin&amp;Ctrl=faq&amp;Vue=faq">
            <p>
              <img class="crayon" src="<?=ROOT_URL?>static/image/icon/crayon.png">
              Éditez votre FAQ
            </p>
          </div>
          <?php

        }
        ?>

        <?php
        if($_SESSION['type'] == "administrateur") {
          ?>
          <div class ="mentionsLegales">
            <a href="<?=ROOT_URL?>?Route=admin&amp;Ctrl=mentionsLegales&amp;Vue=mentionsLegales">
              <p>
                <img class="crayon" src="<?=ROOT_URL?>static/image/icon/crayon.png">
                Éditez vos Mentions Légales
              </p>
            </div>
          <?php
        }
        ?>
        <?php
        if($_SESSION['type'] == "administrateur") {
          ?>
          <div class ="cgu">
            <a href="<?=ROOT_URL?>?Route=admin&amp;Ctrl=general&amp;Vue=cgu">
              <p>
                <img class="crayon" src="<?=ROOT_URL?>static/image/icon/crayon.png">
                Éditez votre CGU
              </p>
            </div>
          <?php
        }
        ?>
    </div>
</div>
