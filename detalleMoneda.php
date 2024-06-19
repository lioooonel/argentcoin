<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="header.css">
    <link rel="stylesheet" type="text/css" href="Moneda.css">
    <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Detalles de la Moneda</title>
    <style>
        .contenedor {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            color: #fff
        }
        .contenedor-items {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .item {
            margin-right: 20px;
        }
        .img-item {
            max-width: 100px;
            height: auto;
        }
        .fullpost {
            margin-top: 10px;
        }
        .precio-item {
            display: block;
            margin-top: 5px;
        }
        .tabla-detalle {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }
        .tabla-detalle th, .tabla-detalle td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        body{
            
        }
    </style>
</head>
<body>
<?php
    include 'header.php';
    include 'nav_inicial.php';
    ?>
    <main>
    <article class="conten-prin">
    <div class="productos-container">
        <?php
        include 'conectar.php';
        $monea=$_GET['id'];
        $stql = "SELECT m.*, f.formaNombre, e.estadoNombre FROM moneda m LEFT JOIN forma f ON m.formaID = f.formaID LEFT JOIN estado e ON m.estadoID = e.estadoID WHERE m.monedaID = '$monea';";
        $resultd = mysqli_query($conectar, $stql);

        if (mysqli_num_rows($resultd) > 0) {
            while ($fila = mysqli_fetch_assoc($resultd)) {
                echo '<p class="titulo">' . $fila['descripcion'] . '</p>';
                echo '<section class="cont-img-moneda">';
                echo '<img class="imagen-moneda" src="moneda/' . $fila['imgAnverso'] .'" alt="Anverso" class="img-item">';
                echo '<img class="imagen-moneda" src="moneda/' . $fila['imgReverso'] .'" alt="Reverso" class="img-item">';
                echo '</section>';
                echo '<section class="info-moneda">';
                echo '<span class="fullpost">';
                echo '</span>';
                echo '<h3 class="info">Estado: '.$fila['estadoNombre'] . '</h3>';
                echo '<span class="info">Valor nominal: $' . $fila['valorNominal'] . '</span>';
                echo '<span class="info">Valor mercado: $' . $fila['valorMercado'] . '</span>';
                echo '</section>';
            }
        } else {
            echo "No se encontraron productos.";
        }
        ?>

    <div id="detalleContent" style="display: none;">
        <!-- Aquí se mostrará el contenido de Detalle -->
    </div>
    
    <div id="infoContent" style="display: none;">
        <!-- Aquí se mostrará el contenido de Información -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
    </div>    
</article>
    </main>
</body>
</html>
