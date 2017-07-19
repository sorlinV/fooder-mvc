<?php
include_once '../lib/Data.php';
session_start();
if (!isset($data)) {
    $data = new Data();
}
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if (isset($post['adresse'])
    && isset($post['firstname']) && isset($post['lastname'])
    && isset($_SESSION['user'])) {
    if (!is_dir("../data/imgUser")) {
        mkdir("../data/imgUser");
    }
    if (isset($_FILES['avatar']) && count($_FILES) != 0
        && $_FILES['avatar']['tmp_name'] !== "") {
        $img = "data/imgUser/" . unserialize($_SESSION['user'])->getUser() . ".png";
        move_uploaded_file($_FILES['avatar']['tmp_name'], "../" . $img);
    }
    if (isset($post['password']) && isset($post['password2'])
        && $post['password'] == $post['password2']) {
        $data->getUser(unserialize($_SESSION['user'])->getUser())->edit
        (hash("sha256", $post['password']), $post['adresse'], $post['firstname'], $post['lastname']);
    } else {
        $data->getUser(unserialize($_SESSION['user'])->getUser())->edit
        (false, $post['adresse'], $post['firstname'], $post['lastname']);
    }
} else {
    header('location: ../profil.php?error=1');
}
header('location: ../profil.php');
