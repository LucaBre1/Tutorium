<?php
session_start();
$connection = new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ag169', 'ag169', 'eiNuiquay7', array('charset' => 'utf8'));
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=yes" charset="UTF-8">
    <title>Urlaub? Kann Jeder! - Angebot hinzufügen</title>
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
            <li id="thispage" class="submenu"><a href="post.php">Angebot hinzufügen</a></li>
            <li class="submenu"><a href="post_edit_auswahl.php">Angebot bearbeiten</a></li>
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

<div id="nichtautorisiert">
    <?php
    $statement=$connection->prepare("SELECT * FROM user");
    $statement->execute();
    if (!isset ($_SESSION ["Benutzer"])) {
        echo "<div id='ueberschrift'>";
        echo "<h1>Es tut uns leid!</h1><br>";
        die ("<div id='nichteingeloggt'> <p> Du musst eingeloggt sein, um ein Angebot hinzufügen zu können. <br>
Hier geht's zum <a href='login.php'>Login</a>, oder <a href='signup.php'>registriere dich</a> jetzt kostenlos. </p> </div>");
    }
    else {
        echo "<div id='ueberschrift'>";
        echo "<h1>Ich freue mich dein Angebot, ".$_SESSION["Benutzername"]."!</h1><br>";
        }
    ?>
</div>

<div id="content">
    <p style="font-weight: bolder; font-size: large">Schön, dass Du dein Schnäppchen mit uns teilst!</p>
    Bevor Du loslegst noch ein kleiner Hinweis: <br> <br>
    Falls Du sie nicht bereits kennst, lese dir bitte zuerst die <a href="Datenschutz.php">Datenschutzerklärung</a><br>
    durch, bevor du deinen Beitrag postest. <br> <br>
    Vielen Dank für Dein Verständnis!
</div>

<div id="neuerpost">
    <form action="post_do.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend style="font-size: larger">Neues Angebot:</legend>
            <p>
                <label for="titel">Reiseziel & Preis:</label> <br>
                <input type="text" name="titel" id="titel">
            </p>
            <p>
                <label for="post">Beschreibung:</label> <br>
                <textarea id="post" name="post" cols="100" rows="20"></textarea>
            </p>
            <p>
                <label for="datei">Fügen Sie Bilder zum Angebot hinzu:</label> <br>
                <input type="file" name="datei" id="datei" >
            </p>
            <button style="width: 150px" type="submit" id="veröffentlichen">Veröffentlichen</button> <br>
        </fieldset>
    </form>
</div>

<footer>
    <div id="footer"><a href="Datenschutz.php">Datenschutz</a> | <a href="logout_do.php">Abmelden</a>
        <br>
        <span>©2021</span></div>
</footer>

</body>
</html>