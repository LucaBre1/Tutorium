<?php
session_start();
$connection = new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ag169', 'ag169', 'eiNuiquay7', array('charset' => 'utf8'));
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=yes" charset="UTF-8">
    <title>Urlaub? Kann Jeder! - Impressum</title>
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
            <li><a href="signup.php">Registrieren</a></li>
            <li><a href="logout_do.php">Abmelden</a></li>
        </ul>
        <li id="thispage"><a href="impressum.php">Impressum</a></li>
    </ul>
</nav>

<div id="slider">
</div>

<div id="ueberschrift">
    <h1>Impressum</h1>
</div>

<div id="impressum">
    <p>Impressum der Website "Urlaub-kann-Jeder.de" - Angaben gemäß $5 TMG <br> <br> </p>
    <h4><u>Betreiber:</u></h4>
    <address>
        <p>Alina Graf <br>
            Murgtalstrasse 150, 72250 Freudenstadt <br>
            Deutschland <br> <br>
        </p>
    </address>
    <h4><u>Kontakt:</u></h4>
    <address>
        <p>Telefonnummer:<br>
            <a href="tel:+4917651990588">0176 51990588</a>
        </p>
        <p>E-Mail:<br>
            <a href="mailto:alinagraf@mail.de">alinagraf@mail.de</a>
        </p>
    </address>
</div>

<footer>
    <div id="footer"><a href="Datenschutz.php">Datenschutz</a> | <a href="logout_do.php">Abmelden</a>
        <br>
        <span>©2021</span></div>
</footer>

</body>
</html>
