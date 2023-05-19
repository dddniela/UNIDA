<?php

require_once "Conexion.php";

class Materia
{
	private $id_materia;
    private $area_materia;
    private $semestre_materia;
    private $descripcion_materia;
    private $especialidad_materia;
    private $url_materia;
    private $url_programa;
    private $connection;

    public function setConnection($conn)
    {
        $this->connection = $conn;
    }


function icono($Area){
    $ruta_img = "";
    switch($Area){
        case 'Programacion':
            $ruta_img = 'img/iconos/programacion.PNG';
            break;
        case 'Asignaturas Comunes':
            $ruta_img = 'img/iconos/asignaturas-comunes.PNG';
            break;
        case 'Redes':
            $ruta_img = 'img/iconos/redes.PNG';
            break;
        case 'Bases de datos':
            $ruta_img = 'img/iconos/bases-datos.PNG';
            break;
        case 'Electronica':
            $ruta_img = 'img/iconos/electronica.PNG';
            break;
        case 'Ingenieria':
            $ruta_img = 'img/iconos/ingenieria.PNG';
            break;
        case 'Sistemas operativos':
            $ruta_img = 'img/iconos/sistemasop.PNG';
        break;
        case 'Calculo':
            $ruta_img = 'img/iconos/calculo.PNG';
        break;
        case 'Estadistica':
            $ruta_img = 'img/iconos/estadistica.PNG';
        break;
        case 'Automatas':
            $ruta_img = 'img/iconos/automatas.PNG';
        break;
        case 'Investigacion':
            $ruta_img = 'img/iconos/investigacion.PNG';
        break;
        case 'Matematicas Aplicada':
            $ruta_img = 'img/iconos/algebra.PNG';
        break;
        case 'Web':
            $ruta_img = 'img/iconos/programacion-web.PNG';
        break;
        case 'Administracion':
            $ruta_img = 'img/iconos/administracion.PNG';
        break;
        case 'IA':
            $ruta_img = 'img/iconos/inteligencia-artificial.PNG';
        break;
    }
    return $ruta_img;
}

function imprimir($NumeroSemestre){
    $cn = $this->connection;
    $sqlQ = "SELECT * FROM materia where semestre_materia='$NumeroSemestre' and especialidad_materia=0";
    $ResultSet = $cn->query($sqlQ); 
   
    $tabla = "";

    if($ResultSet->num_rows > 0){
        
        $tabla .= "<div class='row justify-content-md-start justify-content-center'>";
        while($row = $ResultSet->fetch_assoc()){
            $id_materia = $row['id_materia'];
            $nombre_materia = $row['nombre_materia'];
            $descrip_materia = $row['descripcion_materia'];
            $area_materia = $row['area_materia'];
            $url_materia = $row['url_materia'];
            $url_programa = $row['url_programa'];
            $ruta_img = $this->icono($area_materia);

            // Cuadro de materia
            $tabla .= "<div class='col-lg-4 col-md-6 col-sm-9 col-9 p-4 h-100 justify-content-center rounded-3'>
                <div class='row azul-medio' style='height: 88px;'>
                    <div class='d-flex justify-content-center h-100'>
                        <h5 class='text-white align-self-center rounded-top text-center font-semibold py-3'>$nombre_materia</h5>
                    </div>
                </div>
                <div class='row bg-light overflow-hidden d-none d-sm-flex' style='height: 110px;'>
                    <div class='col-md-3 col-12 justify-content-center align-items-start'>
                        <div class='d-flex flex-row justify-content-center align-items-start h-100'>
                            <img class='h-16 p-1 mt-4 ms-4' src='$ruta_img' alt=''>
                        </div>
                    </div>
                    <div class='col-md-9 col-12 justify-content-center align-items-center'>
                        <div class='d-flex flex-row justify-content-center align-items-center h-100 text-wrap'>
                            <p class='text-sm mx-4 my-2' style='text-align: justify;'>$descrip_materia</p>
                        </div>
                    </div>
                </div>  
                <div class='row bg-light'>
                    <div class='col-12 my-2 justify-content-center'>
                        <div class='d-flex p-2 justify-content-center align-items-center'>
                        <button type='button' class='btn btn-warning font-bold' data-bs-toggle='modal'
                            data-bs-target='#modalReticula' 
                                    data-materia ='$nombre_materia' 
                                    data-videoMateria ='$url_materia' 
                                    data-descMateria ='$descrip_materia'
                                    data-urlMateria ='$url_programa'
                                    data-id='$id_materia'
                                    onclick='youtubePlay(this)'>
                                    Ver más </button>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
        $tabla .= "</div>";
    }

    return $tabla;
    
    $cn->close();
}

function imprimir1erSemestre(){
    return $this->imprimir("1");
}

function imprimir2doSemestre(){
    return $this->imprimir("2");
}

function imprimir3erSemestre(){
    return $this->imprimir("3");
}

function imprimir4toSemestre(){
    return $this->imprimir("4");
}

function imprimir5toSemestre(){
    return $this->imprimir("5");
}

function imprimir6toSemestre(){
    return $this->imprimir("6");
}

function imprimir7moSemestre(){
    return $this->imprimir("7");
}

function imprimir8voSemestre(){
    return $this->imprimir("8");
}

function imprimir9noSemestre(){
    return $this->imprimir("9");
}

function imprimirEspecialidad(){
    $cn = $this->connection;
    $sqlQ = "SELECT * FROM materia where area_materia='Especialidad'";
    $ResultSet = $cn->query($sqlQ); 
   
    $tabla = "";

    if($ResultSet->num_rows > 0){
        $tabla .= "<div class='row justify-content-md-start h-100 justify-content-center'>";
        $ruta_img = ['img/iconos/concurrentes.PNG','img/iconos/distribuidas.PNG','img/iconos/concurrentes.PNG','img/iconos/distribuidas.PNG','img/iconos/blockchain.PNG','img/iconos/distribuidas.PNG'];
        $i = 0;
        while($row = $ResultSet->fetch_assoc()){
            $id_materia = $row['id_materia'];
            $nombre_materia = $row['nombre_materia'];
            $descrip_materia = $row['descripcion_materia'];
            $area_materia = $row['area_materia'];
            $url_materia = $row['url_materia'];
            $url_programa = $row['url_programa'];

            // Cuadro de materia
            $tabla .= "<div class='col-lg-4 col-md-6 col-sm-9 col-9 p-4 h-100 justify-content-center rounded-3'>
                <div class='row azul-medio' style='height: 88px;'>
                    <div class='d-flex justify-content-center h-100'>
                        <h5 class='text-white align-self-center rounded-top text-center font-semibold py-3'>$nombre_materia</h5>
                    </div>
                </div>
                <div class='row bg-light overflow-hidden d-none d-sm-flex' style='height: 110px;'>
                    <div class='col-md-3 col-12 justify-content-center align-items-start'>
                        <div class='d-flex flex-row justify-content-center align-items-start h-100'>
                            <img class='h-16 p-1 mt-4 ms-4' src='$ruta_img[$i]' alt=''>
                        </div>
                    </div>
                    <div class='col-md-9 col-12 justify-content-center align-items-center'>
                        <div class='d-flex flex-row justify-content-center align-items-center h-100 text-wrap'>
                            <p class='text-sm mx-4 my-2' style='text-align: justify;'>$descrip_materia</p>
                        </div>
                    </div>
                </div>  
                <div class='row bg-light'>
                    <div class='col-12 my-2 justify-content-center'>
                        <div class='d-flex p-2 justify-content-center align-items-center'>
                        <button type='button' class='btn btn-warning font-bold' data-bs-toggle='modal'
                            data-bs-target='#modalReticula' 
                                    data-materia ='$nombre_materia' 
                                    data-videoMateria ='$url_materia' 
                                    data-descMateria ='$descrip_materia'
                                    data-urlMateria ='$url_programa'
                                    data-id='$id_materia'
                                    onclick='youtubePlay(this)'>
                                    Ver más </button>
                                </div>
                            </div>
                        </div>
                    </div>";
            $i = $i + 1;
            }
            $tabla .= "</div>";
        }
        return $tabla;
        
        $cn->close();
    }


}
