<template>
    <div class="container py-4">
        <h1>Contacto</h1>
        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-6">
                <label for="name" class="form-label">Nombre*:</label>
                <input type="text" name="nombre" class="form-control" id="name" required>
            </div>
            <div class="col-md-6">
                <label for="lastname" class="form-label">Apellido*:</label>
                <input type="text" name="apellido" class="form-control" id="lastname" required>
            </div>
            <div class="col-md-5">
                <label for="phone_number" class="form-label">Teléfono*:</label>
                <input type="tel" name="telefono" class="form-control" id="phone_number" required>
            </div>
            <div class="col-md-7">
                <label for="email" class="form-label">Email*:</label>
                <input type="email" name="Email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="col-md-6">
                <label for="asunt" class="form-label">Asunto:</label>
                <input type="text" name="domicilio" class="form-control" id="asunt" placeholder="Asunto">
            </div>
            <div class="col-md-12">
                <label for="asunt" class="form-label">Comentario*:</label>
                <textarea name="domicilio" class="form-control" id="asunt" placeholder="Escriba un comentario..." required rows="3"></textarea>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="terminos_y_condiciones" id="validCheck" required>
                    <label class="form-check-label" for="validCheck">
                        Acepto los términos y condiciones
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
    </div>
</template>
