<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'app/views/includes/head.php' ?>
</head>
<body class="font-quicksand">
    <div class="container-fluid p-0 d-none d-lg-flex">   
        <!-- sidebar -->
        <?php include 'app/views/includes/sidebar.php'?>
        <!-- Content -->
        <main class="col-10">
        <!-- header -->
        <?php include 'app/views/includes/navbar.php'?>
        <?php include $views ?>
        </main>
    </div>
    <?php include 'app/views/includes/notfound.php' ?>
</body>
<script src="app/assets/js/preview.js">
const USER_ID = <?= $_SESSION['person']['id'] ?>;
</script>
</html>