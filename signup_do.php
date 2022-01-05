<?php
session_start();
$connection = new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ag169', 'ag169', 'eiNuiquay7', array('charset' => 'utf8'));

# * So wird später das Passwort gehast: *
# $p="hjfew3545r8c0szhwgfsdafghjgfdhj";
# $hash=password_hash ($_POST["Passwort"].$p, PASSWORD_BCRYPT);

if(!isset($_POST["Vorname"]) OR !isset($_POST["Nachname"]) OR !isset($_POST["Benutzername"]) OR !isset($_POST["Passwort"])){
    echo "Bitte füllen Sie alle Felder aus";
    die();
}
$bildname = $_FILES["Bild"]["name"];

$statement = $connection->prepare("INSERT INTO user (Vorname, Nachname, Benutzername, Passwort, Bild)
                VALUES (:vn, :nn, :bn, :pw, :bd)");

$vorname = htmlspecialchars($_POST["Vorname"], ENT_QUOTES);
$statement->bindParam(':vn', $vorname);
$nachname = htmlspecialchars($_POST["Nachname"], ENT_QUOTES);
$statement->bindParam(':nn', $nachname);
$benutzername = htmlspecialchars($_POST["Benutzername"], ENT_QUOTES);
$statement->bindParam(':bn', $benutzername);
$passwort = htmlspecialchars($_POST["Passwort"], ENT_QUOTES);
$statement->bindParam(':pw', $passwort);

# Zeile 18 wird beim gehasten Passwort nichtmehr benötigt.
# Zeile 19 wird entsprechend geändert:
# $statement->bindParam(':pw', $hash);

$bildname=$_FILES["Bild"]["name"];
$fileType=substr($bildname, strlen($bildname)-4, strlen($bildname));
if($fileType==".jpg" OR $fileType=="jpeg" OR $fileType==".JPG" OR $fileType=="JPEG" OR $fileType==".PNG" OR $fileType==".png"){
    $statement->bindParam(':bd', $bildname);;
} else{
    die("Dateiart nich zugelassen");
}

if($_FILES["Bild"]["size"]>5000000){
    die("Datei zu groß");
}

move_uploaded_file($_FILES["Bild"]["tmp_name"], "/home/ag169/public_html/upload/".$_FILES["Bild"]["name"]);


if ($statement->execute()) {
    echo header("Location: ../Webprojekt/login.php");
} else {
    echo 'Datenbank-Fehler:';
    echo $statement->errorInfo()[2];
    echo $statement->queryString;
    die();
}
