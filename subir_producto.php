

<?php
//ajustar la base de datos antes de ejecutar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria=$_POST['categoria'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id=$_COOKIE['idsesion'];

    // Manejo de la imagen
    $imagen = $_FILES['imagen'];
    $imagenNombre = $imagen['name'];
    $imagenTmpNombre = $imagen['tmp_name'];
    $imagenDestino = 'images/' . basename($imagenNombre);

    // Crear directorio si no existe
    if (!is_dir('images')) {
        mkdir('images', 0777, true);
    }

    // Mover la imagen al directorio destino
    if (move_uploaded_file($imagenTmpNombre, $imagenDestino)) {
        
         include("conexion.php");
        

        // Preparar la sentencia SQL
        $sql = $conexion->prepare("INSERT INTO productos (nombre, descripcion,categoria, precio, stock, imagen, id_usuario) VALUES (?, ?, ?, ?, ?,?,?)");
        $sql->bind_param("ssidisi", $nombre, $descripcion, $categoria, $precio, $stock, $imagenDestino, $id);//ojo con la s

        // Ejecutar la consulta
        if ($sql->execute()) {
            ?>
            <script>
        window.onload = function() {
            var myModal = new bootstrap.Modal(document.getElementById('miModal'));
            myModal.show();
        };
    </script>
            <?php
           // echo "El producto ha sido subido y guardado en la base de datos exitosamente.";
        } else {
            echo "Error al guardar el producto en la base de datos: " . $sql->error;
        }

        // Cerrar la conexión
        $sql->close();
        $conexion->close();
    } else {
        echo "Hubo un error al subir la imagen.";
    }
}
?>


              <html>
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
              
              <div class="modal" tabindex="-1" id="miModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Exito</h5>
        <a href="FormSubir_producto.php">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </a>
      </div>
      <div class="modal-body">
        <p>Producto registrado correctamente.</p>
      </div>
      <div class="modal-footer">
      <a href="FormSubir_producto.php">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" href="index.php">Close</button>
        </a>
      </div>
    </div>
  </div>
</div>

              </html>