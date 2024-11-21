<script>
    import { inject } from 'vue';
    import { useAuth } from '@/store/useAuth';
import Swal from 'sweetalert2';
import router from '@/router';
    export default {
        setup() {
            const { logoutUser, isUserLogged } = useAuth(); 
            return { logoutUser, isUserLogged };
        },
        methods: {
            async cerrarSesion() {
                Swal.fire({
                    title: '¿Quieres cerrar sesión?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, cerrar sesión',
                    cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.logoutUser();
                            Swal.fire({
                                title: 'Sesión cerrada',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false,
                            }).then( router.push('/') );
                        }
                });
            }
        }
    };
</script>
<template>
    <header class="">
        <nav class="col-12 px-4 navbar navbar-expand-lg navbar-dark" style="background-color: #4a4a4a;">
            <div class="container-fluid">
                <router-link class="link nav-link text-light ms-3" to="/">Tech Store</router-link>

                <router-link class="link nav-link text-light ms-3" to="/nosotros">Nosotros</router-link>
                
                <router-link class="link nav-link text-light ms-3" to="/contacto">Contacto</router-link>

                <router-link class="link nav-link text-light ms-3" to="/carrito">Mi Carrito <i class="fa-solid fa-bag-shopping"></i></router-link>


                <div class="d-flex align-items-center ms-auto">
                    <div v-if="!isUserLogged">
                        <router-link class="ms-3 btn" to="/iniciarSesion">Iniciar Sesión</router-link>
                        <router-link class="ms-3 btn" to="/registrarse">Registrarte</router-link>
                    </div>
                    <div class="d-flex align-items-center ms-auto" v-if="isUserLogged">
                        <router-link class="ms-3 btn" to="/adminProductos">Bienvenido Admin</router-link>
                        <button class="ms-3 btn btn-danger" @click="cerrarSesion">Cerrar Sesión</button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>
<style scoped>
    .btn{
        background-color: #fff ;
        color: #05070a
    }
    .btn:hover {
        color: #05070a !important;
        background-color: #d4d4d4 !important;   
        border: 1px solid #05070a !important;
    }
</style>