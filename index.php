<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>FOODer</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        include_once 'lib/Data.php';
        $data = new Data();
        foreach ($data->getEvents() as $event) {?>
        <article class="event">
            <h2><?php echo $event->title ?></h2>
            <p>Event date: <?php echo $event->date; ?></p>
            <p>Event type : <?php echo $event->type; ?></p>
            <p>Event create by : <?php echo $event->creator->getUser(); ?></p>
            <p><?php echo count($event->users); ?>user(s) registered<p>
            <?php if ($event->img != false) { ?>
            <img src="<?php echo $event->img; ?>" alt="event image"/>
            <?php }
                  if (isset($_SESSION['user'])) { ?>
            <form action="" method="post">
                <?php if (in_array($_SESSION['user']->getUser(), $event->users)
                        || $_SESSION['user'] == $event->creator) { ?>
                <p> adresse: <?php echo $event->adresse; ?></p>
                <?php } else { ?>
                <input type="hidden" name="sub" value="<?php echo $event->title ?>"/>
                <input type="submit" value="Subscribe"/>
                <?php } ?>
            </form>
            <?php } ?>
        </article>
        <?php } ?>
    </body>
</html>