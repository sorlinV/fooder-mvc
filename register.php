<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>register</title>
</head>
    <body>
        <?php
            include_once 'header.php';
            if (isset($_GET['error']) && $_GET['error'] == 1) : ?>
                <form action="">
                    <p class="error">Something is wrong with formulaire</p>
                </form>
            <?php endif;
            include_once 'libaff/formRegister.html';
        ?>
    </body>
</html>
