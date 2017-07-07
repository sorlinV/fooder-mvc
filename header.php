<?php
include_once 'lib/Data.php';
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
        <li><a href="index.php">Index</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href="addEvent.php">AddEvent</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="profil.php">Profil</a></li>
    </ul>
    <?php
    if (isset($_SESSION['user'])) {
        echo $_SESSION['user']->getUser();
        include 'libaff/formDeconnection.html';
    } else {
        include 'libaff/formConnect.html';
    }
    ?>
</header>