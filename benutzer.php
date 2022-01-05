<?php
session_start();
$connection = new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ag169', 'ag169', 'eiNuiquay7', array('charset' => 'utf8'));
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.6, user-scalable=yes" charset="UTF-8">
    <title>Urlaub? Kann Jeder! - Benutzer</title>
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
        <li id="thispage"><a href="benutzer.php">Benutzer</a></li>
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
    die ("<div id='nichteingeloggt'> <p> Du musst eingeloggt sein, um auf den Benutzerbereich zugreifen zu können. <br>
Hier geht's zum <a href='login.php'>Login</a>, oder <a href='signup.php'>registriere dich</a> jetzt kostenlos. </p> </div>");
}
else {
    echo "<div id='ueberschrift'>";
    echo "<h1>Herzlich Willkommen, ".$_SESSION["Benutzername"]."!</h1><br>";
    if ($_SESSION["Bild"]==""){
        echo "<td></td>";
    } else {
        echo "<td><img src='upload/".$_SESSION["Bild"]."' height='300px''></td>";
    }
}
?>
</div>

<div id="content">
    <p style="font-weight: bolder; font-size: large">Schön, dass Du hier bist!</p>
    Was möchtest Du als nächstes tun... <br> <br>
    Vielleicht ein neues <a href="post.php">Angebot teilen</a>?<br>
    Oder ein bestehendes <a href="post_edit_auswahl.php">Angebot bearbeiten</a>? <br> <br>
    Viel Spaß auf unserer Seite!
</div>

<footer>
    <div id="footer"><a href="Datenschutz.php">Datenschutz</a> | <a href="logout_do.php">Abmelden</a>
        <br>
        <span>©2021</span></div>
</footer>

</body>
</html>