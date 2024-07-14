<?php
declare(strict_types=1);

//iniciamos sesiones para control de accesos
session_start();

//Definimos las cabeceras para las peticiones 
header('Access-Control-Allow-Origin: *');
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

//Cargamos el Framework FLight PHP :)
require_once 'flight/Flight.php';
require 'flight/autoload.php';

//Cargamos el framework RedBeanPHP
require 'flight/rb.php';
//Esto deberia ir a un archivo 'conexión.php'
//en la carpeta "private" asignada oculta en .gitignore
//para seguridad de no mostrar datos sensibles de la BD.
//Para el ejemplo lo dejo aquí.
R::setup('mysql:host=localhost;dbname=galeria', 'root', '');

//Establecemos la ruta inicial de la aplicación
//si no declaramos un método GET,POST,PUT,DELETE, 
//por default el framework interpreta que es GET.

//Página de inicio, nos presenta las opciones para iniciar sesión
Flight::route('/', function () {
    require 'views/header.php';
    require 'views/appIni.php';
});

//Página con sesión iniciada, ya permite dar click en Likes 
Flight::route('/galeria', function () {
    require 'views/header.php';
    //con ésto validamos que el usuario tenga iniciada la sesión
    //o le mandamos un mensaje de error
    if( isset($_SESSION['id']) )
    {
        require 'views/appIniUser.php';
    }
    else
    {
        require 'views/errorAcceso.php';
    }
});

//Mostramos información acerca de los desarrolladores
Flight::route('/acerca', function () {
    require 'views/header.php';
    require 'views/acerca.php';
    //require 'views/footer';
});


//Consultamos la BD y obtenemos las fotografías
Flight::route('/getFotos', function () {   
    $sql = 'SELECT F.*,U.nombre FROM fotos as F 
            INNER JOIN usuarios as U 
            ON F.userid = U.id ORDER BY F.id DESC';
    $fotos = R::getAll($sql);
    //devuelve los datos en formato JSON
    Flight::json($fotos);      
});

//Método para aumentar el número de likes
Flight::route('/incrementaLikes/@idfoto/@likes', function ($idfoto,$likes) {
    if( isset($_SESSION['id']) )
    {   
        $item = R::load( 'fotos', $idfoto );
        $item->likes=$likes;
        R::store( $item );
        Flight::json('Ok');
    }   
    else
    {
        require 'views/header.php';
        require 'views/errorAcceso.php';
    }       
});

//Formulario de acceso a usuarios 
Flight::route('/login', function () {   
    require 'views/header.php';
    require 'views/login.php'; 
});

//Método para verificar el acceso a usuarios
Flight::route('/login/@usuario/@password', function ($usuario,$password) {
    $item = R::findOne( 'usuarios', ' usuario = :usuario AND password=:password' ,  array( ':usuario'=>$usuario, ':password'=>$password) );
    //echo gettype($item);
    if( gettype($item) == 'NULL' )
        Flight::json('Denegado');
    else
    {   $_SESSION['id']=$item->id;
        $_SESSION['usuario']=$item->usuario;    
        Flight::json('ok');
    }
});

//Formulario de agregar Fotos 
Flight::route('/fotosAgregar', function () {   
    require 'views/header.php';
    if( isset($_SESSION['id']) )
    {   
        require 'views/fotosAgregar.php';    
    }
    else
    {   
        require 'views/errorAcceso.php';
    } 
});

//Formulario de grabar Fotos 
Flight::route('/fotosGrabar', function () {   
    require 'views/header.php';
    if( isset($_SESSION['id']) )
    {   
        require 'views/fotosGrabar.php'; 
    }
    else
    {
        require 'views/errorAcceso.php';
    } 
});

//Salir del Sistema, borramos sesión 
Flight::route('/registro', function () {
    require 'views/header.php';   
    require 'views/registro.php'; 
});


//Salir del Sistema, borramos sesión 
Flight::route('/salir', function () {   
    require 'views/salir.php'; 
});

//Inicializamos el framework, OJO ésta línea debe ir siempre al final.
Flight::start();
