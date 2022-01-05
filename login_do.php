<?php
session_start();
$connection = new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ag169', 'ag169', 'eiNuiquay7', array('charset' => 'utf8'));


$Benutzername = htmlspecialchars($_POST['Benutzername']);
$Passwort = htmlspecialchars($_POST['Passwort']);


$statement = $connection->prepare("SELECT * FROM user WHERE Benutzername=:Benutzername AND Passwort=:Passwort");
$statement->bindParam(':Benutzername', $Benutzername);
$statement->bindParam(':Passwort', $Passwort);

if (!$statement->execute()) {
    echo $statement->errorInfo()[2];
    echo $statement->queryString;
    die ("Datenbank-Fehler");
}

if ($row = $statement->fetch()) {
    $_SESSION["Benutzer"] = $row["id"];
    $_SESSION["Benutzername"] = $row["Benutzername"];
    $_SESSION["Bild"] = $row["Bild"];
    echo header("Location: ../Webprojekt/benutzer.php");
}
else {
    echo "Benutzername oder Passwort falsch.";
}

