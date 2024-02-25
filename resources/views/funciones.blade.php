 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-U1kR+x4ZlbqMjfx3sdF8duvo7z1peR5+0JwRq8kl9byPMb0j3Bsq3VFFxMlFcO5t" crossorigin="anonymous">
     </script>
     <script>
     function mostrar(nombre, id, precio) {
         document.getElementById('modal-nombre').innerText = 'Nombre: ' + nombre;
         document.getElementById('modal-precio').innerText = 'Precio: ' + precio;
         document.getElementById('precio2').innerText = precio;
         document.getElementById('id2').innerText = id;
         document.getElementById('n1').value = id;

         document.getElementById('id').value = id;
         document.getElementById('nombre').value = nombre;
         document.getElementById('precio').value = precio;
     }

     function calcular() {
         var precio = document.getElementById('precio2').innerText;
         var entradas = document.getElementById('entradas').value;

         document.getElementById('pagar').value = precio * entradas;
         document.getElementById('entradas2').value = entradas;
     }
     </script>

     <style>
     .contenedor {
         background-color: #717175;
         font-family: Arial, sans-serif;
         color: #fff;
     }

     .container {
         max-width: 600px;
         margin: 0 auto;
         margin-top: 100px;
         padding: 20px;
         background-color: #fff;
         border-radius: 5px;
         box-shadow: 0 2px 5px rgba(0, 0, 0, 0);
     }

     h1 {
         font-size: 24px;
         margin-bottom: 20px;
         color: #000;
     }

     h3 {
         font-size: 18px;
         margin-bottom: 10px;
         color: #000;
     }

     input[type="text"],
     input[type="file"] {
         width: 100%;
         padding: 10px;
         margin-bottom: 15px;
         border: 1px solid #ccc;
         border-radius: 3px;
     }

     input[type="submit"] {
         width: 100%;
         padding: 10px;
         background-color: #007bff;
         color: #fff;
         border: none;
         border-radius: 3px;
         cursor: pointer;
     }

     input[type="submit"]:hover {
         background-color: #0056b3;
     }

     .preview-image {
         max-width: 100%;
         height: auto;
         margin-top: 10px;
     }
     </style>
 </head>

 <body class="contenedor">
     <div class="container">
         <form action="{{ route('Cine.agregar') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <h1>Agregar Función</h1>
             <h3>Nombre <input type="text" name="nombre" id="nombre"></h3>
             <h3>Precio <input type="text" name="Precio" id="Precio" oninput="validarPrecio()"></h3>

             <script>
             function validarPrecio() {
                 var input = document.getElementById("Precio");
                 var valor = input.value;

                 if (isNaN(valor) || parseFloat(valor) < 0 || /<[^>]+>/gi.test(valor)) {
                     input.value = "";
                 }
             }
             </script>
             <input type="file" id="imagen" name="imagen" accept="image/*" onchange="previewImage(event)">
             <img id="preview" class="preview-image" src="#" alt="Vista previa de la imagen">
             <input type="submit" value="Registrar">
         </form>
     </div>

     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
     <script>
     function previewImage(event) {
         var reader = new FileReader();
         reader.onload = function() {
             var preview = document.getElementById('preview');
             preview.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
     }
     </script>