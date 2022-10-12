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
    <link rel="stylesheet" href="\assets\sweetalert2\light.css">
    <title></title>
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

    <main class="d-flex w-100 h-100">
        <?= $this->renderSection('content'); ?>
    </main>

    <script src="\assets\jquery\jquery.min.js"></script>
    <script src="\assets\adminkit\app.js"></script>
    <script src="\assets\sweetalert2\light.js"></script>
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

    <!-- Data Tables -->
    <script>
        // $("#myTable").DataTable({
        //     "responsive": true,
        //     "aLengthMenu": [
        //         [5, 10, 50, -1],
        //         [5, 10, 50, "All"]
        //     ],
        //     "iDisplayLength": 10,
        //     "language": {
        //         search: ""
        //     },
        //     "ordering": false
        // });
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