<script setup>
import ApiService from '@/API/apiService';
import Card from '@/components/Card.vue';

</script>
<script>
    export default {
        data() {
            return {
                productos: [],
            };
        },
        created() {
            this.apiService = new ApiService("http://127.0.0.1/basevue");
            this.loadProductos();
        },
        methods: {
        async loadProductos() {
            try {
                this.productos = await this.apiService.getProductos();
            } catch {
                alert("Error al cargar productos");
            }
        },
        },
    };
</script>
<template>
  <main>
    <div class="container my-5">
        <div class="row align-items-center mb-4">
            <div class="col-md-6 text-center">
                <h2 class="text-dark">Productos Tech</h2>
                <p class="text-dark">Conocé los mejores productos de tecnología</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="../../public/user-tech.png" alt="Ilustración" class="img-fluid" style="max-width: 100%; height: auto;">
            </div>
        </div>
        <hr class="my-4">
        
        <div class="row">
            <div class="col-md-4" v-for="producto in productos" :key="producto.id">
                <Card 
                    :id = "producto.id"
                    :nombre = "producto.nombre"
                    :precio = "producto.precio"
                    :imagen = "producto.imagen"
                />
            </div>
        </div>    
    </div>
  </main>
</template>
<style scoped>
@media (width < 800px){
    div.row div.col-md-4{
        max-width: 250px;
    }
}
</style>