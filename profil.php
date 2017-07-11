<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Profil</title>
</head>
<body>
    <?php
        include 'header.php';
    if (isset($_SESSION['user']) && isset($_GET['edit']) && $_GET['edit'] == "1") {
        include 'libaff/editUser.php'; ?>
        <form action="" method="get">
            <button name="edit" value="0">Cancel</button>
        </form>
    <?php } elseif (isset($_SESSION['user'])) {
        include 'libaff/affUser.php'; ?>
        <form action="" method="get">
            <button name="edit" value="1">Edit profil</button>
        </form>
    <?php } else { ?>
    <article class="index">
        <h2>Before consulting profil: </h2>
        <h2>Register : </h2>
        <a href="register.php"><p>REGISTER</p></a>
        <h2>Connect : </h2>
        <a href="connect.php"><p>Connections</p></a>
    </article>
    <?php } ?>
</body>
</html>