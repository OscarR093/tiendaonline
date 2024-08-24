<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de Productos</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
<body style="background-color: blueviolet;">
    <!-- header section start -->
     <?php include ("conexion.php");?>
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
    <button type="submit" class="btn btn-primary ms-2">Buscar</button>
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
    <div class="container mt-5">
        <h2 style="color: white;">Subir Producto</h2>
        <form action="subir_producto.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <style>label{ color: white;}
                    </style>
                <label for="nombre">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <label for="categoria">Categoria</label>
            <div class="form-group">
            <select data-mdb-select-init name="categoria">
  <option value="1">Electronica</option>
  <option value="2">Libros y  medios</option>
  <option value="3">Ropa y calzado</option>
  <option value="4">Hogar y cocina</option>
  <option value="5">Salud y cuidado personal</option>
  <option value="6">Juguetes y niños</option>
  <option value="7">Deportes y aire libre</option>
  <option value="8">Automotriz</option>
  <option value="9">Alimentos y bebidas</option>
  <option value="10">Hobbies</option>
  <option value="11">Mascotas</option>
  <option value="12">Papeleria</option>
  <option value="13">Herramientas</option>
  <option value="14">Oficina</option>
  <option value="15">Otros</option>

</select>
</div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="stock">Cantidad de Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del Producto</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-light">Subir Producto</button>
        </form>
    </div>

    <!-- Incluye Bootstrap JS y dependencias de jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>