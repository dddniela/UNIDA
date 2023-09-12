<?php
require_once("src/Models/Administrativo.php");
$administrativos = new Administrativo();
$administrativos->setConnection($conn->getDB());

$coordinador = $administrativos->getCoordinador();
$jefeDepartamento =  $administrativos->getJefeDepartamento();
?>
<!-- Portada -->
<div class="row g-0">
  <div class="position-relative w-100 overflow-hidden">
    <img class="w-100 img-fluid" src="img/IBQ-IQ/P37.webp" alt="" />
    <div class="position-absolute top-50 start-50 translate-middle w-100">
      <div class="d-flex flex-column justify-content-center align-items-center text-center">
        <h1 class="fw-bold text-warning shadow-text">Conócenos</h1>
        <h1 class="fw-bold text-light d-md-flex d-none shadow-text">
          Ingeniería Química
        </h1>
      </div>
    </div>
  </div>
</div>
<!-- Fin Portada-->

<!-- Departamento de Química-Bioquímica -->
<div class="bg-primary pt-5"></div>
<section class="lightSection bg-light">
  <div class="row px-2 g-0">

  <div class="col-lg-6 col-12 p-2 shadow-sm">
    <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <img class="img-fluid rounded" src="img/ITVER/escuela21.webp" alt="">
      </div>
    </div>

    <div class="col-lg-6 col-12 p-4">
      <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <div class="row g-0">
          <div class="col-12">
            <h2 class="sectionTitle text-center font-bold m-3">Departamento de Ingeniería Química-Bioquímica</h2>
            <div class="sectionSeparator"></div>
          </div>
          <div class="col-12" style="text-align: center;">
            <p style="text-align: justify;">
            Los programas educativos de Ingeniería Química, Ingeniería Bioquímica y Posgrados de la UNIDA 
            (Unidad de Investigación y Desarrollo de Alimentos) pertenecen al departamento de Ingeniería Química 
            y Bioquímica y su objetivo principal es el control de las actividades docentes de los programas de 
            estudio, la vinculación con el sector productivo para la contribución de la formación profesional 
            del estudiante, así como propiciar actividades científicas con la investigación documental 
            y de campo.
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!--Fin Departamento de Química-Bioquímica -->

<!-- Descripción Jefa/e del departamento -->
<div class="bg-primary pt-5"></div>
<section class="lightSection bg-light">
  <div class="row px-2 g-0">
    <div class="col-lg-6 col-12 p-4">
      <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <div class="row g-0">
          <div class="col-12">
            <h2 class="sectionTitle text-center font-bold m-3">
              <?php
              if ($jefeDepartamento) {
                echo $jefeDepartamento->nombre;
              }
              ?>
            </h2>
            <div class="sectionSeparator"></div>
            <h4 class="text-center fw-bold fs-3">
              <?php
              if ($jefeDepartamento) {
                echo $jefeDepartamento->nombrePuesto . " de Ingeniería Química-Bioquímica";
              }
              ?>
            </h4>
          </div>
          <div class="col-12" style="text-align: center;">
            <p class="" style="text-align: justify">
              <?php
              if ($jefeDepartamento) {
                echo $jefeDepartamento->descripcion;
              }
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-12 p-2 shadow-sm">
      <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <img class="img-fluid rounded" src='img\Docentes\<?php if ($jefeDepartamento)  echo $jefeDepartamento->imagen; ?>' alt="">
      </div>
    </div>

  </div>
</section>
<!--Fin Descripción Jefa/e del departamento -->

<!-- Descripción Coordinador -->
<div class="bg-primary pt-5"></div>
<section class="lightSection bg-light">
  <div class="row px-2 g-0">

    <div class="col-lg-6 col-12 p-2 shadow-sm">
      <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <img class="img-fluid rounded" src='img\Docentes\<?php if ($coordinador) echo $coordinador->imagen; ?>' alt="">
      </div>
    </div>

    <div class="col-lg-6 col-12 p-4">
      <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <div class="row g-0">
          <div class="col-12">
            <h2 class="sectionTitle text-center font-bold m-3">
              <?php
              if ($coordinador) {
                echo $coordinador->nombre;
              }
              ?>
            </h2>
            <div class="sectionSeparator"></div>
            <h4 class="text-center fw-bold fs-3">
              <?php
              if ($coordinador) {
                echo $coordinador->nombrePuesto . " de " . $coordinador->nombreCarrera;
              }
              ?>
            </h4>
          </div>
          <div class="col-12 px-4" style="text-align: center;">
            <p class="" style="text-align: justify">
              <?php
              if ($coordinador) {
                echo $coordinador->descripcion;
              }
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!--Fin Descripción Coordinador -->

<!-- Instalaciones -->
<!-- Galeria de imagenes -->
<section class="darkSection bg-dark p-2 px-4">
    <div class="row mb-4 px-2 g-0">
        <div class="darkSection bg-dark">
            <h2 class="titleDarkSection text-center font-bold">Instalaciones</h2>
            <div class="darkSectionSeparator"></div>
            <p class="text-center" style="color: white;">
            El departamento de Ingeniería Química-Bioquímica cuenta con diversos laboratorios en donde los estudiantes 
            planean y desarrollan experimentos para la obtención de datos que permiten la comprobación de los
            conceptos teóricos estudiados en los cursos.
            </p>
        </div>

        <div class="col-12">
            <div class="galleryContainer bg-dark">
                <div class="row g-0">
                    <div class="col-md-4 px-2">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#modalImage1" style="text-decoration: none;">
                            <img class="img-fluid w-100 shadow-1-strong rounded mb-4" src="img/ITVER/labComputo.webp" alt="">
                            <p class="text-center shadow-text" style="color: white;">Laboratorio de Cómputo</p>
                        </a>
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#modalImage2" style="text-decoration: none;">
                            <img class="img-fluid w-100 shadow-1-strong rounded mb-4" src="img/ITVER/labFisicoquimica.webp" alt="">
                            <p class="text-center shadow-text" style="color: white;">Laboratorio de Química Fisicoquímica</p>
                        </a>
                    </div>

                    <div class="col-md-4 px-2">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#modalImage3" style="text-decoration: none;">
                            <img class="img-fluid w-100 shadow-1-strong rounded mb-4" src="img/ITVER/labIngQuimica.webp" alt="">
                            <p class="text-center shadow-text" style="color: white;">Laboratorio de Ingeniería Química</p>
                        </a>
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#modalImage4" style="text-decoration: none;">
                            <img class="img-fluid w-100 shadow-1-strong rounded mb-4" src="img/ITVER/labQAnalitica.webp" alt="">
                            <p class="text-center shadow-text" style="color: white;">Laboratorio de Química Analítica</p>
                        </a>
                    </div>

                    <div class="col-md-4 px-2">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#modalImage5" style="text-decoration: none;">
                            <img class="img-fluid w-100 shadow-1-strong rounded mb-4" src="img/ITVER/labQInorganica.webp" alt="">
                            <p class="text-center shadow-text" style="color: white;">Laboratorio de Química Inorgánica</p>
                        </a>
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#modalImage6" style="text-decoration: none;">
                            <img class="img-fluid w-100 shadow-1-strong rounded mb-4" src="img/ITVER/labQOrganica.webp" alt="">
                            <p class="text-center shadow-text" style="color: white;">Laboratorio de Química Orgánica</p>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<!-- Fin Galeria de imagenes -->
<!-- Modals de la galería-->
<div tabindex="-1" aria-labelledby="modalImage1" aria-hidden="true" class="modal fade" id="modalImage1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent text-white text-center">
            <img src="img/ITVER/labComputo.webp" alt="">
            <p>Laboratorio de Cómputo</p>
        </div>
    </div>
</div>

<div tabindex="-1" aria-labelledby="modalImage2" aria-hidden="true" class="modal fade" id="modalImage2">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent text-white text-center">
            <img src="img/ITVER/labFisicoquimica.webp" alt="">
            <p>Laboratorio de Fisicoquímica</p>
        </div>
    </div>
</div>

<div tabindex="-1" aria-labelledby="modalImage3" aria-hidden="true" class="modal fade" id="modalImage3">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent text-white text-center">
            <img src="img/ITVER/labIngQuimica.webp" alt="">
            <p>Laboratorio de Ingeniería Química</p>
        </div>
    </div>
</div>

<div tabindex="-1" aria-labelledby="modalImage4" aria-hidden="true" class="modal fade" id="modalImage4">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent text-white text-center">
            <img src="img/ITVER/labQAnalitica.webp" alt="">
            <p>Laboratorio de Química Analítica</p>
        </div>
    </div>
</div>

<div tabindex="-1" aria-labelledby="modalImage5" aria-hidden="true" class="modal fade" id="modalImage5">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent text-white text-center">
            <img src="img/ITVER/labQInorganica.webp" alt="">
            <p>Laboratorio de Química Inorgánica</p>
        </div>
    </div>
</div>

<div tabindex="-1" aria-labelledby="modalImage6" aria-hidden="true" class="modal fade" id="modalImage6">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent text-white text-center">
            <img src="img/ITVER/labQOrganica.webp" alt="">
            <p>Laboratorio de Química Orgánica</p>
        </div>
    </div>
</div>
<!-- Fin Modals de la galería-->
<!--Fin Instalaciones-->
