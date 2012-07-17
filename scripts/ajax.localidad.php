<?php

require includeLib($aConfiguracion,null,'publicar');

$alocalidades = obtenerLocalidades($db, $_POST['idPro'],true);     

echo $jsnConsulta = json_encode($alocalidades);

?>