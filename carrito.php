<?php
include("conexion.php");

// ID del usuario (puedes obtenerlo de la sesión o de una variable)
$id_usuario = $_COOKIE['idsesion']; // Cambia este valor según el usuario actual

// Verificar si se ha enviado una solicitud de eliminación
if (isset($_POST['eliminar'])) {
    $idcompra = $_POST['idcompra'];

    // Eliminar el producto pendiente de la tabla 'compras'
    $sql_delete = "DELETE FROM compras WHERE idcompra = ? AND idcomprador = ?";
    $stmt_delete = $conexion->prepare($sql_delete);
    $stmt_delete->bind_param("ii", $idcompra, $id_usuario);
    $stmt_delete->execute();
    $stmt_delete->close();

    // Redireccionar para evitar reenvío del formulario
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Consulta SQL para obtener los productos pendientes del usuario
$sql = "SELECT p.nombre, p.precio, c.idcompra, c.cantidad, c.estado
        FROM compras c
        JOIN productos p ON c.idproducto = p.idproducto
        WHERE c.idcomprador = ? AND c.estado = 'pendiente'";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$total=0;

?>

<!DOCTYPE html>
<html lang="es">
<style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table {
            margin-top: 20px;
            background-color: blueviolet;
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Pendientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="header_section">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="logo" href="index.php"><img src="images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="index.php">Inicio</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href=# >Categorias</a>
                  </li>
                  <li class="nav-item">
                   <!--  <a class="nav-link" href="tv.html">TV</a>-->
                  </li>
                  <li class="nav-item">
                     <!--<a class="nav-link" href="celebs.html">Celebs</a>-->
                  </li>
               </ul>
    </div>
         </nav>
      </div>
    <div class="container mt-5">
    <div class="table-container"style="background-color: blueviolet;">
        <h1 class="text-center"style="color: white;">Carrito de compras</h1>
        <table class="table table-bordered" >
            <thead >
                <tr >
                    <th>Nombre del Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['precio']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cantidad']) . "</td>";
                        
                        echo "<td>
                         <form method='post' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
                                        <input type='hidden' name='idcompra' value='" . htmlspecialchars($row['idcompra']) . "'>
                                        <button type='submit' name='eliminar' class='btn btn-danger'>Eliminar</button>
                                    </form>
                                  </td>";
                                  echo "</tr>";

                        $cantidad=$row['cantidad'];
                        $precio=$row['precio'];
                        $total=$total+($precio*$cantidad);
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay productos en el carrito.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <?php echo '<h2 class="text-center"style="color: white;">Total : $'.$total.'.00mxn</h2>'; ?>
        <div class="d-grid gap-2 col-6 mx-auto">
        <button type="button" class="btn btn-light btn-lg">Comprar</button>
        </div>
    </div>
    </div>

    <!-- JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Cerrar la conexión
$conexion->close();
?>
