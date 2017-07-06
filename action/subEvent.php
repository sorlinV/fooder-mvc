<?php
//VERIF SUB FOR EVENT
include_once '../lib/Data.php';
if (!isset($data)) {
    $data = new Data();
}
if (session_status() != 2) {
    session_start();
}
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if (isset($post['sub']) && isset($_SESSION['user']) && isset($post['dir'])) {
    $data->getEvent($post['sub'])->addUser($_SESSION['user']->getUser());
    header ('location: ../'. $post['dir']);
} else {
    header('location: ../index.php');
}