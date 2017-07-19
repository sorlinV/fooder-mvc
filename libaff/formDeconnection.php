<form action="action/login.php" method="POST">
    <a href="profil.php"><h2><?php echo unserialize($_SESSION['user'])->getUser() ?></h2></a>
    <input type="submit" name="deco" value="Deconnection">
</form>
