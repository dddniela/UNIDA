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
        $generaciones = $this->getUltimas5Gen();
        $codigo = "";

        foreach ($generaciones['data'] as $generacion) {
            $generacionId = $generacion['generacionId'];
            $generacionPosgrado = $generacion['generacionPosgrado'];
            $fechaInicial = $generacion['fechaInicial'];
            $fechaFinal = $generacion['fechaFinal'];
            $egresados = $generacion['egresados'];

            $codigo .= "<h2 class='accordion-header'>
                            <button class='accordion-button text-align-center text-white' style='background-color:#1D4ED8;'
                                type='button' data-bs-toggle='collapse' data-bs-target='#collapse$generacionId' aria-expanded='true'
                                aria-controls='collapse$generacionId'>
                                Generación $generacionPosgrado
                            </button>
                        </h2>
                        <div id='collapse$generacionId' class='accordion-collapse collapse hide text-align-center'
                        data-bs-parent='#accordionExample'>
                            <div class='accordion-body'>
                                <div class='row justify-content-center'>";

            foreach ($egresados as $egresado) {
                $nombre = $egresado['nombre'];
                $tesis = $egresado['tesis'];
                $director = $egresado['director'];

                $codigo .= "<div class='col-sm-12 col-lg-4 card text-bg-primary mb-3' style='max-width: 18rem; margin: 20px;'>
                            <div class='card-header bg-primary text-white'>$nombre</div>
                            <div class='card-body'>
                                <h5 class='card-title'>Tesis: $tesis</h5>
                                <p class='card-text'>Director: $director</p>
                            </div>
                        </div>
                ";
            }

            $codigo .= "</div>
                        </div>
                </div>";
        }
        return $codigo;
    }
}
