<?php
if (!isset($data)) {
    $data = new Data();
}
if (session_status() != 2) {
    session_start();
}
if (!empty($_SESSION['user'])) :
$user = $data->getUser($_SESSION['user']->getUser());
?>
<form enctype="multipart/form-data" action="action/editUser.php" method="post">
    <h2><?php echo $user->getUser(); ?></h2>
    <label for="password">Password :</label>
    <input type="password" name="password">
    <label for="password2">Confirm password :</label>
    <input type="password" name="password2">
    <label for="lastname">Lastname :</label>
    <input type="text" name="lastname" value="<?php echo $user->getLastname() ?>">
    <label for="firstname">Firstname :</label>
    <input type="text" name="firstname" value="<?php echo $user->getFirstname() ?>">
    <label for="adresse">Adresse :</label>
    <input type="text" name="adresse" value="<?php echo $user->getAdresse() ?>">
    <label for="avatar">Avatar (optional) :</label>
    <img src="<?php echo $user->getImg(); ?>" alt="<?php echo $user->getUser(); ?> avatar"/>
    <input type="file" name="avatar">
    <input type="submit" value="Edit">
</form>
<?php endif; ?>