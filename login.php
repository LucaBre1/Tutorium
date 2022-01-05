<?php
session_start();
$connection = new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ag169', 'ag169', 'eiNuiquay7', array('charset' => 'utf8'));
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=yes" charset="UTF-8">
    <title>Urlaub? Kann Jeder! - Login</title>
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
            <li  id="thispage" class="submenu"><a href="login.php">Login</a></li>
            <li><a href="signup.php">Registrieren</a></li>
            <li><a href="logout_do.php">Abmelden</a></li>
        </ul>
        <li><a href="impressum.php">Impressum</a></li>
    </ul>
</nav>

<div id="slider">
</div>

<div id="ueberschrift">
    <h1>Willkommen zurück!</h1>
</div>

    <div id="login">
        <form action="login_do.php" method="post">
            <fieldset>
                <legend style="font-size: larger">Login:</legend>
                <p>
                    <label for="Benutzername">Benutzername:</label>
                    <input type="text" name="Benutzername" id="Benutzername">
                </p>
                <p>
                    <label for="Passwort">Passwort:</label>
                    <input type="password" name="Passwort" id="Passwort">
                </p>
                <button style="width: 120px" type="submit" id="Einloggen">Einloggen</button> <br>
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
