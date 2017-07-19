<?php
$pageName = "$_SERVER[REQUEST_URI]";
if (!isset($data)) {
    $data = new Data();
}

$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
if ((!empty($get['searched']) && in_array('users', $get['searched']) !== false)
    || (empty($get['searched']) && empty($get['tags']))) {
    foreach ($data->searchUsers($get['search']) as $u) : ?>
        <article class="user">
            <img src="<?php echo $u->getImg(); ?>" alt="<?php echo $u->getUser(); ?> avatar"/>
            <aside>
                <h2><?php echo $u->getUser(); ?></h2>
            </aside>
            <?php if (!empty($_SESSION['user'])
                && in_array(unserialize($_SESSION['user'])->getUser(), $u->getFollowers()) === false
                && $u->getUser() != unserialize($_SESSION['user'])->getUser()) : ?>
                <form action="action/subUser.php" method="POST">
                    <input type="hidden" name="dir" value="<?php echo basename($pageName); ?>"/>
                    <input type="hidden" name="subuser" value="<?php echo $u->getUser(); ?>"/>
                    <input type="submit" value="Subscribe"/>
                </form>
            <?php elseif (!empty($_SESSION['user'])
                && $u->getUser() != unserialize($_SESSION['user'])->getUser()) : ?>
                <form action="action/subUser.php" method="POST">
                    <input type="hidden" name="dir" value="<?php echo basename($pageName); ?>"/>
                    <input type="hidden" name="unsubuser" value="<?php echo $u->getUser(); ?>"/>
                    <input type="submit" value="Unsubscribe"/>
                </form>
            <?php endif; ?>
        </article>
    <?php endforeach;
}
if ((!empty($get['searched']) && in_array('events', $get['searched']) !== false)
    || empty($get['searched'])) {
    $tags = [];
    if (!empty($get['tags'])) {
        $tags = $get['tags'];
    }
    foreach ($data->searchEvents($get['search'], $tags) as $e) :
        $eventDate = new Date ($e->getDate());?>
        <article class="event">
            <aside>
                <h2><?php echo $e->getTitle(); ?></h2>
                <p>Event date: <?php echo $eventDate->getDate(); ?></p>
                <p>Event type : <?php echo $e->getType(); ?></p>
                <p>Event create by : <?php echo $e->getCreator()->getUser(); ?></p>
                <p><?php echo count($e->getUsers()); ?> user(s) registered</p>
            </aside>
            <?php if ($e->getImg() != false) : ?>
                <img src="<?php echo $e->getImg(); ?>" alt="event image"/>
            <?php endif; ?>
            <?php if (!empty($_SESSION['user'])) : ?>
                <form action="action/subEvent.php" method="post">
                    <?php if (in_array($_SESSION['user']->getUser(), $e->getUsers()) || $_SESSION['user'] == $e->getCreator()) : ?>
                        <p> adresse: <?php echo $e->getAdresse(); ?></p>
                    <?php elseif (!empty($_SESSION['user'])) : ?>
                        <input type="hidden" name="dir" value="<?php echo basename($pageName); ?>"/>
                        <input type="hidden" name="sub" value="<?php echo $e->getTitle(); ?>"/>
                        <input type="submit" value="Subscribe"/>
                    <?php endif; ?>
                </form>
            <?php else : ?>
                <article class="index">
                    <h2>Before consulting profil: </h2>
                    <h2>Register : </h2>
                    <a href="register.php"><p>REGISTER</p></a>
                    <h2>Connect : </h2>
                    <a href="connect.php"><p>Connections</p></a>
                </article>
            <?php endif; ?>
        </article>
    <?php endforeach;
}
?>