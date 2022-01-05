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
        <li><a href="index.php">Angebote</a></li>
        <ul>
            <li class="submenu"><a href="post.php">Angebot hinzufügen</a></li>
            <li id="thispage" class="submenu"><a href="post_edit.php">Angebot bearbeiten</a></li>
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
        echo "<h1>Hier kannst Du Deine Änderungen vornehmen, ".$_SESSION["Benutzername"]."!</h1><br>";
    }
    ?>
</div>

<div id="content">
    <p style="font-weight: bolder; font-size: large">Angebote anpassen</p>
    Welches Angebot möchtest Du verändern? <br>
</div>

<div id="ueberschrift">
    <h1>Unsere aktuellen Angebote...</h1>
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
        echo "<br><a href='post_edit.php?id=".$row["id"]."'>Diesen Post bearbeiten</a>";
        echo "<br>";
        echo "</div>";
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
