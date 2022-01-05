<?php
session_start();
$connection = new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ag169', 'ag169', 'eiNuiquay7', array('charset' => 'utf8'));
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="description" content="Urlaub? Kann Jeder! - Wir ermöglichen Dir die Reise deiner Träume." charset="UTF-8">
    <title>Urlaub? Kann Jeder! - Posten erfolgreich</title>
</head>
<body>
<?php
if(!isset($_POST["titel"]) OR !isset($_POST["post"])){
    echo "Bitte füllen Sie alle Felder aus";
    die();
}

$statement = $connection->prepare("INSERT INTO posts (titel, post, datei)
                VALUES (:tt, :po, :dt)");

$statement->bindParam(':tt', $_POST["titel"]);
$statement->bindParam(':po', $_POST["post"]);


$filename=$_FILES["datei"]["name"];
$fileType=substr($filename, strlen($filename)-3, strlen($filename));
if($fileType=="jpg" OR $fileType=="peg" OR $fileType=="JPG" OR $fileType=="PEG" OR $fileType=="PNG" OR $fileType=="png" OR $fileType=="")
{
    $statement->bindParam(':dt', $filename);;
} else{
    die("Dateiart nich zugelassen");
}

if($_FILES["datei"]["size"]>5000000){
    die("Datei zu groß");
}

move_uploaded_file($_FILES["datei"]["tmp_name"], "/home/ag169/public_html/upload/".$_FILES["datei"]["name"]);

if ($statement->execute()) {
    $id = $connection->lastInsertId();
    echo header("Location: ../Webprojekt/index.php");
} else {
    echo 'Datenbank-Fehler:';
    echo $statement->errorInfo()[2];
    echo $statement->queryString;
    die();
}
?>


</body>
</html>
