<?php 
   // configuracion acceso a la BD
   define('DB_HOST','localhost');
   define('DB_USER','root');
   define('DB_PASSWORD','');
   define('DB_NAME','appweb_CABA2024_biblioteca');

   // Ruta de la aplicación
   define('RUTA_APP', dirname(dirname(__FILE__)));
   // Ruta url

   define('RUTA_URL','http://localhost/AppWeb-biblioteca/AppWeb-Biblioteca');

   // Rutas que se usan para guardar imágenes
   define('RUTA_AVATAR','/AppWeb-biblioteca/AppWeb-Biblioteca/public/img/avatar/');
   define('NOMBRESITIO','Biblioteca UNLZ');
?>