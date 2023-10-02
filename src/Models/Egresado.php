<?php

require_once "Conexion.php";

class Egresado
{
    private $egresadoId;
    private $nombre;
    private $director;
    private $tutor;
    private $tesis;
    private $generacionId;
    private $docenteId;
    private $connection;

    public function setConnection($conn)
    {
        $this->connection = $conn;
    }

    public static function getUltimas5Gen()
    {
        $url =  $GLOBALS['api'] . '/api/egresado/getUltimas5Gen';

        $headers = ['Content-Type: application/json'];
        $data = [
            'programaId' => $GLOBALS['programaId']
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    function imprimirDatos()
    {
        $docentes = $this->getUltimas5Gen();
        $codigo = "";

        foreach ($docentes['data'] as $docente) {
            $docenteId = $docente['docenteId'];
            $nombre = $docente['nombre'];
            $descripcion = $docente['descripcion'];
            $informacionAcademica = $docente['informacionAcademica'];
            $materias = $docente['materias'];
            $contacto = $docente['contacto'];
            $urlImagen = $GLOBALS['PATH_DOCENTE'] . $docente['urlImagen'];

            $codigo .= "<div class='col-lg-4 col-sm-6 text-center p-3'>
                                <div class='area shadow-sm p-4 rounded-3'>
                                    <div class='d-flex flex-row justify-content-center my-1'>
                                        <img class='rounded-circle p-1 bg-primary imagen-docentes' src='" . $urlImagen . "' alt=''>
                                    </div>
                                    <div class='d-flex flex-row justify-content-center'>
                                        <h3 class='tituloAreaDocente text-center font-bold text-xl'>$nombre</h3>
                                    </div>
                                    <div class='d-flex flex-row justify-content-center'>
                                        <button type='button' class='btn btn-warning font-bold' data-bs-toggle='modal' data-bs-target='#ModalDocente" . $docenteId . "'>Ver más</button>
                                    </div>
                                </div>
                            </div>";

            $codigo .= "<div class='modal fade' id='ModalDocente" . $docenteId . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-lg'>
                                    <div class='modal-content'>
                                        <div class='modal-header azul-medio'>
                                            <h5 class='modal-title text-white font-semibold'>Información docente</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <div class='col'>
                                            <div class='row justify-content-center m-2'>
                                                <div class='col-7 col-lg-auto justify-content-center m-2'>
                                                    <div class='d-flex justify-content-center'>
                                                        <img class='rounded-circle p-1 bg-primary imagen-docentesModal' src='" . $urlImagen . "' alt=''>
                                                    </div>
                                                </div>
                                                <div class='col-12 col-lg-7 justify-content-center align-items-center m-2'>
                                                    <div class='d-flex align-items-center h-100'>
                                                        <div class='col'>
                                                            <div class='row'>
                                                                <h1 class='amarillo text-center py-2 fs-4 font-semibold'>$nombre</h1> 
                                                            </div>      
                                                            <div class='row'>
                                                                <p class='text-dark' style='text-align: justify;'>$descripcion</p>
                                                            </div>     
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='d-flex flex-row justify-content-start m-2' style='text-align: justify;'>
                                                <div class='col-12'>
                                                    <strong>Información académica:</strong> <br>
                                                    $informacionAcademica
                                                </div> 
                                            </div>
                                            <div class='d-flex flex-row justify-content-start mx-2' style='text-align: justify;'>
                                                <strong>Materias que ha impartido:</strong>
                                            </div>
                                            <div class='d-flex flex-row justify-content-start mx-2 mb-2' style='text-align: justify;'>
                                                <div class='col-12'>
                                                    $materias
                                                </div>   
                                            </div>
                                            <div class='d-flex flex-row justify-content-start mx-2' style='text-align: justify;'>
                                                <strong>Información de contacto:</strong> 
                                            </div>
                                            <div class='d-flex flex-row justify-content-start mx-2 mb-2' style='text-align: justify;'>
                                                <div class='col-12'>
                                                    $contacto
                                                </div>   
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
        }
        return $codigo;
    }

}
