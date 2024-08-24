<!DOCTYPE html>
<html lang="en">
   <?php include ("conexion.php"); ?>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>mytienda</title>
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
                     <a class="nav-link" href="index.html">Inicio</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Categorias</a>
                  </li>
                  <li class="nav-item">
                   <!--  <a class="nav-link" href="tv.html">TV</a>-->
                  </li>
                  <li class="nav-item">
                     <!--<a class="nav-link" href="celebs.html">Celebs</a>-->
                  </li>
               </ul>
               <!--<div class="search_icon"><a href="#"><img src="images/notification-icon.png"><span class="padding_left_15">Notificastion</span></a></div>-->
               <div class="search_icon"><a href="carrito.php"><img src="images/eye-icon.png"><span class="padding_left_15">Carrito</span></a></div>
              
               <form method="POST" action="buscar.php" class="d-flex align-items-center search_icon">
    <img src="images/search-icon.png" alt="Buscar" class="me-2">
    <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar..." required>
    <button type="submit" class="btn btn-primary ms-2" style="background-color: blueviolet;">Buscar</button>
</form>

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
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?php
                     $id=$_COOKIE['idsesion'];
                     $consulta="SELECT nombre FROM usuarios WHERE idusuario=".$id;
                     $result=mysqli_query($conexion,$consulta);
                     $row=$result->fetch_assoc();
                     $nombre=$row['nombre'];
                    echo  '<img src="images/user-icon.png"><span class="padding_left_15">'.$nombre.'</span>';
                     ?>
                  </button>
 
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
      <!-- banner section end -->
      <div class="banner_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="banner_taital">Bienvenido <br> a Mytienda</div>
                  <p class="banner_text">El mejor lugar para tirar tu dinero en toda la internet.. </p>
                  <div class="see_bt"><a href="#">See More</a></div>
               </div>
               <div class="col-md-6">
                  <!--<div class="play_icon"><a href="#"><img src="images/play-icon.png"></a></div>-->
               </div>
            </div>
         </div>
      </div>
      <!-- banner section end -->
      
      <!-- movies section start -->
      <div class="movies_section layout_padding">
         <div class="container">
            <div class="movies_menu">
               
               <ul>
                  <li class="active"><a href="#">Productos destacados</a></li>
                  
                  <!--
                  <li><a href="tv.html">TV</a></li>
                  <li><a href="movies.html">Movies</a></li>
                  <li><a href="#">Show</a></li>
                  <li><a href="celebs.html">Celeb</a></li>
                  <li><a href="#">Sports</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="#">Cartoon</a></li>
                  -->
               </ul>
            </div>
            <div class="movies_section_2 layout_padding">
               <h2 class="letest_text">Mas vendidos</h2>
               <div class="seemore_bt"><a href="#">See More</a></div>
               <div class="movies_main">
                  <div class="iamge_movies_main">
                     <!-- INICIA SECCION DE CONSULTAS DE PRODUCTOS MAS VENDIDOS-->
                       <?php 
                       
                       for($i=1; $i<= 5; $i++){
                        $consulta= "SELECT * FROM productos WHERE idproducto =".$i;
                        $result= mysqli_query($conexion, $consulta);
                        $dato=$result->fetch_array();

                        $nombre=$dato['nombre'];
                        $precio=$dato['precio'];

                        echo " <div class='iamge_movies'>";
                        echo "<div class='image_3'>";
                         echo "<img src='images/img-".($i+1).".png' class='image' style='width:100%'>";
                         echo"<div class='middle'>";
                          echo "<div class='playnow_bt'>Detalles</div>";
                          echo" </div>";
                        echo"</div>";
                            echo "<h1 class='code_text'>".$nombre."</h1>";
                            echo "<p class='there_text'>precio ".$precio." mxn </p>";
                             echo "<div class='star_icon'>";
                          echo" <ul>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>"; 
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                           echo "</ul>";
                       echo  "</div>";
                        echo "</div>";
                        
                       }

                       ?>
                      <!-- TERMINA SECCION DE CONSULTAS DE PRODUCTOS MAS VENDIDOS-->
                  </div>
               </div>
            </div>
            <div class="movies_section_2 layout_padding">
               <h2 class="letest_text">Populares</h2>
               <div class="seemore_bt"><a href="#">See More</a></div>
               <div class="movies_main">
                  <div class="iamge_movies_main">
                      <!-- INICIA SECCION DE CONSULTAS DE PRODUCTOS MAS VENDIDOS-->
                      <?php 
                       
                       for($i=6; $i<= 10; $i++){
                        $consulta= "SELECT * FROM productos WHERE idproducto =".$i;
                        $result= mysqli_query($conexion, $consulta);
                        $dato=$result->fetch_array();

                        $nombre=$dato['nombre'];
                        $precio=$dato['precio'];

                        echo " <div class='iamge_movies'>";
                        echo "<div class='image_3'>";
                         echo "<img src='images/img-".($i+1).".png' class='image' style='width:100%'>";
                         echo"<div class='middle'>";
                          echo "<div class='playnow_bt'>Detalles</div>";
                          echo" </div>";
                        echo"</div>";
                            echo "<h1 class='code_text'>".$nombre."</h1>";
                            echo "<p class='there_text'>precio ".$precio." mxn </p>";
                             echo "<div class='star_icon'>";
                          echo" <ul>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>"; 
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                           echo "</ul>";
                       echo  "</div>";
                        echo "</div>";
                        
                       }

                       ?>
                      <!-- TERMINA SECCION DE CONSULTAS DE PRODUCTOS MAS VENDIDOS-->
                  </div>
               </div>
            </div>
            <div class="movies_section_2 layout_padding">
               <h2 class="letest_text">Recientemente añadidos</h2>
               <div class="seemore_bt"><a href="#">See More</a></div>
               <div class="movies_main">
                  <div class="iamge_movies_main">
                      <!-- INICIA SECCION DE CONSULTAS DE PRODUCTOS MAS VENDIDOS-->
                      <?php 
                       
                       for($i=11; $i<= 15; $i++){
                        $consulta= "SELECT * FROM productos WHERE idproducto =".$i;
                        $result= mysqli_query($conexion, $consulta);
                        $dato=$result->fetch_array();

                        $nombre=$dato['nombre'];
                        $precio=$dato['precio'];

                        echo " <div class='iamge_movies'>";
                        echo "<div class='image_3'>";
                         echo "<img src='images/img-".($i+1).".png' class='image' style='width:100%'>";
                         echo"<div class='middle'>";
                          echo "<div class='playnow_bt'>Detalles</div>";
                          echo" </div>";
                        echo"</div>";
                            echo "<h1 class='code_text'>".$nombre."</h1>";
                            echo "<p class='there_text'>precio ".$precio." mxn </p>";
                             echo "<div class='star_icon'>";
                          echo" <ul>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>"; 
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                            echo "<li> <a href='#'> <img src='images/star-icon.png'> </a></li>";
                           echo "</ul>";
                       echo  "</div>";
                        echo "</div>";
                        
                       }

                       ?>
                      <!-- TERMINA SECCION DE CONSULTAS DE PRODUCTOS MAS VENDIDOS-->
                  </div>
               </div>
            </div>
            <div class="seebt_1"><a href="#">See More</a></div>
         </div>
      </div>
      <!-- movies section end -->
      
      <!-- footer  section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_menu">
               <ul>
                  <li><a href="index.html">Tecnologia</a></li>
                  <li><a href="movies.html">Hogar</a></li>
                  <li><a href="tv.html">Digital</a></li>
                  <li><a href="celebs.html">Musica y peliculas</a></li>
                  <li><a href="#">Servicios</a></li>
                  <li><a href="#">Otros</a></li>
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
            <div class="copyright_text">Copyright 2019 All Right Reserved By mytienda.com</a></div>
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