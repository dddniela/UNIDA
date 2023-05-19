<?php

require_once "Conexion.php";

class Docente
{
    private $id_docente;
    private $nombre_docente;
    private $palabras_docente;
    private $informacion_docente;
    private $materias_docente;
    private $contacto_docente;
    private $url_imagen;
    private $connection;

    public function setConnection($conn)
    {
        $this->connection = $conn;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id_docente;
    }

    public function setNombreDocente($nombre_docente)
    {
        $this->nombre_docente = $nombre_docente;
    }

    public function getNombreDocente()
    {
        return $this->nombre_docente;
    }

    public function setPalabrasDocente($palabras_docente)
    {
        $this->palabras_docente = $palabras_docente;
    }

    public function getPalabrasDocente()
    {
        return $this->palabras_docente;
    }

    public function setInformacionDocente($informacion_docente)
    {
        $this->informacion_docente = $informacion_docente;
    }

    public function getInformacionDocente()
    {
        return $this->informacion_docente;
    }

    public function setMateriasDocente($materias_docente)
    {
        $this->materias_docente = $materias_docente;
    }

    public function getMateriasDocente()
    {
        return $this->materias_docente;
    }

    public function setContactoDocente($contacto_docente)
    {
        $this->contacto_docente = $contacto_docente;
    }

    public function getContactoDocente()
    {
        return $this->contacto_docente;
    }

    public function setImagenDocente($url_imagen)
    {
        $this->url_imagen = $url_imagen;
    }

    public function getImagenDocente()
    {
        return $this->url_imagen;
    }

    public function getDocentes($email){
        $docentes = array();
        $sql = 'SELECT * FROM docente ORDER BY nombre_docente ASC';
        $docentes = mysqli_query($this->connection,$sql);
        return $docentes;
    }

    function obtenerInformacion($LimiteInferior, $LimiteSuperior){
        $cn = $this->connection;
        $stmt = $cn->prepare("SELECT * FROM docente WHERE id_docente>=? AND id_docente<=? ORDER BY nombre_docente ASC");
        $stmt->bind_param('ii', $LimiteInferior, $LimiteSuperior);
        $stmt->execute();
        $result = $stmt->get_result();
        $docentes = $result->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    function imprimirDatos($LimInferior, $LimSuperior){
        $docentes = $this->obtenerInformacion($LimInferior,$LimSuperior);
        $Codigo = "";
        $cont = 1;
        foreach ($docentes as $key => $docente) {
                $id_docente = $docente['id_docente'];
                $nombre_docente = $docente['nombre_docente'];
                $palabras_docente = $docente['palabras_docente'];
                $informacion_docente = $docente['informacion_docente'];
                $materias_docente = $docente['materias_docente'];
                $contacto_docente = $docente['contacto_docente'];
                $url_imagen = $docente['url_imagen'];
                $Codigo .= "<div class='col-lg-4 col-sm-6 text-center p-3'>
                                <div class='area shadow-sm p-4 rounded-3'>
                                    <div class='d-flex flex-row justify-content-center my-1'>
                                        <img class='rounded-circle p-1 bg-primary imagen-docentes' src='img/Docentes/".$url_imagen ."' alt=''>
                                    </div>
                                    <div class='d-flex flex-row justify-content-center'>
                                        <h3 class='tituloAreaDocente text-center font-bold text-xl'>$nombre_docente</h3>
                                    </div>
                                    <div class='d-flex flex-row justify-content-center'>
                                        <button type='button' class='btn btn-warning font-bold' data-bs-toggle='modal' data-bs-target='#ModalDocente".$id_docente."'>Ver mas</button>
                                    </div>
                                </div>
                            </div>";

                $Codigo .= "<div class='modal fade' id='ModalDocente".$id_docente."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
                                                        <img class='rounded-circle p-1 bg-primary imagen-docentesModal' src='img/Docentes/".$url_imagen."' alt=''>
                                                    </div>
                                                </div>
                                                <div class='col-12 col-lg-7 justify-content-center align-items-center m-2'>
                                                    <div class='d-flex align-items-center h-100'>
                                                        <div class='col'>
                                                            <div class='row'>
                                                                <h1 class='amarillo text-center py-2 fs-4 font-semibold'>$nombre_docente</h1> 
                                                            </div>      
                                                            <div class='row'>
                                                                <p class='text-dark' style='text-align: justify;'>$palabras_docente</p>
                                                            </div>     
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='d-flex flex-row justify-content-start m-2' style='text-align: justify;'>
                                                <div class='col-12'>
                                                    <strong>Informacion academica:</strong> <br>
                                                    $informacion_docente
                                                </div> 
                                            </div>
                                            <div class='d-flex flex-row justify-content-start mx-2' style='text-align: justify;'>
                                                <strong>Materias que ha impartido:</strong>
                                            </div>
                                            <div class='d-flex flex-row justify-content-start mx-2 mb-2' style='text-align: justify;'>
                                                <div class='col-12'>
                                                    $materias_docente
                                                </div>   
                                            </div>
                                            <div class='d-flex flex-row justify-content-start mx-2' style='text-align: justify;'>
                                                <strong>Información de contacto:</strong> 
                                            </div>
                                            <div class='d-flex flex-row justify-content-start mx-2 mb-2' style='text-align: justify;'>
                                                <div class='col-12'>
                                                    $contacto_docente
                                                </div>   
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
        }
        return $Codigo;
    }

    function generarPaginacion(){
        $cn = $this->connection;
        $sqlSelect = "SELECT * FROM docente ORDER BY nombre_docente ASC";
        $ResultSet = $cn->query($sqlSelect);
        $NumRows = $ResultSet->num_rows;
        $NumPaginas = $NumRows / 12;
        $Residuo = $NumRows % 12;
        if($Residuo > 0){
            $NumPaginas = $NumPaginas + 1;
        }
        $i = 1;
        $LimInferior = 1;
        $LimSuperior = 12;
        $Paginacion = '';
        $Paginacion .= '<nav aria-label="Page navigation example">';
        $Paginacion .= '<ul class="pagination justify-content-center">';
        if(isset($_GET['inferior'])){
            if($_GET['inferior'] == 1){
                $Paginacion .= '<li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>';
            } else{
                $LI = $_GET['inferior'] - 12;
                $LS = $_GET['superior'] - 12;
                $Paginacion .= '<li class="page-item"><a class="page-link" href="?option=2&inferior='.$LI.'&superior='.$LS.'">Anterior</a></li>';
            } 
        } else{
            $Paginacion .= '<li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>';
        }
        while($i <= $NumPaginas){
            if(isset($_GET['superior'])){
                if($LimSuperior == $_GET['superior']){
                    $Paginacion .= '<li class="page-item active"><a class="page-link" href="?option=2&inferior='.$LimInferior.'&superior='.$LimSuperior.'">'.$i.'</a></li>';
                }else{
                    $Paginacion .= '<li class="page-item"><a class="page-link" href="?option=2&inferior='.$LimInferior.'&superior='.$LimSuperior.'">'.$i.'</a></li>';
                }
            }else{
                if($i == 1){
                    $Paginacion .= '<li class="page-item active"><a class="page-link" href="?option=2&inferior='.$LimInferior.'&superior='.$LimSuperior.'">'.$i.'</a></li>';
                }else{
                    $Paginacion .= '<li class="page-item"><a class="page-link" href="?option=2&inferior='.$LimInferior.'&superior='.$LimSuperior.'">'.$i.'</a></li>';
                }   
            }
            $i = $i + 1;
            $LimInferior = $LimInferior + 12;
            $LimSuperior = $LimSuperior + 12;
        }
        if(isset($_GET['superior'])){
            if($_GET['superior'] >= $NumRows){
                $Paginacion .= '<li class="page-item disabled"><a class="page-link" href="#">Siguiente</a></li>';
            } else{
                $LI = $_GET['inferior'] + 12;
                $LS = $_GET['superior'] + 12;
                $Paginacion .= '<li class="page-item"><a class="page-link" href="?option=2&inferior='.$LI.'&superior='.$LS.'">Siguiente</a></li>';
            } 
        } else{
            $Paginacion .= '<li class="page-item"><a class="page-link" href="?option=2&inferior=13&superior=24">Siguiente</a></li>';
        }
        $Paginacion .= '</ul>';
        $Paginacion .= '</nav>';

        return $Paginacion;
    }
}