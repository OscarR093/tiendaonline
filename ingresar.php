<?php
include ("conexion.php");
if (!empty($_POST["btnin"])){

    $email = $_POST['email'];
$password = $_POST['password'];

//echo "$password";

// Preparar la consulta SQL
$sql = "SELECT contrasena FROM usuarios WHERE email = ?";

// Preparar la sentencia
$stmt = $conexion->prepare($sql);

// Vincular el parámetro
$stmt->bind_param("s", $email);

// Ejecutar la consulta
$stmt->execute();

// Obtener el resultado
$result = $stmt->get_result();

// Verificar si el correo existe en la base de datos
if ($result->num_rows > 0) {
    // Obtener la fila resultante
    $row = $result->fetch_assoc();
  //  echo $row['contrasena'];
    $hashed_password = $row['contrasena'];

   // echo "$hased_password";

    // Verificar la contraseña ingresada contra la almacenada
    if ($row['contrasena']== $password) {
      //  echo "Login exitoso. ¡Bienvenido!";
      
      $tabla = "usuarios";
      $dato = "idusuario";
      
      // Llamada al método e_consulta
      include("e_consulta.php");
      $resultado = e_consulta($email, $tabla, $dato);
      
      // Verificar si se obtuvo un resultado
      if ($resultado !== null) {
          echo "El valor del campo '$dato' para el usuario '$email' es: $resultado";
          $id=$resultado;
         setcookie("idsesion", $id, strtotime( '+30 days' ));
      } else {
          echo "No se encontró el usuario con el correo '$email' o hubo un error en la consulta.";
          $id="error";
      }
        
        ?>
        <HTMl>
        
        <script>
    window.onload = function() {
        var myModal = new bootstrap.Modal(document.getElementById('miModal1'));
        myModal.show();
    };
</script>
</HTMl>
<?php
        // Aquí podrías iniciar la sesión, redirigir al usuario, etc.
        //session_start();
        
       // $_SESSION['email'] = $email;
        // Redirigir a una página de inicio
       // header("Location: pagina_inicio.php");
       // exit();

    } else {
        echo '<div class="alert alert-danger"> Contraseña incorrecta.</div>';
    }
} else {
    echo '<div class="alert alert-danger">El correo electrónico no está registrado.</div>';
}
    
   
           

        }
        
    

                     
              ?>


              <html>
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
              
              <div class="modal" tabindex="-1" id="miModal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Acceso exitoso</h5>
        <a href="index.php">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </a>
      </div>
      <div class="modal-body">
        <?php echo "<p>Bienvenido.</p> "?>
      </div>
      <div class="modal-footer">
      <a href="index.php">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" href="index.php">Close</button>
        </a>
      </div>
    </div>
  </div>
</div>

              </html>

              <?php
            
            
            
               

        

        

        

        
    

   






?>