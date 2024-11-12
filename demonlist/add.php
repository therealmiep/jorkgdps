<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: auth.php"); // Redirigir a la página de autenticación
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $puesto = $_POST['puesto'];
    $nombre = $_POST['nombre'];
    $creador = $_POST['creador'];
    $video = $_POST['video'];

    // Crear un array con la información del demonio
    $demonio = [
        'puesto' => $puesto,
        'nombre' => $nombre,
        'creador' => $creador,
        'video' => $video,
    ];

    // Generar un ID único para el demonio
    $id = uniqid(); // Genera un ID único
    $filePath = "levels/demon_$id.json";
    
    // Guardar el demonio en un archivo JSON en la carpeta levels
    file_put_contents($filePath, json_encode($demonio));

    // Enviar mensaje al webhook de Discord
    sendToDiscordWebhook($demonio);

    // Redirigir a index.php
    header("Location: index.php");
    exit();
}

function sendToDiscordWebhook($demonio) {
    $webhookUrl = 'https://discord.com/api/webhooks/1305330617897979934/a8WInET61cT7XncwPZKti4QIf27ABFIS-O6UhuxnmnPhxtGcFku-0Vd07JZgZwgprLQM'; // Reemplaza con tu URL de webhook

    $embed = [
        'title' => "¡Nuevo Demonio Añadido!",
        'color' => hexdec("FF5733"), // Color del embed en formato hexadecimal
        'fields' => [
            [
                'name' => "Nombre",
                'value' => $demonio['nombre'],
                'inline' => true
            ],
            [
                'name' => "Puesto",
                'value' => $demonio['puesto'],
                'inline' => true
            ],
            [
                'name' => "Creador",
                'value' => $demonio['creador'],
                'inline' => true
            ],
            [
                'name' => "Video",
                'value' => $demonio['video'],
                'inline' => true
            ],
        ],
        'footer' => [
            'text' => "Gracias por jugar." // Puedes cambiar esto si deseas un ID específico
        ],
    ];

    $message = [
        'embeds' => [$embed],
    ];

    $jsonData = json_encode($message);

    $ch = curl_init($webhookUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData),
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Demonio</title>
</head>
<body>
    <h1>Añadir Demonio</h1>
    <form method="post">
        <label for="puesto">Puesto:</label>
        <input type="text" name="puesto" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="creador">Creador:</label>
        <input type="text" name="creador" required><br>
        <label for="video">Video:</label>
        <input type="text" name="video" required><br>
        <input type="submit" value="Añadir Demonio">
    </form>
</body>
</html>