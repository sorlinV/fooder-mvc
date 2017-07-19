<?php
$pageName = "$_SERVER[REQUEST_URI]";
if (!isset($data)) {
    $data = new Data();
}
foreach ($data->getEvents() as $e) {
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
                <?php if (in_array(unserialize($_SESSION['user'])->getUser(), $e->getUsers()) || unserialize($_SESSION['user']) == $e->getCreator()) : ?>
                    <p> adresse: <?php echo $e->getAdresse(); ?></p>
                <?php elseif (!empty($_SESSION['user'])) : ?>
                    <input type="hidden" name="dir" value="<?php echo basename($pageName); ?>"/>
                    <input type="hidden" name="sub" value="<?php echo $e->getTitle(); ?>"/>
                    <input type="submit" value="Subscribe"/>
                <?php endif; ?>
            </form>
        <?php else : ?>
            <article class="index">
                <p>To go at this event </p>
                <p>Register : </p>
                <a href="register.php"><p>REGISTER</p></a>
                <p>Connect : </p>
                <a href="connect.php"><p>Connections</p></a>
            </article>
        <?php endif; ?>
    </article>
<?php }