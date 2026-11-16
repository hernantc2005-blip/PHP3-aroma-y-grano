<?php
require_once 'conexion.php';

$mensaje = '';
$tipo_alerta = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = 'Administrador';
    $email = 'admin@aromaygrano.com';
    $password = 'Admin123*';
    $rol = 'admin';
    // Generar el hash oficial de PHP de forma automática
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
}

try {
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $email, $password_hash, $rol]);
    $mensaje = "¡Administrador creado con éxito! Ya puedes iniciar sesión.";
    $tipo_alerta = "success";
} catch (PDOException $e) {
    $mensaje = "El administrador ya existe en la base de datos o hubo un error: " . $e->getMessage(); 
    $tipo_alerta = "danger";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalación del Sistema | Aroma y Grano</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <header>
    <h1>Aroma <span>& Grano</span></h1>
    <nav>
        <a href="index.php">Catálogo</a>
        <a href="login.php">Ingresar</a>
    </nav>
</header>
<main class="main-content">
    <div class="container" style="max-width: 600px;
    margin-top: 4rem;">
        <div style="background: white; padding: 3rem;
        border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        text-align: center;">
            <h2 style="color: var(--primary-color);
            margin-bottom: 1rem;">Instalación Inicial del Sistema</h2>
            <p style="color: #666; margin-bottom: 2rem;">Este asistente configurará el usuario administrador por defecto para que puedas comenzar a administrar tu e-commerce de café.</p>

            <?php if (!empty($mensaje)): ?>
                <div style="padding: 1rem; border-radius:
5px; margin-bottom: 2rem; background: <?php echo $tipo_alerta ===
'success' ? '#d4edda' : '#f8d7da'; ?>; color: <?php echo
$tipo_alerta === 'success' ? '#155724' : '#721c24'; ?>;">
                        <?php echo $mensaje; ?>
                    </div>
                <?php endif; ?>

















</body>
</html>