<?php

$params = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
//obtengo la url de la Aplicación y la envío a redireccionar 
//para que sea la única ruta que inicialize.
$urlApp=$params[0].'/public';
header("Location: /$urlApp");

?>