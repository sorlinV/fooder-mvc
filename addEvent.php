<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Event</title>
</head>
<body>
<?php
include_once 'header.php'; ?>
<main>
    <?php
    if (!empty($_GET['error']) && $_GET['error'] == 1) : ?>
        <form action="">
            <p class="error">One field is wrong !</p>
        </form>
    <?php elseif (!empty($_GET['error']) && $_GET['error'] == 2) : ?>
        <form action="">
            <p class="error">This event is already create (change title) !</p>
        </form>
    <?php endif;
    include 'libaff/formAddEvent.php';
    ?>
</main>
</body>
</html>