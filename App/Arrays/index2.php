<?php
$url = "https://raw.githubusercontent.com/MAlejandroR/json_tv/main/tv.json";
$contenido = file_get_contents($url);
$contenido = json_decode($contenido, true);

foreach ($contenido as $lista ) {
    $nombre = $lista["name"];
    $channel = $lista["channels"];
    echo "<h1>$nombre</h1>";
    foreach ($channel as $ch) {
        $name = $ch["name"];
        $web = $ch["web"];
        $logo = $ch["logo"];
        echo "<h3 style='color: red'>$name</h3>";
        echo "<a href='$web'> <img src='$logo' alt='$logo'> </a>";
    }
}

?>