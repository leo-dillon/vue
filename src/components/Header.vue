<script>
    import { inject } from 'vue';
    export default {
    setup() {
        const auth = inject('auth');
        return { auth };
    },
    };
</script>
<template>
    <header class="">
        <nav class="col-12 px-4 navbar navbar-expand-lg navbar-dark" style="background-color: #4a4a4a;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">Tech Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- El link para "Nosotros" -->
                <router-link class="link nav-link text-light ms-3" to="/nosotros">Nosotros</router-link>

                <!-- El link para "Contacto" -->
                <router-link class="link nav-link text-light ms-3" to="/contacto">Contacto</router-link>

                 <!-- El link para "Carrito" -->
                <router-link class="link nav-link text-light ms-3" to="/carrito">Mi Carrito <i class="fa-solid fa-bag-shopping"></i></router-link>



                <!-- Contenedor para el buscador -->
                <div class="d-flex align-items-center ms-auto">
                    <!-- Buscador -->
                    <form class="d-flex me-3" role="search">
                        <input class="form-control me-1" type="search" placeholder="Buscar producto" aria-label="Search" >
                    </form>
                    <div v-if="!auth.isUserLogged">
                        <router-link class="ms-3 btn btn-primary" to="/iniciarSesion">iniciar Sesión</router-link>
                        <router-link class="ms-3 btn btn-primary" to="/registrate">Registrarte</router-link>
                    </div>
                    <div v-if="auth.isUserLogged">
                        <router-link class="ms-3 btn btn-primary" to="/adminProductos">Bienvenido Admin</router-link>
                        
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>
<style scoped>
.link:hover{
    line-height: 1px solid #0B5ED7;
}
</style>