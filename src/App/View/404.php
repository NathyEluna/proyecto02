<?php

$titulo="Página no encontrada";
include_once DIRECTORIO_VISTAS."template/inicio.php";
include_once DIRECTORIO_VISTAS."template/arribaNavegacion.php";
include_once DIRECTORIO_VISTAS."template/navegacion.php";
?>
    <section id="services" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-template">
                        <h1>
                            Oops!</h1>
                        <h2>
                            Error 404. Página no enecontrada</h2>
                        <div class="error-details">
                            Ha ocurrido un error y no hemos encontrado la página solicitada
                        </div>

                        <div class="error-actions mt-5">
                            <p><a href="/" class="btn btn-brand btn-lg">Ir al inicio </a></p>
                            <p><a href="/contact" class="btn btn-info btn-lg"> Contacta con nosotros </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<?php
include_once DIRECTORIO_VISTAS."template/footer.php";
include_once DIRECTORIO_VISTAS."template/modal.php";
include_once DIRECTORIO_VISTAS."template/final.php";