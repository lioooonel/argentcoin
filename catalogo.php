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
                $sql = "SELECT * FROM moneda, estado ";
                $resultado = mysqli_query($conectar, $sql);

                if (mysqli_num_rows($resultado) > 0) {
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo '<div class="contenedor">';
                        echo '<div class="contenedor-items">';
                        echo '<section class="item">';
                        echo '<h3 class="cod_producto"hidden>' . $fila['monedaID'] . '</h3>';
                        echo '<div class="moneda-coint"><img src="moneda/'. $fila['imgAnverso'].'" class="moneda anverso">';
                        echo '<img src="moneda/'. $fila['imgReverso'].'" class="moneda reverso"></div>';
                        echo '<h2 class="info-item">Valor nominal: $' . $fila['descripcion'] . '</h2>';
                        echo '<h3 class="info-item">Estado: ' . $fila['estadoNombre'] . '</h3>';
                        echo '<h3 class="info-item">Valor mercado: $' . $fila['valorMercado'] . '</h3>';
                        echo '<button class="boton-item">C</button>';
                        echo ' </section></div>';
                        echo '</div>';
                    }
                } else {
                    echo '<h2 class="adv-no">No se encontraron productos.</h2>';
                }

                mysqli_free_result($resultado);
                ?>
            </div>
        </article>
    </main>
</body>

</html>