<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FOODer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
        <?php include_once 'header.php';?>
        <main>
            <article class="index">
                <?php if (!empty($_SESSION['user'])) : ?>
                    <h2>Hello, <?php echo $_SESSION['user']->getUser() ?> ! </h2>
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