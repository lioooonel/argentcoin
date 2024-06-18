<?php
include 'conectar.php';

// Recibir los datos enviados desde la página web
$data = json_decode(file_get_contents('php://input'), true);

// Verificar si se recibieron datos
if (!empty($data)) {
    // Procesar los datos recibidos
    foreach ($data as $item) {
        // Validar los datos recibidos
        if (isset($item['cod_producto'])) {
            $cod_producto = mysqli_real_escape_string($conectar, $item['cod_producto']);

            // Verificar si ya existe una entrada para este producto
            $s = "SELECT * FROM `coleccion` WHERE monedaID='$cod_producto'";
            $res = mysqli_query($conectar, $s);

            if (mysqli_num_rows($res) > 0) {
                echo '<script>alert("Ya intentaste guardar eso"); window.location="consultas.html";</script>';
            } else {
                // Consulta SQL para insertar los datos en la base de datos
                $sql = "INSERT INTO coleccion (monedaID, cantidad, usuarioID) VALUES ('$cod_producto', 'A', '12')";

                $res = mysqli_query($conectar, $sql);

                // Verificar si la consulta se ejecutó correctamente
                if ($res) {
                    // Enviar una respuesta de éxito al cliente
                    echo json_encode(array('success' => true, 'message' => 'Sus datos han sido cargados'));
                } else {
                    // Enviar una respuesta de error al cliente
                    echo json_encode(array('success' => false, 'message' => 'Ha ocurrido un error al cargar sus datos. Vuelva a intentar'));
                }
            }
        } else {
            // Los datos no son válidos
            echo json_encode(array('success' => false, 'message' => 'Los datos recibidos no son válidos'));
        }
    }
} else {
    // No se recibieron datos válidos
    echo json_encode(array('success' => false, 'message' => 'No se recibieron datos válidos'));
}

// Cerrar la conexión a la base de datos
mysqli_close($conectar);
?>