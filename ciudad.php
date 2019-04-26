<?php
require'conexion.php';

//aqui capturo el id que se envia por medio del parametro de ajax de la funcion cargarciudad
$ciudad = $_POST['id'];
$query =$pdo->query('SELECT * FROM ciudades WHERE id_pais="'.$ciudad.'"');
//aca hago un query tomando las ciudades que solo pertenecen al id_pais

echo '<option>-- Seleccione una Opcion --</option>';
foreach ($query as $q):
    echo '<option value="'.$q["id"].'">'.$q["nombre"].'</option>';
endforeach;

//aca se hace la insercion de codigo html que luego el js captura y lo mando a un id correspondiente



