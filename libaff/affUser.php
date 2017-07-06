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
<article class="user">
    <img src="<?php echo $user->getImg(); ?>" alt="<?php echo $user->getUser(); ?> avatar"/>
    <section>
        <h2><?php echo $user->getUser(); ?></h2>
        <p><?php echo $user->getAdresse(); ?></p>
        <p><?php echo $user->getFirstname(); ?></p>
        <p><?php echo $user->getLastname(); ?></p>
    </section>
    <?php if (count($user->getSubscribes()) != 0) : ?>
        <section>
            <h3>Subscribes : </h3>
            <ul>
                <?php foreach ($user->getSubscribes() as $sub) : ?>
                    <li><?php echo $data->getUser($sub)->getUser(); ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>
    <?php if (count($user->getFollowers()) != 0) : ?>
    <section>
        <h3>Followers : </h3>
        <ul>
            <?php foreach ($user->getFollowers() as $follower) : ?>
                <li><?php echo $data->getUser($follower)->getUser(); ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
    <?php endif; ?>
<?php endif; ?>