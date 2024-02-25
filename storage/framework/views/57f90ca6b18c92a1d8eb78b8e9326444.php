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
        document.getElementById('modal-nombre').innerText = 'Pelicula: ' + nombre;
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

    }

    .navbar {
        background-color: #000;
    }

    .navbar-brand {
        color: #000;
        font-size: 24px;
    }

    .navbar-nav .nav-link {
        color: #000;
    }

    .container-cartera {
        margin-top: 20px;
        margin-left: 300px;

    }

    .card-margin {
        margin-bottom: 0px;
    }

    .text-bg {
        background-color: rgba(0, 0, 0, 0);
    }

    .card-img-top {
        height: 400px;
        object-fit: cover;
        border-radius: 0px 0px 80px 80px;
    }

    .card-body {
        padding: 10px;
    }

    .card-body h5 {
        margin-bottom: 5px;
        font-size: 30px;
    }

    .card-body p {
        margin-bottom: 0;
    }

    .modal-title {
        font-size: 18px;
        margin-bottom: 0;
    }

    .invisible {
        display: none;
    }

    h1 {
        font-size: 0px;
    }

    .modal-header {
        background-color: #041BF9;
        color: #fff;
        padding: 10px;
    }

    .modal-title {
        font-size: 24px;
        margin-bottom: 0;
    }

    .modal-body {
        background-color: #000;
        color: #fff;
        padding: 20px;
    }

    .modal-body p {
        margin-bottom: 10px;
    }

    .modal-body input[type="text"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: none;
        background-color: #343a40;
        color: #fff;
        outline: none;
    }

    .modal-footer {
        background-color: #343a40;
        padding: 10px;
        text-align: right;
    }

    .modal-footer button {
        background-color: #fff;
        color: #000;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        outline: none;
    }

    .modal-footer button:hover {
        background-color: #0017FF;
    }

    .modal-body button {
        background-color: #0010FF;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        outline: none;
    }

    .modal-body button:hover {
        background-color: #D16F67;
    }
    </style>
</head>

<body class="contenedor">
    <nav class="navbar navbar-dark">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand" href="/">CARTELERA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/funciones">AGREGAR FUNCION</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <br>
    <div class="container-cartera">
        <div class="row row-cols-4">
            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button type="button" class="btn btn-success buttona" data-bs-toggle="modal" data-bs-target="#exampleModal"
                onclick="mostrar('<?php echo e($item->Nombre); ?>', '<?php echo e($item->id); ?>', '<?php echo e($item->precio); ?>')"
                style="background-color: #717175">

                <div class="card-margin">
                    <div class="card text-bg">
                        <img src="<?php echo e(asset($item->Imagen)); ?>" class="card-img-top" alt="<?php echo e($item->Nombre); ?>">
                        <div class="card-body">
                            <h4>Pelicula</h4>
                            <h4 class="card-title" name="nombre1"><?php echo e($item->Nombre); ?></h4>
                            <p class="card-text">
                            <h4>Precio</h4>
                            <strong name="precio1"><?php echo e($item->precio); ?></strong><br>
                            </p>
                        </div>
                    </div>
                </div>
            </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Venta de boletos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p id="modal-nombre"></p>

                    <p id="modal-id"></p>
                    <p id="modal-precio"></p>
                    <p id="precio2" class="invisible"></p>
                    <p id="id2" class="invisible"></p>
                    <p>Entradas <input type="text" id="entradas" oninput="validarEntradas()"></p>

                    <script>
                    function validarEntradas() {
                        var input = document.getElementById("entradas");
                        var valor = input.value;

                        if (isNaN(valor) || parseFloat(valor) < 0) {
                            input.value = "";
                        }
                    }
                    </script>
                    <button onclick="calcular()">Calcular</button>

                    <br>
                    <p>Total a pagar <input type="text" id="pagar"></p>
                </div>
                <div class="modal-footer">
                    <form action="<?php echo e(route('Cine.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="text" id="n1" name="n1" class="invisible">
                        <input type="text" id="entradas2" name="entradas2" class="invisible">
                        <button type="submit">Vender</button>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>
<?php echo $__env->make('layout/plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyecto\resources\views/index.blade.php ENDPATH**/ ?>