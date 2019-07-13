var openFile = function (event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function () {
        var text = reader.result;
        //dividir la cadena en distintas noticias
        var listaProductosFromTXT = text.split("&");
        getProductosFromTXT(listaProductosFromTXT);
        //var node = document.getElementById('output');
        //$("#output").html("");
        /*for (var i = 0; i < noticias.length; i++) {
            //node.innerText = noticias[i];
            $("#output").append(noticias[i] + "<br>");
        }
        console.log(reader.result.substring(0, 200));*/
    };
    reader.readAsText(input.files[0]);
};

var listaProductos = [];

function product(producto, valor, modelo, valoracion, tipoProducto, idProducto,comenta){
    this.producto = producto;
    this.valor = valor;
    this.modelo = modelo;
    this.valoracion = valoracion;
    this.tipoProducto = tipoProducto;
    this.idProducto = idProducto;
    this.comenta = comenta;
}

function getProductosFromTXT(listaProductosFromTXT){
    for(var i = 0; i < listaProductosFromTXT.length; i++){
        var producto = listaProductosFromTXT[i].split(",");
        var post = new product(producto[0], producto[1], producto[2], producto[3], producto[4], producto[5], producto[6]);
        console.log(producto[6]);
        listaProductos.push(post);
    }
    listaorden=listaProductos;
    insertaProductosInHtml(listaProductos);
}

//Funcion que permite insertar los productos, desde una lista recibida por parametros
function insertaProductosInHtml(lista){
    var imagen= "";
    for(var i = 0; i < lista.length; i++){
        if(lista[i].tipoProducto == 001){
            imagen = "img/computer.jpg";
        }if(lista[i].tipoProducto == 002){
            imagen = "img/impresora.jpg";
        }if(lista[i].tipoProducto == 003){
            imagen = "img/monitor.png";
        }
        $("#divIdProductos").append(''+
                '<div class="col-sm-4 col-lg-4 col-md-4">'+
                        '<div class="thumbnail">'+
                            '<img class="img-responsive" src="'+imagen+'" alt="">'+
                            '<div class="caption">'+
                                '<h4 class="pull-right">$'+lista[i].valor+'</h4>'+
                                '<h4><a href="#">'+lista[i].producto+'</a>'+
                                '</h4>'+
                                '<p>'+lista[i].modelo+' </p>'+
                                '<button align="center" id="'+lista[i].idProducto+'" type="button" class="btn btn-info" onclick="addProductosToCarro(this)">Comprar</button>'+
                                '<button align="center" id="'+lista[i].idProducto+'" type="button" class="btn btn-default" data-toggle="modal" data-target="#modalcomentario" onclick="comenta(this)">Comentarios</button>'+
                            '</div>'+
                            '<div class="ratings">'+
                                '<p class="pull-right">'+lista[i].valoracion+' votos</p>'+
                                '<p>'+
                                    '<span class="glyphicon glyphicon-star"></span>'+
                                    '<span class="glyphicon glyphicon-star"></span>'+
                                    '<span class="glyphicon glyphicon-star"></span>'+
                                    '<span class="glyphicon glyphicon-star"></span>'+
                                    '<span class="glyphicon glyphicon-star"></span>'+
                                '</p>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
    }
}

var listaorden =[];
//Funcion que se ejecuta, cuando seleccionamos una categoria
function onclickProducts(codigo, contenedor){
    //Limpiamos y agregamos clases
   $(".list-group-item").removeClass("active");
    var d = document.getElementById(contenedor);
    d.className = "list-group-item active";
    
    //limpiamos el Contenedor
    $("#divIdProductos").html("");
    if(codigo === "all"){
            insertaProductosInHtml(listaorden);
    }else{
    //generamos una nueva lista de productos para computadores
    var listaTemporal =[]; 
    for(var i = 0; i<listaProductos.length; i++){
        if(listaProductos[i].tipoProducto == codigo){
            listaTemporal.push(listaProductos[i]);
            listaorden=listaTemporal;
        }
    }
    }
    insertaProductosInHtml(listaTemporal);
}
function ordenar(codigo, contenedor){
    //Limpiamos y agregamos clases
    var d = document.getElementById(contenedor);
    
    //limpiamos el Contenedor
    $("#divIdProductos").html("");
    if(codigo === "all"){
        var listaTemporal =[];
            for(var i = 0; i<listaorden.length; i++){
                    listaTemporal.push(listaorden[i]);
            }
            listaTemporal.sort(function(a,b){return a.valoracion-b.valoracion});
    }
    if(codigo === 001){
        var listaTemporal =[];
            for(var i = 0; i<listaorden.length; i++){
                    listaTemporal.push(listaorden[i]);
            }
            listaTemporal.sort(function(a,b){return a.valoracion-b.valoracion});
            listaTemporal.reverse();
    }
    if(codigo === 002){
        var listaTemporal =[];
            for(var i = 0; i<listaorden.length; i++){
                    listaTemporal.push(listaorden[i]);
                
            }
            listaTemporal.sort(function(a,b){return a.valor-b.valor});
    }
    if(codigo === 003){
        var listaTemporal =[];
            for(var i = 0; i<listaorden.length; i++){
                    listaTemporal.push(listaorden[i]);
                
            }
            listaTemporal.sort(function(a,b){return a.valor-b.valor});
            listaTemporal.reverse();
    }
    insertaProductosInHtml(listaTemporal);
}
//Funcion que busca un objeto de Tipo Producto y lo retorna
function getObjectCompleto(id){
    var object;
    for(var i = 0; i < listaProductos.length; i++){
        if (listaProductos[i].idProducto == id){
            object = listaProductos[i];
            return object;
        }/*else{
            alert("El post no fue encontrado");
        }*/
    }
}

function abrirModal(){
    $('#modalProductos').modal("show");
}

var listaCarroCompra = [];

function showProductsInCarro(lista){
    $("#tableProducts > tbody").html("");
    var valorTotalCompra = 0;
    if(lista.length>0){
        for (var i = 0; i < lista.length; i++){
            valorTotalCompra = parseInt(lista[i].valor) + valorTotalCompra;
            var row = $(''+
                    '<tr>'+
                    '<td>'+(i+1)+'</td><td>'+lista[i].idProducto+'</td><td>'+lista[i].producto+'</td><td>'+lista[i].modelo+'</td><td>'+lista[i].valor+'</td>\n\
                    <td><button type="submit" id="'+lista[i].idProducto+'" class="btn btn-default btn-sm delete">\n\
                <span class="glyphicon glyphicon-trash"></span></button>');
            $("#tableProducts > tbody").append(row);
        }
        $("#valorTotalCompra").html('<h4>'+valorTotalCompra+'</h4>');
    }else{
        $("#valorTotalCompra").html('<h4>'+valorTotalCompra+'</h4>');
    }
}

function addProductosToCarro(contenido){
    var id = contenido.id;
    var objetoParaAgregar = getObjectCompleto(id);
    listaCarroCompra.push(objetoParaAgregar);
    showProductsInCarro(listaCarroCompra);
}

//Funcion para eliminar un componente de la tabla
$('table').on('click','.delete',function(){
    var idEliminar = this.id;
    for (var i = 0; i< listaCarroCompra.length; i++){
        if(listaCarroCompra[i].idProducto == idEliminar){
            listaCarroCompra.splice(i,1);
        }
    }
    showProductsInCarro(listaCarroCompra);
    $(this).parents('tr').remove();
});

//Funcion para limpiar la lista de productos
function borrarProductos(){
    listaCarroCompra = [];
    showProductsInCarro(listaCarroCompra);
}

function pagarProductos(lista){
    alert("Procederemos a Registrar su Compra");

}
/*                       */

function comenta(contenido){
    var id = contenido.id;
    var objetoParaAgregar = getObjectCompleto(id);
    var b = objetoParaAgregar.comenta;
    var a = b.split("-");
    for (var i = 0; i < a.length; i++){
            var row = $(''+
                    '<tr>'+
                    '<td>'+a[i]+'<hr>');

            $("#tablecomenta > tbody").append(row);
       }
}