<div class="row g-0">
  <div class="position-relative w-100 overflow-hidden">
    <img class="w-100 img-fluid" src="img/banner-docentes.webp" alt="" />
    <div class="position-absolute top-50 start-50 translate-middle w-100">
      <div class="d-flex flex-column justify-content-center align-items-center text-center">
        <h1 class="fw-bold text-warning shadow-text">Egresado</h1>
            <h1 class="fw-bold text-light d-md-flex d-none shadow-text">Maestría en Ciencias en Ingeniería Bioquímica</h1>
      </div>
    </div>
  </div>
</div>

<div class="container my-2">
  <div class="row justify-content-md-start justify-content-center">
    <?php

    $datos = $egresado->imprimirDatos();
    echo $datos;
    ?>
  </div>
</div>
