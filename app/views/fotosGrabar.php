<div class="container mt-5">
<br>
<h1>Foto grabada a la Galería</h1>
    <?php
    $archivo = $_FILES['imagen']['name'];
    if (isset($archivo) AND $archivo != "") 
        {//Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['imagen']['type'];
        $temp = $_FILES['imagen']['tmp_name'];
        // validamos que sea un archivo de imagen
        if( $tipo == "image/jpg" OR $tipo == "image/gif" 
            OR $tipo == "image/png" OR $tipo == "image/jpeg" )
        {   
            $urlFotos='/opt/lampp/htdocs/galeria169/public/tmp/';
            // En Windows asignar el valor $urlFotos='';
            if (move_uploaded_file($temp, $urlFotos.$archivo)) 
            {  
                    // Ruta de la imagen (path)
                $path = $urlFotos.$archivo;
                    // Extensión de la imagen
                $type = pathinfo($path, PATHINFO_EXTENSION);
                    // Cargando la imagen
                $data = file_get_contents($path);
                    // Decodificando la imagen en base64
                $base64 = 'data:image/'. $type.';base64,'.base64_encode($data);
                    // Mostrando la imagen ya en base64
                echo '<br><img src="'.$base64.' " width="640px" />';
                    //Mostramos el mensaje de que se ha subido con éxito
                echo '<div><b>Imagen codificada correctamente.</b></div>';
                    //Eliminando el archivo subido
                unlink($path);    
                // Crear un Objeto de RedBean y guardar a la Base de Datos
                $foto = R::dispense('fotos');
                    $foto->titulo = Flight::request()->data->titulo;
                    $foto->imagen = $base64;                    
                    $userid= $_SESSION['id'];
                    $foto->userid = $userid;
                $id = R::store($foto);
    ?>                           
        <script>
            location.href ='http://localhost/galeria169/app/galeria';
    </script>
    <?php                          
            }     
            else {   echo "<br>Error al subir archivo"; }
        }       
        else {   
            echo "<br>No es un archivo de imagen"; 
        }
    }
    else {   echo "<br>Archivo inválido"; }
    ?>
</div>