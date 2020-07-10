<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    function connect_to_database()
    {
        $servername = "localhost";
        $username = "Summer";
        $password = "2020";
        $databasename = "base-site-rooting";

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo  $e->getMessage();
        }
    }

    $pdo = connect_to_database();


    if (isset($_POST['login']) && ($_POST['password'])) {
        $username = $_POST['login'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM utilisateurs WHERE login = '$username' and password = '$password'";
        $req = $pdo->query($sql);

        if ($req->rowCount() == 1) {
            echo "Verification réussie.";
        } else {
            echo "Mauvais couple identifiant/mot de passe </br>";
            echo "<a href='mini-site-routing.php?page=connexion'>Connexion</a>";
        }
    } else {
        header('location: mini-site-routing.php?page=connexion');
    }

 