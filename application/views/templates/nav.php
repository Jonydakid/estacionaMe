<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="<?= site_url() ?>">Estaci-on</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Acerca de nosotros</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link js-scroll-trigger" href="#projects">Proyecto</a>
          </li>
          <?php if (isset($_SESSION['nomUsuario']) && $_SESSION['logged_in'] === true) : ?>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="<?= site_url('logout') ?>">Logout</a>
                </li>
              <?php else : ?>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="<?= site_url('registrar') ?>">Registrar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="<?= site_url('login') ?>">Login</a>
                </li>
              <?php endif; ?>
            </ul>
          </div>
    </div>
  </nav>