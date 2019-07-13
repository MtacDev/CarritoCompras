<?php
  $nombre= $_POST["txtproducto"];
  $apellido= $_POST["txtprecio"];
  $edad= $_POST["txtmodelo"];
  $user= $_POST["txtvaloracion"];
  $pass= $_POST["txttipo"];
  $id= $_POST["txtid"];
  

  $handle=fopen("productos.txt", "a+");
  	$texto = "&".$producto.",".$precio.",".$modelo.",".$valoracion.",".$tipo.",".$id.",".$comentario;
  fwrite($handle, $texto);
  fclose($handle);


  ?>