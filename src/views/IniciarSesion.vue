<template>
    <main>
        <form class="border border-primary col-10 col-md-6" @submit.prevent="submitForm">
            <div class="form-group col-12">
                <label for="mail" class="fs-2">Email</label>
                <input type="email" class="form-control col-12" id="mail" aria-describedby="emailHelp" placeholder="leo@davinci.edu.ar" v-model="mail">
                <small id="emailHelp" class="form-text text-muted">No compartas tus datos con nadie. Evite inconvenientes</small>
            </div>
            <div class="form-group col-12">
                <label for="constrasena" class="fs-2">Contraseña</label>
                <input type="password" class="form-control col-12" id="constrasena" placeholder="***********" v-model="contrasena">
            </div>
            <button type="submit" class="btn btn-primary col-12 mt-2">iniciar Sesion</button>
            <p v-if="error" class="text-danger">{{ error }}</p>
        </form>
        <div>
            <picture class="contenedorCirculo circulo1">
                <img src="../../public/dell1.png" alt="foto numero 1">
            </picture>
            
            <picture class="contenedorCirculo circulo2">
                <img src="../../public/patito.webp" alt="foto numero 2">
            </picture>
            
            <picture class="contenedorCirculo circulo3">
                <img src="../../public/moto2.png" alt="foto numero 3">
            </picture>
        </div>
    </main>
</template>
<script>
    import ApiService from '@/API/apiService';
    import { inject } from 'vue';
    export default{
        data() {
            return {
                mail: "",
                contrasena: "",
                error: "",
                user: []
            }
        },
        setup() {
            const auth = inject('auth');
            return { auth };
        },
        created() {
            this.apiService = new ApiService("http://127.0.0.1/basevue")
        },
        methods: {
            async submitForm() {
                try {
                    this.user = await this.apiService.login(this.mail, this.contrasena)
                    if (this.user.length > 0){
                        auth.loginUser(this.user)
                    }
                } catch (error){
                    this.error = "Error inesperado al iniciar Sesión. Intente nuevamente"
                    console.error(error)
                } finally {
                    console.log(this.user)
                }
            }
        }
    }
</script>
<style scoped>
main{
    display: flex;
    justify-content: center;
    position: relative;
}
form{
    max-width: 500px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 24px;
    padding: 12px 32px;
    margin: auto;
    border: 1px solid grey;
    box-shadow: 0 0 12px grey;
    border-radius: 24px;
    background-color: #FFFFFF;
}
.contenedorCirculo{
    width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    right: 0;
    border-radius: 50%;
    border: 0.5px solid grey;
    box-shadow: 0 0 12px grey;
    z-index: -1;
}
.circulo1{
    top: 120px;
    animation: moverIzqDerecha 17s linear alternate-reverse infinite;
}
.circulo2{
    top: calc(50% - 50px);
    animation: moverIzqDerecha 8s linear alternate-reverse infinite;
}
.circulo3{
    bottom: 120px;
    animation: moverIzqDerecha 13s linear alternate-reverse infinite;
}
.contenedorCirculo img{
    width: 80%;
    height: 80%;
    border-radius: 100%;
}
@keyframes moverIzqDerecha {
    0% {
        transform: translateX(-32px);
    }
    50% {
        transform: translateX(-400px); 
    }
    100% {
        transform: translateX(-32px);
    }
}
</style>