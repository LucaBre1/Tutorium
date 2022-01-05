<?php
session_start();
$connection = new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ag169', 'ag169', 'eiNuiquay7', array('charset' => 'utf8'));
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=yes" charset="UTF-8">
    <title>Urlaub? Kann Jeder! - DSGVO</title>
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
        <li><a href="impressum.php">Impressum</a></li>
    </ul>
</nav>

<div id="slider">
</div>

<div id="ueberschrift">
    <h1>Datenschutz</h1>
</div>

<div id="impressum">
    <h4><u>Ein Ausschnitt der DSGVO:</u></h4>
    <address>
        <p>Wir sind gemäß Art. 12 Datenschutz-Grundverordnung (im Weiteren: DSGVO) verpflichtet, Dich über die Verarbeitung Deiner Daten bei Nutzung unserer Website zu informieren. Wir nehmen den Schutz Deiner persönlichen Daten sehr ernst und die vorliegende Datenschutzerklärung informiert Dich über die Einzelheiten der Verarbeitung Deiner Daten sowie über Deine diesbezüglichen gesetzlichen Rechte.

            Wir behalten uns vor, die Datenschutzerklärung mit Wirkung für die Zukunft anzupassen, insbesondere im Fall der Weiterentwicklung der Website, bei der Nutzung neuer Technologien oder der Änderung der gesetzlichen Grundlagen bzw. der entsprechenden Rechtsprechung.

            Wir empfehlen Dir, die Datenschutzerklärung von Zeit zu Zeit zu lesen und einen Ausdruck bzw. eine Kopie zu Deinen Unterlagen zu nehmen. <br> <br>
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

