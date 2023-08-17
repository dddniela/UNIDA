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
            include_once "src/Views/perfilEgreso-vista.php";
            break;

        case 2:
            include_once "src/Views/plantillaDocente-vista.php";
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

        case 10:
            include_once "src/Views/laboratorios/enzimologia.php";
            break;

        case 11:
            include_once "src/Views/laboratorios/ingenieria-alimentos.php";
            break;
        
        case 12:
            include_once "src/Views/laboratorios/tecnologia-cafe.php";
            break;
        
        default:
            include_once "src/Views/inicio.php";
            break;
    }

} else {
    include_once "src/Views/inicio.php";
}
 