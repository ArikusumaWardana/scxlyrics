<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-5 py-2">
      <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarSupportedContent">
        <?php if(isset($_SESSION['logged'])) : ?>
            <ul class="navbar-nav">
              <li class="nav-item dropdown user-drop">
                <a class="nav-link drop-toggle d-flex align-items-center me-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php if(!empty($_SESSION['user']['username'] ?? $_SESSION['admin']['admin_name'])) : ?>
                    <div class="fw-bold me-2 text-white"><?= $_SESSION['user']['username'] ?? $_SESSION['admin']['admin_name'] ?> </div>
                    <div class=""><i class='bx bxs-user-circle user-profile-icon fs-2' style='color:#ffffff'></i></div>
                  <?php endif; ?>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <?php if(!empty($_SESSION['admin']['level'])) : ?>
                    <li><a class="dropdown-item" href="<?= url('dashboard/') ?>">Dashboard</a></li>
                  <?php endif; ?>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal" href="#">Log Out</a></li>
                </ul>
              </li>
            </ul>
          <?php else : ?>
            <div class="btn-login">
                <a class="fw-bold" href="<?= url('auth/login') ?>">Login</a>
            </div>
        <?php endif; ?>
      </div>
    </div>
</nav>