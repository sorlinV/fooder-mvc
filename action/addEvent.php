<?php
include_once '../lib/Data.php';
session_start();
if (!isset($data)) {
    $data = new Data();
}
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$tags = [];
if (!empty($post['tags'])) {
    $tags = $post['tags'];
}
if (!empty($post['newTags'])) {
    $ntags =  explode( "," , str_replace(" ", "", $post['newTags']));
    $data->addTags($ntags);
    foreach ($ntags as $t) {
        $tags[] = $t;
    }
}

if (isset($_SESSION['user'])) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if (isset($post['title']) && isset($post['place']) && isset($post['type']) &&
        isset($post['date']) && isset($post['time'])) {
        if (isset($_FILES['eventimg']) && $_FILES['eventimg']['tmp_name'] !== "") {
            if (!is_dir("../data/imgEvent")) {
                mkdir("../data/imgEvent");
            }
            move_uploaded_file($_FILES['eventimg']['tmp_name'],
                "../data/imgEvent/" . $post['title'] . ".png");
            $event = new Event($post['title'], $post['date']
                . "-" . str_replace(":", "-", $post['time']), $post['type'],
                $post['place'], "data/imgEvent/" . $post['title'] . '.png', unserialize($_SESSION['user']), $tags);
        } else {
            $event = new Event($post['title'], $post['date'] . $post['time'], $post['type'],
                $post['place'], false, unserialize($_SESSION['user']), $tags);
        }
        $data->addEvent($event);
    }
} else {
    header('location: ../addEvent.php?error=1');
}
header('location: ../index.php');