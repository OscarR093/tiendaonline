<?php
// Conectar a la base de datos

include("conexion.php");

// Capturar el término de búsqueda (por ejemplo, desde un formulario)
$busqueda = $conexion->real_escape_string($_POST['buscar']);

// Crear la consulta SQL
$sql = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%'";

// Ejecutar la consulta
$resultado = $conexion->query($sql);

// Crear un arreglo para almacenar los productos
$productos = array();



?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Movies</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
    <?php // include ("conexion.php");?>
      <!-- header section start -->
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
               <!--<div class="search_icon"><a href="#"><img src="images/notification-icon.png"><span class="padding_left_15">Notificastion</span></a></div>-->
               <div class="search_icon"><a href="#"><img src="images/eye-icon.png"><span class="padding_left_15">Carrito</span></a></div>
              
               

               <div class="dropdown">
                  <style>
                     .dropdown{
                        display: flex;
                        margin: 15px;
                        padding-left: 15;
                     }
                     .btn-secondary{
                        background-color: blueviolet ;
                     }
                  </style>
                  <?php
                  if(isset($_COOKIE['idsesion'])){
                     ?>
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?php
                     $id1=$_COOKIE['idsesion'];
                     $consulta="SELECT nombre FROM usuarios WHERE idusuario=".$id1;
                     $result=mysqli_query($conexion,$consulta);
                     $row=$result->fetch_assoc();
                     $nombre=$row['nombre'];
                    echo  '<img src="images/user-icon.png"><span class="padding_left_15">'.$nombre.'</span>';
                   ?>
                  </button>

                  <?php
                  }
                  else{
                     echo '<div class="search_icon"><a href="sing-in.php"><img src="images/user-icon.png"><span class="padding_left_15">Acceder</span></a></div>';
                  }
                  ?>
 
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Mis pedidos</a>
    <a class="dropdown-item" href="#">Editar perfil</a>
    <a class="dropdown-item" href="FormSubir_producto.php">Vender</a>
    <a class="dropdown-item" href="log_out.php">Cerrar sesion</a>
  </div>

               
            </div>
         </nav>
      </div>
      <!-- header section end -->
      <!-- movies section start -->
      <div class="movies_section layout_padding">
         <div class="container">
         <h2 class="letest_text">Resultados</h2>  

            <div class="movies_section_2 layout_padding">   
            <!-- <div class="seemore_bt"><a href="#">See More</a></div> -->
            <div class="container">

                  <?php 
                  // Verificar si se encontraron resultados
     if ($resultado->num_rows > 0) {
    // Recorrer los resultados y agregar cada producto al arreglo
    while($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;  // Agregar cada fila al arreglo $productos
    }
    foreach($productos as $producto){  // ESTA SENTENCIA ES MUY NECESARIA PARA MANEJAR LOS DATOS, ESTUDIAR DESPUES

        $imagen=$producto['imagen'];
        $nombre=$producto['nombre'];
        $precio=$producto['precio'];
        $descripcion=$producto['descripcion'];
        $id=$producto['idproducto'];


       
        
         ?>
         <html>

         <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex align-items-center p-2 border-bottom">
                <div class="me-3">
                    <form action="producto.php" method="$_GET">
                   <?php echo '<input type="hidden" name="id" value='.$id.'>';?>
                   <?php  echo '<input type="image" src="'.$imagen.'" class="img-fluid" alt="producto" style="width: 150px; height: 150px">'; ?>
                   </form> 
                   <div class="middle">
                        <div class="playnow_bt">Play Now</div>
                    </div>
                </div>
                <div>
                    <?php
                   echo '<h1 class="code_text">'.$nombre.'</h1>';
                    echo '<p class="there_text">$'.$precio.'.00 MXN</p>';
                    echo '<p class="there_text">'.$descripcion.'</p>';
                    ?>

                    <div class="star_icon">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="#"><img src="images/star-icon.png"></a></li>
                            <li class="list-inline-item"><a href="#"><img src="images/star-icon.png"></a></li>
                            <li class="list-inline-item"><a href="#"><img src="images/star-icon.png"></a></li>
                            <li class="list-inline-item"><a href="#"><img src="images/star-icon.png"></a></li>
                            <li class="list-inline-item"><a href="#"><img src="images/star-icon.png"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

         </html>
         <?php





        }
} else {
    echo "No se encontraron productos para '$busqueda'";
}

// Cerrar la conexión
$conexion->close();

// Ahora $productos contiene todos los productos que coinciden con la búsqueda
                  ?>




    
    
    
</div>


                     

                  </div>
               </div>
            </div>


             <!--<div class="seebt_1"><a href="#">See More</a></div>-->
         </div>
      </div>
      <!-- movies section end -->
      <!-- footer  section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_menu">
               <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="movies.html">Movies</a></li>
                  <li><a href="tv.html">TV</a></li>
                  <li><a href="celebs.html">Celebs</a></li>
                  <li><a href="#">Sports</a></li>
                  <li><a href="#">News</a></li>
               </ul>
            </div>
            <div class="social_icon">
               <ul>
                  <li><a href="#"><img src="images/fb-icon.png"></a></li>
                  <li><a href="#"><img src="images/twitter-icon.png"></a></li>
                  <li><a href="#"><img src="images/linkedin-icon.png"></a></li>
                  <li><a href="#"><img src="images/instagram-icon.png"></a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- footer  section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <div class="copyright_text">Copyright 2019 All Right Reserved By <a href="https://html.design">Free html Templates</a></div>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         $('#datepicker').datepicker({
             uiLibrary: 'bootstrap4'
         });
      </script>
   </body>
</html>