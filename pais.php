<?php
require'conexion.php';
//aqui capturo el id que se envia por medio del parametro de ajax de la funcion cargarpais
$conti = $_POST['id'];
$query =$pdo->query('SELECT * FROM paises WHERE id_c="'.$conti.'"');
//aca hago un query tomando los paises que pertencen al contid=nente enviado por parametro
echo '<option>-- Seleccione una Opcion --</option>';
foreach ($query as $q):
    echo '<option value="'.$q["id"].'">'.$q["nombre_p"].'</option>';
endforeach;
//aca se hace la insercion de codigo html que luego el js captura y lo mando a un id correspondiente
