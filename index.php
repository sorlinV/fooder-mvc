<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FOODer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
        <?php include_once 'header.php';?>
        <main>
            <article class="index">
                <?php if (!empty($_SESSION['user'])) : ?>
                    <h2>Hello, <?php echo unserialize($_SESSION['user'])->getUser() ?> ! </h2>
                    <h2>Do a search : </h2>
                    <a href="search.php"><p>SEARCH</p></a>
                    <h2>Or create an event : </h2>
                    <a href="addEvent.php"><p>ADDEVENT</p></a>
                <?php else : ?>
                    <h2>Register : </h2>
                    <a href="register.php"><p>REGISTER</p></a>
                    <h2>Connect : </h2>
                    <a href="connect.php"><p>Connections</p></a>
                <?php endif; ?>
            </article>
            <?php include 'libaff/affEvents.php'?>
        </main>
    </body>
</html>