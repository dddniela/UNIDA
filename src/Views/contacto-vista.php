<?php
require_once("src/Models/Administrativo.php");
$administrativos = new Administrativo();

$coordinador = $administrativos->getCoordinador();
$jefeDEPI =  $administrativos->getJefeDEPI();

$imagenJefeDEPI = $GLOBALS['PATH_DOCENTE'] . $jefeDEPI['imagen'];
$imagenCoordinador = $GLOBALS['PATH_DOCENTE'] . $coordinador['imagen'];
?>
<!-- Portada -->
<div class="row g-0">
  <div class="position-relative w-100 overflow-hidden">
    <img class="w-100 img-fluid" src="img/IBQ-IQ/P31.png" alt="" />
    <div class="position-absolute top-50 start-50 translate-middle w-100">
      <div class="d-flex flex-column justify-content-center align-items-center text-center">
        <h1 class="fw-bold text-warning shadow-text">Contacto</h1>
        <h1 class="fw-bold text-light d-md-flex d-none shadow-text">
          Maestría en Ciencias en Ingeniería Bioquímica
        </h1>
      </div>
    </div>
  </div>
</div>
<!-- Fin Portada-->

<!-- División de Estudios de Posgrados e Investigación -->
<div class="bg-primary pt-5"></div>
<section class="lightSection bg-light">
  <div class="row px-2 g-0">

    <div class="col-lg-6 col-12 p-2 shadow-sm">
      <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <img class="img-fluid rounded" src="img/ITVER/UNIDA.png" alt="">
      </div>
    </div>

    <div class="col-lg-6 col-12 p-4">
      <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <div class="row g-0">
          <div class="col-12">
            <h2 class="sectionTitle text-center font-bold m-3">División de Estudios de Posgrados e Investigación</h2>
            <div class="sectionSeparator"></div>
          </div>
          <div class="col-12" style="text-align: center;">
            <p style="text-align: justify;"> Los programas educativos
              (Maestría en Ciencias en Ingeniería Bioquímica, Maestría en Administración, Maestría en eficiencia energética
              y energías renovables y el Doctorado en Ciencias en Alimentos) pertenecen a la División de Estudios de Posgrados e Investigación
              cuyo objetivo principal es el control de las actividades docentes de los programas de
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
<!--Fin División de Estudios de Posgrados e Investigación -->

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
              if ($jefeDEPI) {
                echo $jefeDEPI['nombre'];
              }
              ?>
            </h2>
            <div class="sectionSeparator"></div>
            <h4 class="text-center fw-bold fs-3">
              <?php
              if ($jefeDEPI) {
                echo $jefeDEPI['nombrePuesto'];
              }
              ?>
            </h4>
          </div>
          <div class="col-12" style="text-align: center;">
            <p class="" style="text-align: justify">
              <?php
              if ($jefeDEPI) {
                echo $jefeDEPI['descripcion'];
              }
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-12 p-2 shadow-sm">
      <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <img class="img-fluid rounded" src='<?php if ($jefeDEPI)  echo $imagenJefeDEPI; ?>' alt="">
      </div>
    </div>

  </div>
</section>
<!--Fin Descripción Jefa/e del departamento -->

<!-- Descripción del Coordinador/a -->
<div class="bg-primary pt-5"></div>
<section class="lightSection bg-light">
  <div class="row px-2 g-0">

    <div class="col-lg-6 col-12 p-2 shadow-sm">
      <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <img class="img-fluid rounded" src='<?php if ($coordinador) echo $imagenCoordinador; ?>' alt="">
      </div>
    </div>

    <div class="col-lg-6 col-12 p-4">
      <div class="d-flex justify-content-center align-items-center w-100 h-100">
        <div class="row g-0">
          <div class="col-12">
            <h2 class="sectionTitle text-center font-bold m-3">
              <?php
              if ($coordinador) {
                echo $coordinador['nombre'];
              }
              ?>
            </h2>
            <div class="sectionSeparator"></div>
            <h4 class="text-center fw-bold fs-3">
              <?php
              if ($coordinador) {
                echo $coordinador['nombrePuesto'] . " de Sistemas Computacionales";
              }
              ?>
            </h4>
          </div>
          <div class="col-12 px-4" style="text-align: center;">
            <p class="" style="text-align: justify">
              <?php
              if ($coordinador) {
                echo $coordinador['descripcion'];
              }
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>


  </div>
</section>
<!--Fin Descripción del Coordinador/a  -->