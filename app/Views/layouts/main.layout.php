<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--  bootstrap 4.00  -->
    <link rel="stylesheet" href="<?php echo assets('css/bootstrap.min.css'); ?>">
    <!--  custom styles  -->
    <link rel="stylesheet" href="<?php echo assets('css/style.css'); ?>">

    <title>Document</title>
</head>
<body>
<div class="container h-100">
<?php flash_message(); ?>
<?php include $page; ?>

</div>
</body>
</html>