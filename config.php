<?php
// Web info
$gdpsTitle = '¡Bienvenido a Geometry Dash!'; // Title of the web.
$webTitle = 'Geometry Dash'; // Example image: https://acortar.link/axgSFq
$gdpsLink = 'https://gdps.ps.fhgdps.com/dashboard'; // Link you'll be redirected to if you tap on the title.
$gdpsIcon = '../dashboard/icon.png'; // Icon to be displayed on the web. It can be a link.
$info = 'Este es el sitio web de Geometry Dash.';  // Description for embed (e.g., Discord).

// GDPS Social Media
$youtubeLink = ''; // YouTube channel of your GDPS.
$facebookLink = ''; // Facebook page of your GDPS.
$twitterLink = ''; // Twitter account of your GDPS.
$discordLink = ''; // Discord server of your GDPS.

// Web body
$introTitle = 'Introducción'; // Introduction title.
$whatDoing = '¿Qué tal está la comunidad?'; // Anything bro.
$intro = 'Si apenas te uniste, puedes revisar las siguientes herramientas para iniciar:'; // An introduction.
$register = 'Crear tu cuenta.'; // Register message.
$registerLink = '../dashboard/login/register.php'; // Register link o your GDPS.
$download = 'Descargar el GDPS.'; // Download message.
$downloadLink = ''; // Folder with download links of your GDPS.
$demonlist = 'Mira nuestra Demon List.'; // Demon List message.
$dlLink = './demonlist/'; // Your Demon List.
$footer = 'Creado por: X. © 2024';  // Change 2024 for the year in which your GDPS was created.

// Demon List
$dlWelcome = '¡Bienvenido a la Demon List de Geometry Dash!'; // A welcome message.
$position = 'Posición'; // Position of a level.
$name = 'Nombre'; // Name of a level.
$creator = 'Creador'; // Creator of a level.
$video = 'Video'; // Video of a level.
$verification = 'Video (100%)'; // Verification of a level.
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $webTitle; ?></title>
    <link rel="icon" href="<?php echo $gdpsIcon; ?>" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        header {
            background: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #007bff;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>

<header>
    <h1><?php echo $gdpsTitle; ?></h1>
    <p><?php echo $info; ?></p>
</header>

<div class="container">
    <h2><?php echo $introTitle; ?></h2>
    <p><?php echo $whatDoing; ?></p>
    <p><?php echo $intro; ?></p>
    <ul>
        <li><a href="<?php echo $registerLink; ?>"><?php echo $register; ?></a></li>
        <li><a href="<?php echo $downloadLink; ?>"><?php echo $download; ?></a></li>
        <li><a href="<?php echo $dlLink; ?>"><?php echo $demonlist; ?></a></li>
    </ul>
</div>

<footer>
    <p><?php echo $footer; ?></p>
</footer>

</body>
</html>