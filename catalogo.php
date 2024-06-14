<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="catalogo.css">
    <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="menu_desplegable.js"></script>
    <title>Argentcoin</title>
</head>

<body>
    <?php
    include 'header.php';
    include 'nav_inicial.php';
    ?>
    <main>
        <article class="conten-prin">
            <h1 class="titulo">Catalogo</h1>
            <div class="productos-container">
                <?php
                include 'conectar.php';
                $sql = "SELECT * FROM moneda";
                $resultado = mysqli_query($conectar, $sql);

                if (mysqli_num_rows($resultado) > 0) {
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<div class='contenedor'>";
                        echo "<div class='contenedor-items'>";
                        echo "<section class='item'>";
                        echo "<span class='cod_producto'hidden>" . $fila['monedaID'] . "</span>";
                        echo "<span class='titulo-item'> dajsdsd</span>";
                        echo "<img src='" . $fila['imgAnverso'] . "'alt='' class='img-item'>";
                        echo "<span class='fullpost'>";
                        echo "<p>" . $fila['descripcion'] . "</p>";
                        echo "</span>";
                        echo "<span class='precio-item'>Valor nominal: $" . $fila['valorNominal'] . "</span>";
                        echo "<span class='precio-item'>Valor mercado: $" . $fila['valorMercado'] . "</span>";
                        echo '<button class="boton-item"> Agregar a la colección</button>';
                        echo " </section></div>";
                        echo "</div>";
                    }
                } else {
                    echo "No se encontraron productos.";
                }

                mysqli_free_result($resultado);
                ?>
            </div>
        </article>
    </main>
</body>

</html>