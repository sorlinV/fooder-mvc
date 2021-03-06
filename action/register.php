<?php
/**
 * Created by PhpStorm.
 * User: isidoris-simplon
 * Date: 04/07/17
 * Time: 14:48
 */
include_once '../lib/Data.php';
session_start();
if (!isset($data)) {
    $data = new Data();
}
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if (!empty($post['user']) && !empty($post['password']) && !empty($post['password2'])
    && $post['password'] == $post['password2'] && !empty($post['adresse'])
    && !empty($post['firstname']) && !empty($post['lastname'])) {
    if (!is_dir("../data/imgUser")) {
        mkdir("../data/imgUser");
    }
    if (!empty($_FILES['avatar']) && count($_FILES) != 0
        && $_FILES['avatar']['tmp_name'] !== "") {
        $img = "data/imgUser/" . $post['user'] . ".png";
        move_uploaded_file($_FILES['avatar']['tmp_name'], "../" . $img);
    } else {
        $img = "img/default.png";
    }
    $user = new User($post['user'], hash("sha256", $post['password']), $img
        , $post['adresse'], $post['firstname'], $post['lastname']);
    $data->addUser($user);
}
include 'login.php';