<?php
session_start();
$connection = new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ag169', 'ag169', 'eiNuiquay7', array('charset' => 'utf8'));
?>

    <!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=yes" charset="UTF-8">
        <title>Urlaub? Kann Jeder! - Angebote</title>
        <link rel="stylesheet" type="text/css" href="index.css"
    </head>
    <body>

    <input type="checkbox" id="navigation">
    <label for="navigation" class="navigation-label">- Menü -</label>
    <nav>
        <ul>
            <li><a href="uebermich.php" >Startseite</a></li>
            <li><a href="index.php">Angebote</a></li>
            <ul>
                <li class="submenu"><a href="post.php">Angebot hinzufügen</a></li>
                <li id="thispage" class="submenu"><a href="post_edit_auswahl.php">Angebot bearbeiten</a></li>
            </ul>
            <li><a href="benutzer.php">Benutzer</a></li>
            <ul>
                <li class="submenu"><a href="login.php">Login</a></li>
                <li><a href="signup.php">Registrieren</a></li>
                <li><a href="logout_do.php">Abmelden</a></li>
            </ul>
            <li><a href="impressum.php">Impressum</a></li>
        </ul>
    </nav>

    <div id="slider">
    </div>

    <?php
    echo $_GET["id"];
    $statement=$connection->prepare("SELECT * FROM posts WHERE id=:id");
    $statement->bindParam(":id", $_GET["id"]);

    if(!$statement->execute()) {
    echo $statement->errorInfo()[2];
    die("Fehler in der Datenbank");
    }

    if (!$row=$statement->fetch()){
    die("Fehler");
    }
    ?>

    <div id="neuerpost">
        <form action="post_edit_do.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend style="font-size: larger">Post verändern:</legend>
                <p>
                    <label for="id"></label> <br>
                    <input type="hidden" name="id" id="id" value="<?php echo $row["id"];?>">
                </p>
                <p>
                    <label for="titel">Reiseziel & Preis:</label> <br>
                    <input type="text" name="titel" id="titel" value="<?php echo $row["titel"];?>">
                </p>
                <p>
                    <label for="post">Beschreibung:</label> <br>
                    <textarea id="post" name="post" cols="100" rows="20"><?php echo $row["post"];?></textarea>
                </p>
                <p>
                    <label for="datei">Fügen Sie Bilder zum Angebot hinzu:</label> <br>
                    <input type="file" name="datei" id="datei" >
                </p>
                <button style="width: 200px" type="submit" id="veröffentlichen">Änderungen sichern</button> <br>
            </fieldset>
        </form>
    </div>
    </body>
