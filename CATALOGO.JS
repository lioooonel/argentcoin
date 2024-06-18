var botonesAgregarAlaColeccion =document.getElementsByClassName('boton-item');
    for(var i=0; i<botonesAgregarAlaColeccion.length;i++){
        var button = botonesAgregarAlaColeccion[i];
        button.addEventListener('click', AgregarAlaColeccionclicked);
        

    }

    function AgregarAlaColeccionclicked(event){
        var data = [];
        var button = event.target;
        var item = button.parentElement;
       
        var cod_producto =item.getElementsByClassName('cod_producto')[0].innerText;
        console.log(cod_producto);
            
        var titulo = item.getElementsByClassName('titulo-item').innerText;
       console.log(titulo);
        var precio = item.getElementsByClassName('precio-item').innerText;
        console.log(precio);
        var precio_n = item.getElementsByClassName('precios-item')[0].innerText;
        console.log(precio_n);
        var imagenSrc = item.getElementsByClassName('img-item')[0].src;
        console.log(imagenSrc);
        var imagen_r = item.getElementsByClassName('imgs-item')[0].src;
        console.log(imagen_r);
    
        var desc =item.getElementsByClassName('desc')[0].innerText;
        console.log(desc);

        data.push({titulo: titulo, precio: precio, precio_n: precio_n, cod_producto: cod_producto, imagenSrc: imagenSrc, imagen_r:imagen_r, desc: desc});
        // Convertir el objeto de datos a formato JSON
        var jsonData = JSON.stringify(data);
            
        // Crear una instancia de XMLHttpRequest
        var xhr = new XMLHttpRequest();
    
        // Especificar la URL y el método HTTP
        xhr.open('GET', 'catalogo_guardar.php', true);
    
        // Establecer el encabezado Content-Type
        xhr.setRequestHeader('Content-Type', 'application/json');
    
        // Definir la función de respuesta
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // La solicitud fue exitosa
                    console.log('Respuesta del servidor:', xhr.responseText);
                } else {
                    // Ocurrió un error en la solicitud
                    console.error('Error en la solicitud:', xhr.status);
                }
            }
        };
    
        // Enviar la solicitud con los datos JSON
        xhr.send(jsonData);
    
        //ahora lo ponemos en el carrito fachero.
       // AgregarAlaColeccion(titulo, precio, imagenSrc, cod_producto,  desc, imagen_r, precio_n);

    
    }
    /*function AgregarAlaColeccion(titulo, precio, imagenSrc, cod_producto,  desc, imagen_r, precio_n){
       // var item = document.createElement('div');
        item.classList.add = 'item';
        var itemsCarrito = document.getElementsByClassName('carrito-items')[0];
        //chequeo por si intentar agregar el mismo -_-
        var nombresItemsCarrito = itemsCarrito.getElementsByClassName('carrito-item-titulo');
        for(var i=0;i<nombresItemsCarrito.length;i++){
            if(nombresItemsCarrito[i].innerText==titulo){
                alert("El item ya se encuentra en el carrito");
                return;
            }
        }}*/
        