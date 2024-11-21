<template>
    <div class="container py-4 row mx-auto">
        <h1>Contacto</h1>
        <form class="row g-3 needs-validation" @submit.prevent="validarYEnviarFormulario">
        <div class="col-md-6">
            <label for="name" class="form-label">Nombre <span>*</span></label>
            <input
                type="text"
                v-model="form.nombre"
                name="nombre"
                class="form-control"
                id="name"
            />
            <div v-if="errores.nombre" class="text-danger">
                {{ errores.nombre }}
            </div>
            </div>
            <div class="col-md-6">
                <label for="lastname" class="form-label">Apellido <span>*</span></label>
                <input
                    type="text"
                    v-model="form.apellido"
                    name="apellido"
                    class="form-control"
                    id="lastname"
                />
                <div v-if="errores.apellido" class="text-danger">{{ errores.apellido }}</div>
            </div>
            <div class="col-md-5">
                <label for="phone_number" class="form-label">Teléfono <span>*</span></label>
                <input
                    type="tel"
                    v-model="form.telefono"
                    name="telefono"
                    class="form-control"
                    id="phone_number"
                    minlength="8"
                    maxlength="13"
                />
                <div v-if="errores.telefono" class="text-danger">{{ errores.telefono }}</div>
            </div>
            <div class="col-md-7">
                <label for="email" class="form-label">Email <span>*</span></label>
                <input
                    type="email"
                    v-model="form.email"
                    name="email"
                    class="form-control"
                    id="email"
                    placeholder="name@example.com"
                />
                <div v-if="errores.email" class="text-danger">{{ errores.email }}</div>
            </div>
            <div class="col-md-6">
                <label for="asunt" class="form-label">Asunto</label>
                <input
                    type="text"
                    v-model="form.asunto"
                    name="asunto"
                    class="form-control"
                    id="asunt"
                    placeholder="Asunto"
                />
            </div>
            <div class="col-md-12">
                <label for="comentario" class="form-label">Comentario <span>*</span></label>
                <textarea
                    v-model="form.comentario"
                    name="comentario"
                    class="form-control"
                    id="comentario"
                    placeholder="Escriba un comentario..."
                    rows="3"
                ></textarea>
                <div v-if="errores.comentario" class="text-danger">{{ errores.comentario }}</div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input
                    class="form-check-input"
                    v-model="form.acepta"
                    type="checkbox"
                    name="terminos_y_condiciones"
                    id="validCheck"
                    />
                    <label class="form-check-label" for="validCheck">
                    Acepto los términos y condiciones
                    </label>
                </div>
                <div v-if="errores.acepta" class="text-danger">{{ errores.acepta }}</div>
            </div>
            <div class="col-12">
                <button class="btn btn btn-outline-dark" type="submit">Enviar</button>
            </div>
        </form>
        <div v-if="mensajeExito" class="alert alert-success mt-3">
            {{ mensajeExito }}
        </div>
    </div>
</template>
    
<script>
    export default {
        data() {
            return {
                form: {
                    nombre: "",
                    apellido: "",
                    telefono: "",
                    email: "",
                    asunto: "",
                    comentario: "",
                    acepta: false,
                },
                errores: {}, 
                mensajeExito: "", 
        };
        },
        methods: {
            validarYEnviarFormulario() {
                this.errores = {}; 
                if (!this.form.nombre) {
                this.errores.nombre = "El nombre es obligatorio.";
                }
                if (!this.form.apellido) {
                this.errores.apellido = "El apellido es obligatorio.";
                }
                if (!this.form.telefono) {
                this.errores.telefono = "El teléfono es obligatorio.";
                } else if (!/^\d{8,13}$/.test(this.form.telefono)) {
                this.errores.telefono = "El teléfono debe tener entre 8 y 13 dígitos.";
                }
                if (!this.form.email) {
                this.errores.email = "El email es obligatorio.";
                } else if (!/\S+@\S+\.\S+/.test(this.form.email)) {
                this.errores.email = "El email no es válido.";
                }
                if (!this.form.comentario) {
                this.errores.comentario = "El comentario es obligatorio.";
                }
                if (!this.form.acepta) {
                this.errores.acepta = "Debes aceptar los términos y condiciones.";
                }

                if (Object.keys(this.errores).length === 0) {
                this.enviarAFormspree();
                }   
            },
            async enviarAFormspree() {
                try {
                    const response = await fetch("https://formspree.io/f/mkgnzkqq", {
                    method: "POST",
                    headers: {
                    "Content-Type": "application/json",
                    },
                    body: JSON.stringify(this.form),
                });
                    if (response.ok) {
                        this.mensajeExito = "¡Formulario enviado correctamente!";
                        this.form = {
                        nombre: "",
                        apellido: "",
                        telefono: "",
                        email: "",
                        asunto: "",
                        comentario: "",
                        acepta: false,
                    }; 
                    } else {
                    throw new Error("Hubo un problema al enviar el formulario.");
                    }
                } catch (error) {
                    alert("Error: " + error.message);
                }
                },
        },
    };
</script>

<style>
    .form-control:focus{
        border-color: #05070a !important;
        box-shadow: 0 0 0 .25rem rgba(40, 43, 46, 0.25) !important;
    }
    .form-check-input:checked{
        background-color: #05070a !important;
        border-color: #05070a !important;
    }
    .form-check-input:focus {
        border-color: #05070a !important;
        box-shadow: 0 0 0 .25rem rgba(40, 43, 46, 0.25) !important;
    }
    span{
        color: red;
    }
    .btn-outline-dark {
        color: #fff !important;
        background-color: #05070a !important;
        border:2px solid #fff !important;
    }
    .btn:hover {
        color: #05070a !important;
        background-color: #fff !important;
        border: 2px solid #05070a !important;
    }
</style>
