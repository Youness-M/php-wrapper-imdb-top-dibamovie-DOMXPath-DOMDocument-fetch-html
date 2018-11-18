<?php
    include ('public/config/config.php');

    @$controller=$_GET['c']?$_GET['c']:'index';
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/css.css">
    <script src="public/js/jquery-1.10.2.min.js"></script>
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/jquery-ui.js"></script>


    <title><?php echo $controller; ?> wrapper</title>
</head>
<body>

<?php


    if (file_exists('controllers/C'.$controller.'.php')){

        include ('controllers/C'.$controller.'.php');

    }else{

        echo 'error 404';
    }


?>

</body>
</html>


