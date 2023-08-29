<?php
/*
This page has the purpose to manage how the user can navigate among the pages
using $_GET['variable'].

Using $_GET we can send and recive informatino from the url.
*/


if(isset($_GET['option'])){
    switch ($_GET['option']) {
        case 0:
            include_once "src/Views/inicio.php";  
            break;

        case 1:
            include_once "src/Views/aspirantes-vista.php";
            break;

        case 2:
            include_once "src/Views/alumnos-vista.php";
            break;

        case 3:
            include_once "src/Views/mapaCurricular-vista.php";
            break;

        case 4:
            include_once "src/Views/conocenos-vista.php";
            break;
        
        case 5:
            include_once "src/Views/comunidades-vista.php";
            break;

        case 6:
            include_once "src/Views/instalaciones.php";
            break;
        
        case 7:
            include_once "src/Views/contacto-vista.php";
            break;

        case 10:
            include_once "src/Views/laboratorios/enzimologia.php";
            break;

        case 11:
            include_once "src/Views/laboratorios/ingenieria-alimentos.php";
            break;
        
        case 12:
            include_once "src/Views/laboratorios/tecnologia-cafe.php";
            break;

        case 13:
            include_once "src/Views/laboratorios/microbiologia.php";
        break;

        case 14:
            include_once "src/Views/laboratorios/postcosecha.php";
        break;

        case 15:
            include_once "src/Views/laboratorios/ingenieria-ecologica.php";
        break;

        case 16:
            include_once "src/Views/laboratorios/genetica-aplicada.php";
        break;

        case 17:
            include_once "src/Views/laboratorios/fisico-quimica.php";
        break;

        case 18:
            include_once "src/Views/laboratorios/fermentaciones.php";
        break;

        case 19:
            include_once "src/Views/laboratorios/evaluacion-sensorial.php";
        break;

        case 20:
            include_once "src/Views/laboratorios/bioprocesos.php";
        break;

        case 21:
            include_once "src/Views/laboratorios/bioingenieria-bioetanol.php";
        break;

        case 22:
            include_once "src/Views/laboratorios/bromatologia.php";
        break;

        case 23:
            include_once "src/Views/laboratorios/bioquimica-nutricion.php";
        break;

        case 24:
            include_once "src/Views/laboratorios/bioestadistica.php";
        break;
        
        default:
            include_once "src/Views/inicio.php";
            break;
    }

} else {
    include_once "src/Views/inicio.php";
}
 