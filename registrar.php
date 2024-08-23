<?php
include ("conexion.php");
if (!empty($_POST["btningre"])){
    
    if (empty($_POST["email"]) or empty($_POST["name"]) or empty($_POST["password"])  ){
        echo '<div class="alert alert-danger">RELLENE TODOS LOS CAMPOS</div>';
    }
    else{
        $email=$_POST["email"];
        $name=$_POST["name"];
        $password=$_POST["password"];
        $password2=$_POST["password2"];
        

        if ($password == $password2) {
            $sql = "SELECT COUNT(*) AS count FROM usuarios WHERE email = ?";

            // Preparar la sentencia
            $stmt = $conexion->prepare($sql);
            
            // Vincular parámetros
            $stmt->bind_param("s", $email);
            
            // Ejecutar la consulta
            $stmt->execute();
            
            // Obtener el resultado
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            
            if ($row['count'] > 0) {
                echo '<div class="alert alert-danger"> El correo electrónico ya está registrado.</div>';
            } else {
                $consulta= "INSERT INTO usuarios (email, nombre, contrasena)
                VALUES ('$email', '$name', '$password');";
                 $result= mysqli_query($conexion, $consulta);
                 ECHO "Registro completado";
   
                 $_POST=array();
                 unset($_POST["btningre"]);
                     
              ?>


              <html>
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
              
              <div class="modal" tabindex="-1" id="miModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registro</h5>
        <a href="sing-in.php">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
        </a>
      </div>
      <div class="modal-body">
        <p>Usuario registrado correctamente.</p>
      </div>
      <div class="modal-footer">
      <a href="sing-in.php">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" href="index.php">Close</button>
        </a>
      </div>
    </div>
  </div>
</div>
<script>
        window.onload = function() {
            var myModal = new bootstrap.Modal(document.getElementById('miModal'));
            myModal.show();
        };
    </script>
              </html>

              <?php
            }
            
            
               

        

        }

        else{
            echo '<div class="alert alert-danger">LAS CONTRASEÑAS NO COINCIDEN</div>';
        }

        
    }

   
}





?>