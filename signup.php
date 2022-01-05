<?php
session_start();
$connection = new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ag169', 'ag169', 'eiNuiquay7', array('charset' => 'utf8'));
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=yes" charset="UTF-8">
    <title>Urlaub? Kann Jeder! - Registrierung</title>
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
            <li class="submenu"><a href="post_edit_auswahl.php">Angebot bearbeiten</a></li>
        </ul>
        <li><a href="benutzer.php">Benutzer</a></li>
        <ul>
            <li class="submenu"><a href="login.php">Login</a></li>
            <li id="thispage"><a href="signup.php">Registrieren</a></li>
            <li><a href="logout_do.php">Abmelden</a></li>
        </ul>
        <li><a href="impressum.php">Impressum</a></li>
    </ul>
</nav>

<div id="slider">
</div>

<div id="ueberschrift">
    <h1>Werde ein Teil der Familie!</h1>
</div>

<div id="login">
    <form action="signup_do.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Registrierung:</legend>
            <p>
                <label for="Vorname">Vorname:</label>
                <input type="text" name="Vorname" id="Vorname">
            </p>
            <p>
                <label for="Nachname">Nachname:</label>
                <input type="text" name="Nachname" id="Nachname">
            </p>
            <p>
                <label for="Benutzername">Benutzername:</label>
                <input type="text" name="Benutzername" id="Benutzername">
            </p>
            <p>
                <label for="Passwort">Passwort:</label>
                <input type="password" name="Passwort" id="Passwort">
            </p>
            <p>
                <label for="Bild">Füge ein Foto von Dir hinzu (optional):</label> <br>
                <input type="file" name="Bild" id="Bild" >
            </p>
            <button style="width: 120px" type="submit" id="submit">Registrieren</button> <br>
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