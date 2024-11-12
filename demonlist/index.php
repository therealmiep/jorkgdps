<?php
session_start();

// Obtener la lista de demonios desde la carpeta levels
$demonios = [];

// Leer todos los archivos en la carpeta levels
foreach (glob("levels/*.json") as $file) {
    $demonio = json_decode(file_get_contents($file), true);
    if ($demonio) {
        $demonios[] = $demonio;
    }
}

// Ordenar los demonios por el puesto
usort($demonios, function ($a, $b) {
    return $a['puesto'] <=> $b['puesto'];
});
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../config.php' ?>
    <title>Demon List</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        html, body {
            height: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        /* Contenido principal */
        main {
            flex: 1;
            padding: 10px; /* Reducido para pantallas pequeñas */
            margin: 20px auto;
            width: 90%;
            max-width: 600px; /* Reducido para pantallas pequeñas */
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        header {
            background: #333;
            color: #fff;
            padding: 15px 0; /* Reducido para pantallas pequeñas */
        }

        header h1 a {
            color: #ffffff;
            text-decoration: none;
            font-size: 2rem; /* Reducido para pantallas pequeñas */
        }

        /* Contenido principal */
        main h2 {
            font-size: 1.5rem; /* Reducido para pantallas pequeñas */
            margin-bottom: 10px;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        thead {
            background-color: #af4c4c;
            color: white;
        }

        th, td {
            padding: 8px; /* Reducido para pantallas pequeñas */
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px 0; /* Reducido para pantallas pequeñas */
            background: #333;
            color: #fff;
        }

        footer p {
            margin-bottom: 10px;
        }

        /* Redes sociales */
        .social-links {
            margin-top: 10px;
        }

        .social-links a {
            margin: 0 5px; /* Reducido para pantallas pequeñas */
        }

        .social-links img {
            width: 25px; /* Reducido para pantallas pequeñas */
            height: auto;
        }

        /* Media Queries para pantallas pequeñas */
        @media (max-width: 600px) {
            header h1 a {
                font-size: 1.5rem; /* Ajustado para pantallas pequeñas */
            }

            main h2 {
                font-size: 1.2rem; /* Ajustado para pantallas pequeñas */
            }

            th, td {
                padding: 6px; /* Ajustado para pantallas pequeñas */
            }
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="#">Demon List</a></h1>
    </header>
    
    <main>
        <h2><b><?php echo $dlWelcome ?></b></h2>
        
        <table>
            <thead>
                <tr>
                    <th><?php echo $position ?></th>
                    <th><?php echo $name ?></th>
                    <th><?php echo $creator ?></th>
                    <th><?php echo $video ?></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demonios as $demonio): ?>
                    <tr>
                        <td data-label="Puesto"><?php echo htmlspecialchars($demonio['puesto']); ?></td>
                        <td data-label="Nombre"><?php echo htmlspecialchars($demonio['nombre']); ?></td>
                        <td data-label="Creador"><?php echo htmlspecialchars($demonio['creador']); ?></td>
                        <td data-label="Video del Demon">
                            <a href="<?php echo htmlspecialchars($demonio['video']); ?>" target="_blank">
                                <i class="fas fa-video"></i> <?php echo $verification ?>
                            </a>
                        </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p><?php echo $footer ?></p>
    </footer>
</body>
</html>
