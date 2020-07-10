<?php session_start(); ?>
<html>

<head>
    <title>Administration</title>
</head>

<body>
    <?php if (isset($_SESSION['id'])) ?>


    <form method="POST" enctype="multipart/form-data">
        <label for="name">Login</label>
        <br><input id="Login" type="text" name="login" placeholder="Votre Login.">
        <br><label for="">Votre Mot De Passe</label>
        <br><input id="password" type="password" name="password" placeholder="Votre mot de passe">
        <input type="file" name="upload_photo" /> <br />
        <input type="submit" name="submit" />
    </form>


    <?php

if (empty($_FILES['file']))
echo("<p>En attente de fichier</p>");
else {
$filename = $_FILES['file']['name'];
$filesize = $_FILES['file']['size'];
$destination = "./";

if (strlen(substr($filename, 0, (strrpos($filename, ".")))) < 4)
    echo("<p>Erreur dans le fichier: valeur ['name']</p>");
elseif ($filesize > 2097152)
    echo("<p>Erreur dans le fichier: valeur ['size']</p>");
else {
    if (!empty($_POST['title']))
        $_SESSION['title'] = $_POST['title'];
    if (!empty($_POST['desc']))
        $_SESSION['desc'] = $_POST['desc'];
    $_SESSION['image'] = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $_SESSION['image']);
    header("Location: index.php?page=1");
}
}

    ?>