<?php
if(isset($_COOKIE["idsesion"])){
header("location:index_user.php");
}
else{
    header("location:index_nouser.php");
}
?>