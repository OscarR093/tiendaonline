<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Identificarse</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      
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
      
      <body style="background-color: blueviolet;">
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
               <div class="search_icon"><a href="#"><img src="images/eye-icon.png"><span class="padding_left_15">Carrito</span></a></div>
               <div class="search_icon"><a href="sing-in.php"><img src="images/user-icon.png"><span class="padding_left_15">Acceder</span></a></div>
               
            </div>
         </nav>
      </div>
      
      <!-- header section end -->
    
    </head>
 

    <div class="container">
        <h1 style="color: white;">Accede  a tu cuenta</h1>
    
        
                  <form method="post" action="">
                    <?php include ("ingresar.php")  ?>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label" style="color: white;">Correo electronico</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text" style="color: white;">No compartiremos tu informacion con nadie.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1"   class="form-label" style="color: white;">Contraseña</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                
                <input type="submit" name="btnin" class="btn btn-light" value="Ingresar"></button>

                <label for="exampleInputEmail1" class="form-label" style="color: white;">No tienes cuenta? </label> 
                <a href="log-in.php" style="color: white;"> Click aqui</a>



              </form>
        

    
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>