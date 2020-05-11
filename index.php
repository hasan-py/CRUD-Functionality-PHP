<!-- connect to database -->
<?php include "controllerFunction/dbConnect.php" ?>

<!-- header -->
<?php include "partials/header.php" ?>

<!-- Controller Function -->
<?php include "controllerFunction/controller.php" ?>

<!-- Main Content -->
<?php include "content.php" ?>

<!-- Modal For Delete and Edit -->
<?php include "partials/modal/editModal.php" ?>
<?php include "partials/modal/deleteModal.php" ?>

<!-- Script and Footer -->
<?php include "partials/script.php" ?>
<?php include "partials/footer.php" ?>
