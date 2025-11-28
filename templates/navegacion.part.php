<?php

use App\Utils\Utils;
?>

<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="#page-top">
        <span>[PHOTO]</span>
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="menu">
      <ul class="nav navbar-nav">
        <?php
        if (Utils::esOpcionMenuActiva('/') == true) {
          echo '<li class="active lien">';
        } else {
          echo '<li class="lien">';
        }
        ?>
        <a href="/"><i class="fa fa-windows sr-icons"></i> Home</a></li>

        <?php
        if (Utils::esOpcionMenuActiva('/about') == true) {
          echo '<li class="active lien">';
        } else {
          echo '<li class="lien">';
        }
        ?>
        <a href="/about"><i class="fa fa-bookmark sr-icons"></i> About</a></li>

        <li class="<?= Utils::esOpcionMenuActiva('/registro') ? 'active' : '' ?> lien">
          <a href="<?= Utils::esOpcionMenuActiva('/registro') ? '#' : '/registro' ?>">
            <i class="fa fa-user sr-icons"></i> Registro</a></li>

            <?php if (is_null($app['user'])) : ?>
              <?php if (Utils::esOpcionMenuActiva('/login') == true) echo '<li class="active lien">';
              else echo '<li class=" lien">'; ?>
              <a href="/login"><i class="fa fa-sign-in sr-icons"></i> Login</a>
        </li>
      <?php else : ?>

        <?php
              if (Utils::esOpcionMenuActiva('/galeria') == true) {
                echo '<li class="active lien">';
              } else {
                echo '<li class="lien">';
              }
        ?>
        <a href="/galeria"><i class="fa fa-photo sr-icons"></i> Galeria</a></li>
        
        <?php
              if (Utils::esOpcionMenuActiva('/exposiciones') == true) {
                echo '<li class="active lien">';
              } else {
                echo '<li class="lien">';
              }
        ?>
        <a href="/exposiciones"><i class="fa fa-book sr-icons"></i> Exposiciones</a></li>

        <?php
              if (Utils::esOpcionMenuActiva('/asociados') == true) {
                echo '<li class="active lien">';
              } else {
                echo '<li class="lien">';
              }
        ?>
        <a href="/asociados"><i class="fa fa-cloud sr-icons"></i> Asociados</a></li>

        <?php if (Utils::esOpcionMenuActiva('/logout') == true) echo '<li class="active lien">';
              else echo '<li class=" lien">'; ?>
        <a href="/logout"><i class="fa fa-sign-out sr-icons"></i> <?= ucfirst($app['user']->getUsername()) ?></a></li>
      <?php endif; ?>

      <?php
      if (Utils::esOpcionMenuActiva('/blog') == true) {
        echo '<li class="active lien">';
      } else {
        echo '<li class="lien">';
      }
      ?>
      <a href="/blog"><i class="fa fa-file-text sr-icons"></i> Blog</a></li>

      <?php
      if (Utils::esOpcionMenuActiva('/contact') == true) {
        echo '<li class="active lien">';
      } else {
        echo '<li class="lien">';
      }
      ?>
      <a href="/contact"><i class="fa fa-envelope sr-icons"></i> Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- End of Navigation Bar -->