<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page-title']; ?> | Scxlyrics</title>
    <link rel="icon" href="<?= asset('image/Logo/logo.png') ?>">

        <link rel="stylesheet" href="<?= asset('css/style.css?v2') ?>">

        <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">

        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

</head>
<body>
    
<nav class="navbar fixed-top">
  <div class="container">
    
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon text-white"></span>
    </button>
    <span class="fw-bold text-white fs-4"><a class="text-white" href="<?= url('/') ?>">Scxlyrics</a></span>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title ms-2" id="offcanvasNavbarLabel">Sidebar</h5>
        <button type="button" class="btn-close me-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body ms-3 mt-3">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">   
            <li class="nav-item my-1">
                <a href="<?= url('dashboard/') ?>" class="nav-link d-flex align-items-center <?php if($data['page-title'] == 'Dashboard') : ?> side-active <?php endif; ?>" aria-current="page">
                    <div class="me-1"><i class='bx bxs-home'></i> </div>
                    <div class="ms-1"><span>Dashboard</span></div>
                </a>
            </li>    
            <li class="nav-item my-1">
                <a href="<?= url('lyrics/') ?>" class="nav-link d-flex align-items-center <?php if($data['page-title'] == 'Lyrics Data') : ?> side-active <?php endif; ?>" aria-current="page">
                    <div class="me-1"><i class='bx bxs-notepad'></i> </div>
                    <div class="ms-1"><span>Data Lyrics</span></div>
                </a>
            </li>
            <li class="nav-item my-1">
                <a href="<?= url('genre/') ?>" class="nav-link d-flex align-items-center <?php if($data['page-title'] == 'Genre Data') : ?> side-active <?php endif; ?>" aria-current="page">
                    <div class="me-1"><i class='bx bx-task'></i> </div>
                    <div class="ms-1"><span>Data Genre</span></div>
                </a>
            </li>
            <li class="nav-item my-1">
                <a href="<?= url('artist/') ?>" class="nav-link d-flex align-items-center" aria-current="page">
                    <div class="me-1"><i class='bx bxs-user-detail'></i> </div>
                    <div class="ms-1"><span>Data Artist</span></div>
                </a>
            </li>
            <?php if($_SESSION['admin']['level'] == 'superadmin') : ?>
                <li class="nav-item my-1">
                    <a href="<?= url('admin/') ?>" class="nav-link d-flex align-items-center <?php if($data['page-title'] == 'Admin Data') : ?> side-active <?php endif; ?>" aria-current="page">
                        <div class="me-1"><i class='bx bxs-user-account'></i> </div>
                        <div class="ms-1"><span>Data Admin</span></div>
                    </a>
                </li>
                <li class="nav-item my-1">
                    <a href="<?= url('user/') ?>" class="nav-link d-flex align-items-center <?php if($data['page-title'] == 'User Data') : ?> side-active <?php endif; ?>" aria-current="page">
                        <div class="me-1"><i class='bx bxs-user'></i> </div>
                        <div class="ms-1"><span>Data User</span></div>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
        <div class="ms-4">
            <form action="<?= url('auth/logout') ?>" method="post" class="py-1 px-3" style="margin-top: 100%;">
                <button class="btn btn-outline-danger"><i class='bx bxs-log-out'></i> logout</button>
            </form>
        </div>
      </div>
    </div>
    <span class="navbar-brand text-white"><?= $_SESSION['admin']['username'] ?></span>
  </div>
</nav>  


<div class="dash-body container" style="margin-top: 100px; margin-bottom: 100px;">  