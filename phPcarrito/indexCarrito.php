
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ventas CDI - Productos</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="modalcomentario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document" style="width: 80%; max-width : 90% ;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title" id="myModalLabel">Comentarios</h2>
          </div>
            <div class="modal-body">
                <table id="tablecomenta" class="table table-striped text-center">
                        <thead>
                            <tr>
                            <th class="text-center">Comentario</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        </tfoot>
                      </table>
                        
          </div>
        </div>
      </div>
    </div>
    
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="modalProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document" style="width: 80%; max-width : 90% ;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title" id="myModalLabel">Carrito de Compras</h2>
          </div>
            <div class="modal-body">
                        <table id="tableProducts" class="table table-striped text-center">
                        <thead>
                            <tr>
                            <th class="text-center">Indice</th>
                            <th class="text-center">Codigo</th>
                            <th class="text-center">Producto</th>
                            <th class="text-center">Modelo</th>
                            <th class="text-center">Valor</th>
                            <th class="text-center">Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!--tr>
                            <td>1</td>
                            <td>A</td>
                            <td>B</td>
                            <td>C</td>
                            <td><button type='submit' class='btn btn-default btn-xs delete'><span class='glyphicon glyphicon-trash'></span></button></td>
                          </tr-->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" align="right"><h4>Valor Total Compra :</h4></td>
                                <td id="valorTotalCompra"><h4>0</h4></td>
                                <td><button type='button' class='btn btn-success btn-sm' onclick="pagarProductos()"><span class='glyphicon glyphicon-ok'></span> Pagar</button>
                                <button type='button' class='btn btn-danger btn-sm' onclick="borrarProductos()"><span class='glyphicon glyphicon-remove'></span> Limpiar</button>
                                </td>
                          </tr>
                        </tfoot>
                      </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Ventas CDI</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="productos.html">Productos</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">CDI Tecnologia</p>
                <div class="list-group">
                    <a class="list-group-item active" id="onclickAll" onclick="onclickProducts('all', 'onclickAll')">Todos</a>
                    <a class="list-group-item" id="onclickComputer" onclick="onclickProducts(001, 'onclickComputer')">Computadores</a>
                    <a class="list-group-item" id="onclickImpresora" onclick="onclickProducts(002, 'onclickImpresora')">Impresoras</a>
                    <a class="list-group-item" id="onclickMonitor" onclick="onclickProducts(003, 'onclickMonitor')">Monitores</a>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-md col-md-12" data-toggle="modal" data-target="#modalProductos">
                  Abrir Carro de Compras
                </button>
            </div>

            <div class="col-md-9">
           
            
                
                <div class="col-lg-12">
                <form method="post" action="" name="archivo" enctype="multipart/form-data">
                <input type='file' accept='text/plain' name="archivo" onchange='openFile(event)'><br>
                    <div id='output'>
                    </div>
                
                	
                
                 <h4>Ingresar un producto Nuevo</h4>
                    <table>
                         <tr>
                            <td>Producto</td>
                            <td><input type="text" name="txtproducto"></td>
                         </tr>
                          <tr>
                            <td>precio</td>
                            <td><input type="text" name="txtprecio"></td>
                         </tr>
                          <tr>
                            <td>Modelo</td>
                            <td><input type="text" name="txtmodelo"></td>
                         </tr>
                          <tr>
                            <td>Valoracion</td>
                            <td><input type="text" name="txtvaloracion"></td>
                         </tr>
                          <tr>
                            <td>Tipo de Producto</td>
                            <td><input type="text" name="txttipo"></td>
                         </tr>
                          <tr>
                            <td>Id del Producto</td>
                            <td><input type="text" name="txtid"></td>
                         </tr>
                          <tr>
                            <td>Comentario</td>
                            <td><input type="text" name="txtcomen"></td>
                         </tr>                            
                      
                    <tr>
                        <td></td>
                        <td><br><input type="submit" name="boton" value="Crear Producto" class=" btn btn-default"> <br> </td>
                    </tr>
                     </table>                                                                               
                </form>
                <?php
               
                    if (isset($_POST['boton'])) {
                       
                    
                    
                      $producto= $_POST["txtproducto"];
                      $precio= $_POST["txtprecio"];
                      $modelo= $_POST["txtmodelo"];
                      $valoracion= $_POST["txtvaloracion"];
                      $tipo= $_POST["txttipo"];
                      $id= $_POST["txtid"];
                      $comentario= $_POST["txtcomen"];

                      $handle=fopen("productos.txt", "a+");
                        $texto = "&".$producto.",".$precio.",".$modelo.",".$valoracion.",".$tipo.",".$id.",".$comentario;
                      fwrite($handle, $texto);
                      fclose($handle);
                      
                  }
                ?>


                

              <br>
                </div>
                <div class="main row">
                    <button  type="button" class=" btn btn-default" onclick="ordenar('all', 'onclickAll')">Valor asc</button>
                    <button  type="button" class=" btn btn-default" onclick="ordenar(001, 'onclickAll')">Valor des</button>
                    <button  type="button" class=" btn btn-default" onclick="ordenar(002, 'onclickAll')">precio asc</button>
                    <button  type="button" class=" btn btn-default" onclick="ordenar(003, 'onclickAll')">precio des</button>
                    </div>
                <div class="row" id="divIdProductos">


                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- mis codigos js -->
    <script src="javascript/adminProductos.js"></script>
</body>

</html>