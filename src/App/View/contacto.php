<?php

$titulo="Contacto";
include_once DIRECTORIO_VISTAS."template/inicio.php";
include_once DIRECTORIO_VISTAS."template/arribaNavegacion.php";
include_once DIRECTORIO_VISTAS."template/navegacion.php";
?>
    <section id="services" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Formulario de contacto</h1>
                        <p class="mx-auto">Por favor, rellene los siguientes campos y háganos llegar su opinión. Estaremos encantados de ayudarle</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 h-100">
                <div class="service">
                    <form method="post" action="/contact/store">
                        <div class="mb-3">
                            <label class="form-label" for="email">Correo electrónico</label>
                            <input class="form-control" id="email" name="useremail" type="email" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Tipo de consulta">
                                <option selected>Seleccione una de las siguientes opciones</option>
                                <option value="queja">Reclamación</option>
                                <option value="consulta">Consulta</option>
                                <option value="felicitacion">Felicitación</option>
                                <option value="otros">Otras consultas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="consulta">Detalles de la consulta</label>
                            <textarea id="consulta" name="consulta" class="form-control " aria-label="Introduce tu consulta"></textarea>
                        </div>
                        <input class="btn btn-brand ms-lg-3" type="button" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>



<?php
include_once DIRECTORIO_VISTAS."template/footer.php";
include_once DIRECTORIO_VISTAS."template/modal.php";
include_once DIRECTORIO_VISTAS."template/final.php";