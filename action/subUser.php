<?php
//VERIF SUB/UNSUB fOR USER
include_once '../lib/Data.php';
if (!isset($data)) {
    $data = new Data();
}
if (session_status() != 2) {
    session_start();
}
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if (isset($_SESSION['user']) && isset($post['subuser']) && isset($post['dir'])) {
    $suber = $data->getUser($_SESSION['user']->getUser());
    $suber->addSubscriber($post['subuser']);
    $u = $data->getUser($post['subuser']);
    $u->addFollower($_SESSION['user']->getUser());
    $_SESSION['user'] = $suber;
    header ('location: ../'. $post['dir']);
    exit ();
}elseif (isset($_SESSION['user']) && isset($post['unsubuser']) && isset($post['dir'])) {
    $suber = $data->getUser($_SESSION['user']->getUser());
    $suber->rmSubscriber($post['unsubuser']);
    $u = $data->getUser($post['unsubuser']);
    $u->rmFollower($_SESSION['user']->getUser());
    $_SESSION['user'] = $suber;
    header ('location: ../'. $post['dir']);
    exit ();
}
header('location: ../index.php');