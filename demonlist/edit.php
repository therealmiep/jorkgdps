<?php
session_start();

$id = $_GET['id'] ?? null;
$filePath = "levels/demonio_$id.json";

if ($id && file_exists($filePath)) {
    $demonio = json_decode(file_get_contents($filePath), true);
} else {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $demonio['puesto'] = $_POST['puesto'];
    $demonio['nombre'] = $_POST['nombre'];
    $demonio['video'] = $_POST['video'];
    $demonio['descripcion'] = $_POST['descripcion'];

    // Guardar los cambios en el archivo JSON
    file_put_contents($filePath, json_encode($demonio));

    // Redirigir a index.php
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Demonio</title>
</head>
<body>
    <h1>Editar Demonio</h1>
    <form method="post">
        <label for="puesto">Puesto:</label>
        <input type="text" name="puesto" value="<?php echo htmlspecialchars($demonio['puesto']); ?>" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($demonio['nombre']); ?>" required><br>
        <label for="video">Video:</label>
        <input type="text" name="video" value="<?php echo htmlspecialchars($demonio['video']); ?>" required><br>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required><?php echo htmlspecialchars($demonio['descripcion']); ?></textarea><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>