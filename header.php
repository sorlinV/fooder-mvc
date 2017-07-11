<?php
include_once 'lib/Data.php';
include_once 'lib/Date.php';
include_once 'lib/User.php';
include_once 'lib/Event.php';
if (!isset($data)) {
    $data = new Data();
}
if (session_status() != 2) {
    session_start();
}

?>
<header>
    <a href="index.php"><img src="img/logo.png" id="logo" alt="logo fooder"></a>
    <ul>
<!--                <li><a href="index.php">Index</a></li>-->
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
    if (isset($_SESSION['user'])) {
        echo '<p style="color: white; font-size: 2em; text-decoration: underline;">' . $_SESSION['user']->getUser() . '</p>';
        include 'libaff/formDeconnection.html';
    } else {
        include 'libaff/formConnect.html';
    }
    ?>
</header>