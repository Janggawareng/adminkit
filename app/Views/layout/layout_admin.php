<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="\assets\adminkit\icon.png" type="image/x-icon">
    <link rel="stylesheet" href="\assets\adminkit\dark.css">
    <link rel="stylesheet" href="\assets\fonts\inter.css">
    <link rel="stylesheet" href="\assets\fontawesome\all.css">
    <link rel="stylesheet" href="\assets\sweetalert2\dark.css">
    <title><?= $title ?></title>
</head>

<!--
  HOW TO USE: 
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<body data-theme="dark" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">

    <div class="preloader text-center">
        <div class="loading">
            <img src="\assets\images\loading\brick.svg" width="75">
            <p>now loading, please wait...</p>
        </div>
    </div>

    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="/admin">
                    <span class="sidebar-brand-text align-middle">
                        myPOS
                        <sup><small class="badge bg-primary text-uppercase">Pro</small></sup>
                    </span>
                </a>

                <div class="sidebar-user">
                    <div class="d-flex justify-content-center">
                        <div class="flex-shrink-0">
                            <img src="\assets\images\users\user.png" class="avatar img-fluid rounded me-1" />
                        </div>
                        <div class="flex-grow-1 ps-2">
                            <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <?= $user['nama_user'] ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-start">
                                <a class="dropdown-item" href="#"><i class="fal fa-user align-middle me-1"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout"><i class="fal fa-lock align-middle me-1"></i> Log out</a>
                            </div>

                            <div class="sidebar-user-subtitle">
                                <small class="badge bg-success"><?= $user['nama_app'] ?></small>
                            </div>

                        </div>
                    </div>
                </div>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Features
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin">
                            <i class="fal fa-analytics align-middle"></i> <span class="align-middle"> Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Database
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/app">
                            <i class="fal fa-database align-middle"></i> <span class="align-middle"> Aplikasi</span>
                        </a>
                        <a class="sidebar-link" href="/admin/user">
                            <i class="fal fa-database align-middle"></i> <span class="align-middle"> User</span>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item">
                            <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
                                <div class="position-relative">
                                    <i class="fal fa-screencast"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="\assets\images\users\user.png" class="avatar img-fluid rounded">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i class="fal fa-user align-middle me-1"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout"><i class="fal fa-lock align-middle me-1"></i> Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    <?= $this->renderSection('content') ?>
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-sm-6 text-start">
                            <p class="mb-0">
                                <a href="/admin" class="text-muted"><strong>myPOS</strong></a> &copy; <?= date('Y') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="\assets\adminkit\app.js"></script>
    <script src="\assets\sweetalert2\dark.js"></script>
    <script src="\assets\autonumeric\autoNumeric.js"></script>

    <!-- Sweetalert2 -->
    <?php if (session()->getFlashdata('true')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: '<?= session('true') ?>',
                showConfirmButton: true,
                timer: 1000
            })
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('false')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= session('false') ?>',
                showConfirmButton: true,
                timer: 1000
            })
        </script>
    <?php endif; ?>

    <!-- Preloader -->
    <script>
        $(document).ready(function() {
            $(".preloader").fadeOut();
        });
    </script>

    <!-- Autonumeric -->
    <script>
        jQuery(function($) {
            $('.desimal').autoNumeric('init', {
                aSep: ',',
                aDec: '.',
                mDec: '0'
            });
        });
    </script>

    <!-- Form Confirm -->
    <script>
        function confirmSubmit() {
            var agree = confirm("Apakah anda yakin, ingin melanjutkan proses ini?");
            if (agree) return true;
            return false;
        }
    </script>

</body>

</html>