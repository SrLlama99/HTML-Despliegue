<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Rodrigo de Mora</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <?php
  // Configuramos la conexión con manejo de errores
  $cadena_conexion = 'mysql:dbname=saludos;host=184.72.199.13';
  $usuario = 'usuario_remoto';
  $clave = '123456789';

  try {
      // Usamos atributos para que PDO lance excepciones si algo falla
      $bd = new PDO($cadena_conexion, $usuario, $clave, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]);
  } catch (PDOException $e) {
      $error_db = "Error conectando a la base de datos.";
  }
  ?>

  <div class="contenedor">
    <h1>Rodrigo de Mora</h1>
    <p id="mensaje">¡Bienvenido a mi página personal!</p>
    <p id="mensaje2">Frase añadida para completar la práctica 4.1</p>
    <p id="mensaje3">Este párrafo es para cambiar el index</p>
    <img src="images/Getafe_CF_Logo.png"><br>

    <form method="post" id="form">
      <p>Indica tu nombre: <input type="text" id="message" name="message" required></p>
      <input type="submit" value="Enviar">
    </form>

    <?php
    if (!isset($_POST['message']) || empty(trim($_POST['message']))) {
        echo '<p id="mensaje4">¡Hola de nuevo!</p>';
    } else {
        // Limpiamos la entrada del usuario para seguridad
        $nombre = htmlspecialchars($_POST['message']);
        
        if (isset($bd)) {
            $sql = "SELECT texto FROM saludos ORDER BY RAND() LIMIT 1";
            $sentencia = $bd->query($sql);
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            $saludo_db = ($resultado) ? $resultado['texto'] : "Hola";
            
            echo '<p id="mensaje4">' . $saludo_db . " " . $nombre . '!</p>';
        } else {
            // Si la base de datos falló, usamos un saludo genérico
            echo '<p id="mensaje4">Hola ' . $nombre . ' (Base de datos desconectada)!</p>';
        }
    }
    ?>
  </div>
</body>
</html>