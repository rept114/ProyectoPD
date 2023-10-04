/*Esta funcion se ejecuta al terminar de cargar el index.php*/
$( document ).ready( function() {
    /*Oculta el gif loading*/
    $(".jm-loadingpage").fadeOut("slow");    
} )


/*Esta funcion regresa todos los clientes activos (status = 1)*/
function getCliente(){
    /*Muestra el gif loading*/
    /*$(".jm-loadingpage").fadeIn("slow");*/
    $.post("modulos/clientes/getClientes.php", {})
    .done(function(data) 
    {                  
        $("#dvContainer").html("");
        $("#dvContainer").html(data); 
        /*Oculta el gif loading*/
        /*$(".jm-loadingpage").fadeOut("slow"); */
    });  
}

//getArticulo

function getArticulo(){
    /*Muestra el gif loading*/
    /*$(".jm-loadingpage").fadeIn("slow");*/
    $.post("modulos/Articulos/showArticulos.php", {})
    .done(function(data) 
    {                  
        $("#dvContainer").html("");
        $("#dvContainer").html(data); 
        /*Oculta el gif loading*/
        /*$(".jm-loadingpage").fadeOut("slow"); */
    });  
}

/*
    Esta funcion abre el formulario para alta o edicion de clientes
    si el paramId = 0 es una alta
    si el paramId > 0 es una Modificacion
*/
function editCliente(paramId){
    /*Muestra el gif loading*/
    $(".jm-loadingpage").fadeIn("slow");
    $.post("modulos/clientes/showCliente.php", {id: paramId})
    .done(function(data) 
    {     
        setTimeout(function(){
            $("#dvContainer").html("");
            $("#dvContainer").html(data);
            $(".jm-loadingpage").fadeOut("slow");  
        }, 1000);                      
        /*Oculta el gif loading*/
        
    });  
}

/*
    Esta funcion abre un confirm para eliminar un cliente
    El paramId es elcliente a eliminar
*/
function deleteCliente(paramId){
    Swal.fire({
        title: 'El cliente con Id ' + paramId + ' se va a ELIMINAR ¿Desea continuar?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Eliminar',
        denyButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.post("modulos/clientes/deleteCliente.php", 
            {
                id: paramId               
            })
            .done(function(data) 
            {                  
                if (data == "Éxito"){
                    Swal.fire('¡Eliminado!', '', 'success');
                    getCliente();          
                }
                else{
                    Swal.fire('Error!', 'Los datos no se guardaron, verifique su conexion a internet', 'error');                                        
                }
                                    
            });  
            
        } else if (result.isDenied) {
            Swal.fire('El Cliente no se elimino', '', 'info');          
        }
    });
}

/*
    Esta funcion guarda los datos del cliente
    Si el paramId = 0 es un insert o nuevo cliente
    Si el paramId > 0 es un update
*/
function saveCliente(paramId){     
    /*Obtiene los valores capturados en los inputs*/
    paramNombre = $("#txtNombre").val();
    paramRfc = $("#txtRfc").val();
    paramTelefono = $("#txtTelefono").val();

    /* Validaciones de contenido*/
    if (paramNombre == "" || paramRfc == "" || paramTelefono == ""){
        /*Algun input esta vacio*/
        swal.fire('Error!','Algunos datos estan vacios','error');
    }
    else{
        /*Envia los valores al guardar*/
        $.post("modulos/clientes/saveCliente.php", 
        {
            id: paramId,
            nombre: paramNombre,
            rfc: paramRfc,
            telefono: paramTelefono,               
        })
        .done(function(data) 
        {   
            if (data == "Éxito"){
                Swal.fire('Buen trabajo!', 'Se registró un nuevo cliente', 'success');                    
                getCliente();            
            }
            else{
                Swal.fire('Error!', 'Los datos no se guardaron, verifique su conexion a internet', 'error');                    
                getCliente();
            }
        });  
    }
    
}

function mnuModal(){
    $.post("modulos/modal/showModal.php", {})
    .done(function(data)
    {
        $("#dvContainer").html("");
        $("#dvContainer").html(data);
    });
}

function llenarModal(parametro){
    $.post("modulos/modal/jxModal.php", {valor: parametro})
    .done(function(data)
    {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
        });

        $("#dvModalContainer").html("");
        $("#dvModalContainer").html(data);
        myModal.show();
    });
}

function mnuCards(){
    $.post("modulos/cards/showCards.php", {})
    .done(function(data)
    {
        $("#dvContainer").html("");
        $("#dvContainer").html(data);
    });
}