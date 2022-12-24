<?php
require_once "ProdList/Initiate/initiate-front.php";
?>
<!DOCTYPE HTML>
<html>

<head>
    <?php $FrontController->getHeader(); ?>
</head>

<body>
    <?php $FrontController->getContent(); ?>
    <?php $FrontController->getLibraries(); ?>
    <script>
        <?php $FrontController->getScript(); ?>
    </script>
</body>

</html>