<?php
session_start();
$connection = new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-ag169', 'ag169', 'eiNuiquay7', array('charset' => 'utf8'));
?>

<!DOCTYPE html>
<html lang="de">
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
        <li id="thispage"><a href="index.php">Angebote</a></li>
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

<div id="content">
    <p style="font-weight: bolder; font-size: large">Angebote - für JEDEN die passende Reise!</p>
    Bist Du bereit für dein nächstes Abenteuer? <br>
    Egal ob Strandurlaub oder Abenteuer in den Bergen - hier teilen wir einfach alle Angebote, damit JEDER seinen Traumurlaub finden kann. <br>
    Ich wünsche Dir viel Spaß beim Stöbern & hoffe Du wirst fündig! <br> <br>
    Übringens:  Falls Du sicher gehen willst, dass hier alles mit rechten Dingen zu geht, <br>
    schau Dir gerne unsere <a href="Datenschutz.html">Datenschutzerklärung</a> an.
</div>

<div id="ueberschrift">
    <h1>Du bist nurnoch ein Schritt von deiner nächsten Reise entfernt...</h1>
</div>

<div class="angebote">
<?php
$statement=$connection->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT 100");
$statement->execute();
while($row=$statement->fetch()) {
    echo "<div id='angebote'>";
    echo "<h3>".$row["titel"]." </h3> <br><span> ".$row["post"]."</span><br>";
    if ($row["datei"]==""){
        echo "<td></td>";
    } else {
        echo "<td><img src='upload/".$row["datei"]."' height='300px''></td>";
    }
    echo "</div>";
    echo "<br>";
}
?>
</div>

<footer>
    <div id="footer"><a href="Datenschutz.php">Datenschutz</a> | <a href="logout_do.php">Abmelden</a>
        <br>
        <span>©2021</span></div>
</footer>

</body>
</html>