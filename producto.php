
<?php

$id=$_GET["id"];

//echo $id;
include ("conexion.php");
$consulta="SELECT * FROM productos WHERE idproducto=".$id;
$result=mysqli_query($conexion,$consulta);
$row=$result->fetch_assoc();

$pnombre=$row['nombre'];
$pprecio= $row['precio'];
$pdescripcion=$row['descripcion'];
$pimg=$row['imagen'];
$pstock=$row['stock'];
$pcate=$row['categoria'];


//echo $pnombre;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
               <div class="search_icon"><a href="carrito.php"><img src="images/eye-icon.png"><span class="padding_left_15">Carrito</span></a></div>
              
              

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
               </div>

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
</head>

<body>
 
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="margin: 10px;">

                    <?php
                     echo '<img src='.$pimg.' class="card-img-top" alt='.$pnombre.'>';
                    ?> 
                    <div class="card-body">
                    <?php
                     echo '<h5 class="card-title">'.$pnombre.'</h5> ';
                       echo ' <p class="card-text">'.$pdescripcion.'.</p>';
                      echo ' <p class="card-text"><strong>Precio:</strong>$ '.$pprecio.'.00mxn</p>';
                      echo '<p class="card-text"><strong>Stock:</strong> '.$pstock.' unidades disponibles </p>';

                      switch($pcate){
                        case 1:
                            $pcategoria="Electronica";
                            break;
                            case 2:
                                $pcategoria="Libros y medios";
                                break;
                            case 3:
                                $pcategoria="Ropa y calzado";
                                break;
                                case 4:
                                    $pcategoria="Hogar y cocina";
                                    break;
                                    case 5:
                                        $pcategoria="Salud y cuidado personal";
                                        break;
                                        case 6:
                                            $pcategoria="Juguetes y niños";
                                            break;
                                            case 7:
                                                $pcategoria="Deporte y aire libre";
                                                break;
                                                case 8:
                                                    $pcategoria="Automotriz";
                                                    break;
                                                    case 9:
                                                        $pcategoria="Alimentos y bebidas";
                                                        break;
                                                        case 10:
                                                            $pcategoria="Hobbies";
                                                            break;
                                                            case 11:
                                                                $pcategoria="Mascotas";
                                                                break;
                                                                case 12:
                                                                    $pcategoria="Papeleria";
                                                                    break;
                                                                    case 13:
                                                                        $pcategoria="Herramientas";
                                                                        break;
                                                                        case 14:
                                                                            $pcategoria="Oficina";
                                                                            break;
                                                                            default:
                                                                            $pcategoria="Otros";
                                                                            break;
                                    
                      }
                      echo '<p class="card-text"><strong>Categoria:</strong> '.$pcategoria.' </p>';
                      
                      ?>
                      <form method="post", action="">
                      <label for="stock">Cantidad</label>
                      <div>
                      <input type="number" class="form-control" value="1" id="cantidad" name="cantidad" required>
                      </div>
                        <input type="submit" name="enviar" class="btn btn-primary w-100" value="Agregar al carrito" style="background-color: blueviolet;" ></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
 if (isset($_POST['enviar'])) {
  
    if (isset($_COOKIE['idsesion'])){
       // echo "pulsado";
        $comprador=$_COOKIE['idsesion'];
        $cantidad=$_POST['cantidad'];
        echo $id;
        $consulta1='INSERT INTO compras (cantidad, idproducto, idcomprador, estado)
VALUES ('.$cantidad.','.$id.','.$comprador.', "pendiente");';
$result= mysqli_query($conexion,$consulta1);
     $mensaje="Producto agregado al carrito";
     echo $mensaje;
     ?>
     <script>
        window.onload = function() {
            var myModal = new bootstrap.Modal(document.getElementById('Modal'));
            myModal.show();
        };
    </script>
     <?php
    }
    else{
        $mensaje="Debes iniciar sesion";
        ?>
        
     <script>

        window.onload = function() {
            var myModal = new bootstrap.Modal(document.getElementById('Modal'));
            myModal.show();
        };
    </script>
     <?php
    }
 }

?>
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo $mensaje; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK </button>
       
      </div>
    </div>
  </div>
</div>
</html>