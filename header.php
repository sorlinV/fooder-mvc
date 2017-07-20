<?php
include_once 'lib/Data.php';
include_once 'lib/Date.php';
include_once 'lib/User.php';
include_once 'lib/Event.php';
if (!isset($data)) {
    $data = new Data();
}
?>
<header>
    <ul>
        <li><a href="index.php"><img src="img/logo.png" id="logo" alt="logo fooder"></a></li>
        <li><a href="index.php"><h2>FOODer</h2></a></li>
        <li><a href="search.php">Search</a></li>
        <?php if (isset($_SESSION['user'])) : ?>
            <li><a href="addEvent.php">AddEvent</a></li>
            <li><a href="profil.php">Profil</a></li>
        <?php else : ?>
            <li><a href="connect.php">Connect</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
    </ul>
    <?php
    if (isset($_SESSION['user'])) { ?>
        <?php include 'libaff/formDeconnection.php';
    } else {
        include 'libaff/formConnect.html';
    }
    ?>
</header>