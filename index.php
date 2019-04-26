<?php
require'conexion.php';

$continente = $pdo->query("SELECT *FROM continentes");
//aca realizo una consulta en la base de datos que me trae todos los contienentes

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container w-50">
    <form>
        <div class="modal-title">
            <h4>Tarea de Select</h4>
        </div>
        <hr>
        <div class="form-group">
            <label for="continentes">Continentes</label>
            <select class="form-control" id="continentes" onchange="cargarpais(this.value);">
<!--                envio los datos por un metodo de js llamado onchange difiniendo la fucnion que se va ajecutar cuando seleccione una opcion del select-->
                <option value="1">--Seleccione un continente</option>
                <?php foreach ($continente as $item):?>
                    <option value="<?php echo $item['id'];?>"> <?php echo $item['nombre_c']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="paises">Paises</label>
            <select class="form-control" id="paises" onchange="cargarciudad(this.value)">
<!--                envio los datos por un metodo de js llamado onchange difiniendo la fucnion que se va ajecutar cuando seleccione una opcion del select-->
            </select>
        </div>
        <div class="form-group">
            <label for="ciudades"></label>
            <select class="form-control" id="ciudades">

            </select>
        </div>

    </form>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    // en esta funcion capturo el id del continente para luego mandarlo a una url con paramtro
    function cargarpais(val) {
        // val es el valor del select
        var id = val;
        console.log(id);
        $.ajax({
            // comienzo la ejecucion de ajax
            type:"POST",
            // lo envio por metodo post aunque tambien se puede hacer por el metodo get
            url:'pais.php',
            // lo envio a esta url que en todo caso es un archivo php
            data:'id='+id,
            // aca le envio el paramtro con un nombre que va a recibir en pais.php
            success :function (resp) {
                // aca recibo el codigo html y lo inyecto al id de paises que es otro select
                $('#paises').html(resp)
            }
        });
    }

    function cargarciudad(val) {
        console.log(val);
        // val es el valor del select
        $.ajax({
            type:"POST",
            url:'ciudad.php',
            // lo envio a esta url que en todo caso es un archivo php
            data:'id='+val,
            // aca le envio el paramtro con un nombre que va a recibir en ciudad.php
            success :function (resp) {
                // aca recibo el codigo html y lo inyecto al id de ciudades que es otro select
                $('#ciudades').html(resp)
            }
        });
    }
</script>
</html>