<?php
// require "php/recaptcha.php";
header('Content-type:application/json;charset=utf-8');
$timezone = "Europe/Paris";
date_default_timezone_set($timezone);
// if (check_token($_POST['g-recaptcha-response'], SECRETE_TUTO_EXEMPLE)) {

if (
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['confirmation']) && !empty($_POST['confirmation']) &&
    isset($_POST['message']) && !empty($_POST['message'])
) {
    // je crée un tableau à partir des données que je reçois
    $post = [
        // 'id' => uniqid(),
        // 'token' => $_POST['g-recaptcha-response'],
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'sujet' => $_POST['sujet'],
        'email' => $_POST['email'],
        'message' => $_POST['message'],
        'dateJ' => date("d/m/y"),
        'dateH' => date("H:i:s")
    ];
    // foreach ($post as $i) {
    //     htmlspecialchars($i, ENT_QUOTES);
    // }
    // if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
    //     header('Location:index.php');
    // }
    $headers = "From: {$post['email']} \r 
                {$post['message']} \r\n
                {$post['nom']} {$post['prenom']} \r
                Le {$post['dateJ']} à {$post['dateH']} \r\n ";
    echo json_encode($post);
    mail('meavilla.73@gmail.com', $post['sujet'], $headers);
}
// }
